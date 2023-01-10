<?php

namespace Tha\Devob\Helper\Api;

use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\App\Helper\AbstractHelper;

use Tha\Devob\Model\Api\Data\Product\DetailDataFactory;
use Tha\Devob\Model\Api\Data\Product\ProductDetailFactory;
use Tha\Devob\Model\Api\Data\Product\ProductListFactory;
use Tha\Devob\Model\Api\Data\Product\ItemListFactory;

class ProductHelp extends AbstractHelper
{
    protected $productListFactory;
    protected $itemListFactory;
    protected $productRepository;
    protected $objectManagerInterface;
    protected $product_helper;
    protected $image_helper;
    protected $data_helper;
    protected $reviewFactory;
    protected $productDetailFactory;
    protected $detailDataFactory;
    protected $configDataFactory;
    protected $mediaFactory;
    protected $attributesFactory;
    protected $optionFactory;
    protected $baseAttributesFactory;
    protected $configIndexFactory;
    protected $cache;
    protected $serializer;
    protected $bundle;
    protected $bunderDataFactory;
    protected $product_related;
    protected $product_upsell;
    protected $attributes;
    protected $listView;
    protected $registry;

    public function __construct(
        ProductListFactory $productListFactory,
        ItemListFactory $itemListFactory,
        ProductRepository $productRepository,
        \Magento\Framework\ObjectManagerInterface $objectManagerInterface,
        \Magento\Catalog\Helper\Product $product_helper,
        \Magento\Catalog\Helper\Image $image_helper,
        Data $data_helper,
        \Magento\Review\Model\ReviewFactory $reviewFactory,
        ProductDetailFactory $productDetailFactory,
        DetailDataFactory $detailDataFactory,
        \Tha\Devob\Model\Api\Data\Product\Config\ConfigDataFactory $configDataFactory,
        \Tha\Devob\Model\Api\Data\Product\MediaFactory $mediaFactory,
        \Tha\Devob\Model\Api\Data\Product\Config\AttributesFactory $attributesFactory,
        \Tha\Devob\Model\Api\Data\Product\Config\OptionFactory $optionFactory,
        \Tha\Devob\Model\Api\Data\BaseAttributesFactory $baseAttributesFactory,
        \Tha\Devob\Model\Api\Data\Product\Config\ConfigIndexFactory $configIndexFactory,
        \Magento\Framework\App\CacheInterface $cache,
        \Magento\Framework\Serialize\SerializerInterface $serializer,
        \Magento\Bundle\Block\Catalog\Product\View\Type\Bundle $bundle,
        \Tha\Devob\Model\Api\Data\Product\Bunder\BunderDataFactory $bunderDataFactory,
        \Magento\Catalog\Block\Product\ProductList\Related $product_related,
        \Magento\Catalog\Block\Product\ProductList\Upsell $product_upsell,
        \Magento\Catalog\Block\Product\View\Attributes $attributes,
        \Magento\Review\Block\Product\View\ListView $listView,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\App\Helper\Context $context
    ) {
        $this->productListFactory = $productListFactory;
        $this->itemListFactory = $itemListFactory;
        $this->productRepository = $productRepository;
        $this->objectManagerInterface = $objectManagerInterface;
        $this->product_helper = $product_helper;
        $this->image_helper = $image_helper;
        $this->data_helper = $data_helper;
        $this->reviewFactory = $reviewFactory;
        $this->productDetailFactory = $productDetailFactory;
        $this->detailDataFactory = $detailDataFactory;
        $this->configDataFactory = $configDataFactory;
        $this->mediaFactory = $mediaFactory;
        $this->attributesFactory = $attributesFactory;
        $this->optionFactory = $optionFactory;
        $this->baseAttributesFactory = $baseAttributesFactory;
        $this->configIndexFactory = $configIndexFactory;
        $this->cache = $cache;
        $this->serializer = $serializer;
        $this->bundle = $bundle;
        $this->bunderDataFactory = $bunderDataFactory;
        $this->product_related = $product_related;
        $this->product_upsell = $product_upsell;
        $this->attributes = $attributes;
        $this->listView = $listView;
        $this->registry = $registry;
        parent::__construct($context);
    }

    public function convertProductList($product_datas, $category_id = null)
    {
        $total = function($category_id = null){
            $data = $this->_request->getParams();
            $data["category_id"] = $category_id;
            return $data;
        };
        $item_results = $this->get_list_products($product_datas);
        $productList = $this->productListFactory->create();
        $productList->setCount($item_results ? count($item_results) : 0);
        $productList->setItems($item_results);
        if ($category_id) {
            $productList->setFilters($this->get_filters($category_id));
            $productList->setTotals(["key" => $total($category_id)]);
        }
        return $productList;
    }

    /**
     * @return \Tha\Devob\Api\Data\Product\ItemListInterface[]|null
     */
    public function get_list_products($product_datas = [], $bun_item_data = false)
    {
        $item_results = null;
        if (!$product_datas) {
            return null;
        }
        foreach ($product_datas as $product_data) {
            $product = $this->productRepository->getById($product_data->getId());

            $itemListFactory = $this->itemListFactory->create();
            $itemListFactory->setEid($bun_item_data ? $product_data->getData("selection_id") : $product_data->getId());
            $itemListFactory->setName($product->getName());
            $itemListFactory->setSku($product->getSku());
            $itemListFactory->setProductUrl($product->getProductUrl());
            $itemListFactory->setPrice($product->getPrice());
            $itemListFactory->setActive($product->getStatus() ? true : false);
            $itemListFactory->setSaleable($product->getIsSalable());
            $itemListFactory->setImagePath($this->data_helper->api_url_replace($this->resize_image($product, $product->getThumbnail())));
            $this->rate_and_review($product);
            $itemListFactory->setRates($product->getRatingSummary()->getData("rating_summary"));
            $itemListFactory->setReviews($product->getRatingSummary()->getData("reviews_count"));
            $item_results[] = $itemListFactory;
        }
        return $item_results;
    }

    /**
     * @return \Tha\Devob\Api\Data\Product\ProductDetailInterface
     */
    public function convertProductDetail($product_id)
    {
        $detailData = $this->detailDataFactory->create();
        if ($product_id) {
            $cache_Key = "pro_detail_" . $product_id;
            $product_data = $this->productRepository->getById($product_id);
            // $associatedProducts = $product_data->getTypeInstance()->getAssociatedProducts($product_data);

            if (\Tha\Devob\Helper\Api\Data::CACHE_ENA && $this->cache->load($cache_Key) && $_detailData = $this->serializer->unserialize($this->cache->load($cache_Key))) {
                $detailData->setData($_detailData);
                if ($product_data->getTypeId() == "configurable") {
                    $config_options = $this->get_config_options($product_data);
                    $detailData->setConfigData($config_options);
                }
                if ($product_data->getTypeId() == "grouped") {
                    $detailData->setGroupData($this->convertProductList($product_data->getTypeInstance()->getAssociatedProducts($product_data)));
                }
                return $this->productDetailFactory->create()->setDetailData($detailData);
            }

            $this->rate_and_review($product_data);
            $detailData->setEid($product_data->getId());
            $detailData->setName($product_data->getName());
            $detailData->setSku($product_data->getSku());
            $detailData->setProductUrl($product_data->getProductUrl());
            $detailData->setSaleable($product_data->getIsSalable());
            $detailData->setContent($product_data->getDescription());
            $detailData->setMoreInformation($this->get_information_data($product_data));
            $detailData->setPrice($product_data->getPrice());
            $detailData->setType($product_data->getTypeId());
            $detailData->setExMedia($this->product_image_url($product_data, 1, 570, 660));
            $detailData->setRates($product_data->getData("rating_summary")->getData('rating_summary'));
            $detailData->setReviews($product_data->getData("rating_summary")->getReviewsCount());
            $detailData->setReviewContent($this->get_review_content($product_data));
            if ($product_data->getTypeId() == "configurable") {
                $config_options = $this->get_config_options($product_data);
                $detailData->setConfigData($config_options);
            }
            if ($product_data->getTypeId() == "grouped") {
                $detailData->setGroupData($this->get_list_products($product_data->getTypeInstance()->getAssociatedProducts($product_data)));
            }
            if ($product_data->getTypeId() == "bundle") {
                $detailData->setBundData($this->get_bunder_options($product_data));
            }
        }
        $productDetail = $this->productDetailFactory->create()->setDetailData($detailData);
        if (\Tha\Devob\Helper\Api\Data::CACHE_ENA) {
            $this->cache->save(
                $this->serializer->serialize($detailData->getdata()),
                $cache_Key,
                [$product_data->getId()],
                86400
            );
        }

        return $productDetail;
    }

    public function get_review_content($product_data): array
    {
        $listView_block = $this->listView->setProduct($product_data);
        $review_data = array_map(function ($item) {
            $data = $item->getData();
            if ($votes = $item->getRatingVotes()) {
                $data["votes"] = array_map(function ($element) {
                    return $element->getData();
                }, $votes);
            } else {
                $data["votes"] = null;
            }

            return $data;
        }, $listView_block->getReviewsCollection()->getItems());
        return $review_data;
    }

    public function get_information_data($product): array
    {
        if ($this->registry->registry("product")) {
            $this->registry->unregister("product");
        }
        $this->registry->register("product", $product);
        return $this->attributes->getAdditionalData();
    }

    public function getProductRelated($product_id)
    {
        $product = $this->productRepository->getById($product_id);
        $product_related = $this->product_related;
        $related_items = $product_related->setProduct($product)->getItems();
        return $this->convertProductList($related_items);
    }

    public function productUpsell($product_id)
    {
        $product = $this->productRepository->getById($product_id);
        $product_upsell = $this->product_upsell;
        $related_items = $product_upsell->setProduct($product)->getItems();
        return $this->convertProductList($related_items);
    }

    public function rate_and_review($product)
    {
        $review = $this->reviewFactory->create();
        $review->getEntitySummary($product);
    }

    public function resize_image($product, string $image = "", $w = 400, $h = 400) // image: là tên file ảnh(ví dụ: /m/t/mt07-gray_main_1.jpg)
    {
        try {
            $image_url = $this->image_helper->init($product, 'image', ['type' => 'image'])->setImageFile($image)->resize($w, $h)->getUrl();
            return $image_url;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function product_image_url($product, $ex_media = 0, $w = 400, $h = 400): array
    {
        $ex_images = null;
        foreach ($product->getMediaGalleryImages() as $k => $image) {

            $thumbnailImage = $this->image_helper->init($product, 'product_page_image_small')
                ->setImageFile($image->getFile())->resize(240, 300)
                ->getUrl();
            $largeImage = $this->image_helper->init($product, 'product_page_image_large')
                ->setImageFile($image->getFile())
                ->getUrl();
            if (!$ex_media) {
                return [
                    "thum_image" => $this->data_helper->api_url_replace($thumbnailImage),
                    "large_image" => $this->data_helper->api_url_replace($largeImage)
                ];
            }
            //            $ex_images[] = $this->data_helper->api_url_replace($thumbnailImage);
            $ex_images[] = $this->data_helper->api_url_replace($this->resize_image($product, $image->getFile(), $w, $h));
        }
        return $ex_images;
    }

    public function get_bunder_options($product_data)
    {
        $res_bundle_options = null;

        $bundle_block = $this->bundle;
        $bundle_block->setProduct($product_data);
        $bundle_options = $bundle_block->getOptions();
        foreach ($bundle_options as $bunder_item) {
            $bunderDataFactory = $this->bunderDataFactory->create();
            $bunderDataFactory->setId($bunder_item->getOptionId());
            $bunderDataFactory->setParentId($bunder_item->getParentId());
            $bunderDataFactory->setLabel($bunder_item->getTitle() ?? $bunder_item->getDefaultTitle());
            $bunderDataFactory->setPosition($bunder_item->getPosition());
            $bunderDataFactory->setType($bunder_item->getType());
            $bunderDataFactory->setRequire(!!$bunder_item->getRequired());
            $bunderDataFactory->setSelections($this->get_list_products($bunder_item->getSelections(), true));

            $res_bundle_options[] = $bunderDataFactory;
        }
        return $res_bundle_options;
    }

    /**
     * @return \Tha\Devob\Api\Data\Product\Config\ConfigDataInterface
     */
    public function get_config_options($product)
    {
        $cache_Key = "config_data_" . $product->getId();
        if (!($this->cache->load($cache_Key) && $config_data = $this->serializer->unserialize($this->cache->load($cache_Key)))) {
            $configurable_block = $this->objectManagerInterface->get("Magento\ConfigurableProduct\Block\Product\View\Type\Configurable");
            $configurable_block->setProduct($product);
            $config_data = json_decode($configurable_block->getJsonConfig(), true);
            $this->cache->save(
                $this->serializer->serialize($config_data),
                $cache_Key,
                [$product->getId()],
                86400
            );
        }

        $ConfigData = $this->configDataFactory->create();
        $ConfigData->setAttributes($this->get_config_attributes($config_data["attributes"]));
        $ConfigData->setImages($this->get_images($config_data["images"]));
        $ConfigData->setChooseText($config_data["chooseText"]);
        $ConfigData->setIndex($this->get_config_index($config_data["index"]));
        return $ConfigData;
    }

    /**
     * @return \Tha\Devob\Api\Data\Product\Config\AttributesInterface[]
     */
    public function get_config_attributes($attributes = [])
    {
        $config_attributes = null;
        foreach ($attributes as $key => $attr) {
            $attributesFactory = $this->attributesFactory->create();
            $attributesFactory->setId($key);
            $attributesFactory->setCode($attr["code"]);
            $attributesFactory->setLabel($attr["label"]);
            $attributesFactory->setPosition($attr["position"]);
            $attributesFactory->setOptions($this->get_attribute_option($attr["options"]));
            $config_attributes[] = $attributesFactory;
        }
        return $config_attributes;
    }

    /**
     * @return Tha\Devob\Api\Data\Product\Config\OptionInterface[]
     */
    public function get_attribute_option($options = [])
    {
        $options_data = null;
        foreach ($options as $key => $option) {
            $optionFactory = $this->optionFactory->create();
            $optionFactory->setId($option["id"]);
            $optionFactory->setLabel($option["label"]);
            $optionFactory->setProducts($option["products"]);
            $options_data[] = $optionFactory;
        }
        return $options_data;
    }

    /**
     * @return \Tha\Devob\Api\Data\Product\MediaInterface[]
     */
    public function get_images($images = [])
    {
        $images_data = null;
        foreach ($images as $key => $image) {
            $media = $this->mediaFactory->create();
            $media->setId((int) $key);
            $media->setThumb($image[0]["thumb"]);
            $media->setImg($image[0]["img"]);
            $media->setFull($image[0]["full"]);
            $media->setCaption($image[0]["caption"]);
            $media->setType($image[0]["type"]);
            $media->setPosition($image[0]["position"]);
            $media->setIsMain($image[0]["isMain"]);
            $media->setVideoUrl($image[0]["videoUrl"]);
            $images_data[] = $media;
        }
        return $images_data;
    }

    /**
     * @return \Tha\Devob\Api\Data\Product\Config\ConfigIndexInterface[]
     */
    public function get_config_index($indexs = [])
    {
        $index_values = null;
        foreach ($indexs as $key => $index) {
            $configIndexFactory = $this->configIndexFactory->create();
            $configIndexFactory->setProId((int) $key);
            $configIndexFactory->setIndex($this->get_index_value($index));
            $index_values[] = $configIndexFactory;
        }
        return $index_values;
    }

    /**
     * @return \Tha\Devob\Api\Data\BaseAttributesInterface[]
     */
    public function get_index_value($values = [])
    {
        $indexs = null;
        foreach ($values as $key => $value) {
            $baseAttributesFactory = $this->baseAttributesFactory->create();
            $baseAttributesFactory->setKey((string)$key);
            $baseAttributesFactory->setValue($value);
            $indexs[] = $baseAttributesFactory;
        }
        return $indexs;
    }

    public function get_filters($category_id = null)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $filterableAttributes = $objectManager->getInstance()->get(\Magento\Catalog\Model\Layer\Category\FilterableAttributeList::class);
        $layerResolver = $objectManager->getInstance()->get(\Magento\Catalog\Model\Layer\Resolver::class);
        $filterList = $objectManager->getInstance()->create(
            \Magento\Catalog\Model\Layer\FilterList::class,
            [
                'filterableAttributes' => $filterableAttributes
            ]
        );

        $layer = $layerResolver->get()->setCurrentCategory($category_id);
        $filters = $filterList->getFilters($layer);

        $maxPrice = $layer->getProductCollection()->getMaxPrice();
        $minPrice = $layer->getProductCollection()->getMinPrice();
        ["min" => $minPrice, "max" => $maxPrice];

        $filterAttrs = [];
        foreach ($filters as $filter) {
            $attr_code = (string)$filter->getRequestVar();
            $attr_label = (string)$filter->getName();
            if ($items = $filter->getItems()) {
                $filterAttrs[] = [
                    "code" => $attr_code,
                    "label" => $attr_label,
                    "item" => array_map(function ($item){
                        $data = $item->getData();
                        unset($data ["filter"]);
                        return $data;
                    }, $items)
                ];
            }
        }
        return $filterAttrs;
    }
}
