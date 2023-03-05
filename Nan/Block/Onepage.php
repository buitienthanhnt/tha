<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Tha\Nan\Block;


/**
 * Onepage checkout block
 * @api
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @since 100.0.2
 */
class Onepage extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Framework\Data\Form\FormKey
     */
    protected $formKey;

    /**
     * @var bool
     */
    protected $_isScopePrivate = false;

    /**
     * @var array
     */
    protected $jsLayout;

    /**
     * @var \Magento\Checkout\Model\CompositeConfigProvider
     */
    protected $configProvider;

    /**
     * @var array|\Magento\Checkout\Block\Checkout\LayoutProcessorInterface[]
     */
    protected $layoutProcessors;

    /**
     * @var \Magento\Framework\Serialize\SerializerInterface
     */
    private $serializer;

    /**
     * @var \Magento\Checkout\Model\Session $checkoutSession
     */
    protected $checkoutSession;

    /**
     * @var \Magento\Quote\Api\ShippingMethodManagementInterface $shippingMethodManager
     */
    protected $shippingMethodManager;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Data\Form\FormKey $formKey
     * @param \Magento\Checkout\Model\CompositeConfigProvider $configProvider
     * @param array $layoutProcessors
     * @param array $data
     * @param \Magento\Framework\Serialize\Serializer\Json $serializer
     * @param \Magento\Framework\Serialize\SerializerInterface $serializerInterface
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param \Magento\Quote\Api\ShippingMethodManagementInterface $shippingMethodManager
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Data\Form\FormKey $formKey,
        \Magento\Checkout\Model\CompositeConfigProvider $configProvider,
        array $layoutProcessors = [],
        array $data = [],
        \Magento\Framework\Serialize\Serializer\Json $serializer = null,
        \Magento\Framework\Serialize\SerializerInterface $serializerInterface = null,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Quote\Api\ShippingMethodManagementInterface $shippingMethodManager
    ) {
        parent::__construct($context, $data);
        $this->formKey = $formKey;
        $this->_isScopePrivate = true;
        $this->jsLayout = isset($data['jsLayout']) && is_array($data['jsLayout']) ? $data['jsLayout'] : [];
        $this->configProvider = $configProvider;
        $this->layoutProcessors = $layoutProcessors;
        $this->serializer = $serializerInterface ?: \Magento\Framework\App\ObjectManager::getInstance()
            ->get(\Magento\Framework\Serialize\Serializer\JsonHexTag::class);
        $this->checkoutSession = $checkoutSession;
        $this->shippingMethodManager = $shippingMethodManager;
    }

    /**
     * @inheritdoc
     */
    public function getJsLayout()
    {
        foreach ($this->layoutProcessors as $processor) {
            $this->jsLayout = $processor->process($this->jsLayout);
        }
        $jsLayout = $this->jsLayout;

        // progressBar
        if (isset($jsLayout['components']['checkout']['children']["progressBar"])) {
            unset($jsLayout['components']['checkout']['children']["progressBar"]);
        }
        // authentication
        if (isset($jsLayout['components']['checkout']['children']["authentication"])) {
            unset($jsLayout['components']['checkout']['children']["authentication"]);
        }

        // store-pickup
        if (isset($jsLayout['components']['checkout']['children']["steps"]["children"]["store-pickup"])) {
            unset($jsLayout['components']['checkout']['children']["steps"]["children"]["store-pickup"]);
        }

        if (strpos($this->templateContext->_request->getRequestUri(), "shippingaddress") == false || strpos($this->templateContext->_request->getRequestUri(), "chuan")  == false) {
            $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']["children"]["payment"] = $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']["children"]["payment"];
            unset($jsLayout['components']['checkout']['children']['steps']['children']['billing-step']["children"]["payment"]["component"]);

            $jsLayout['components']['checkout']['children']['sidebar']['children']["summary"]["children"]["totals"]["children"]["tax"] = [
                "component" => "uiComponent",
                "sortOrder" => 40,
                "config" => ["title" => "FPT"]
            ];
            $jsLayout['components']['checkout']['children']['sidebar']['children']["summary"]["children"]["totals"]["children"]["weee"] = [
                "component" => "Magento_Weee/js/view/checkout/summary/weee",
                "sortOrder" => 35,
                "config" => ["title" => "tax"]
            ];

            $jsLayout['components']['checkout']['children']['sidebar']['children']["summary"]["children"]["totals"]["children"]["discount"] = [
                "component" => "Magento_SalesRule/js/view/summary/discount",
                "sortOrder" => 35,
                "config" => ["title" => "Discount"]
            ]; //

            $jsLayout['components']['checkout']['children']['sidebar']['children']["summary"]["children"]["totals"]["children"]["vertex-messages"] = [
                "component" => "Vertex_Tax/js/view/checkout/summary/tax-messages",
                "config" => ["title" => "Vertex Messages", "template" => "Vertex_Tax/checkout/cart/totals/tax-messages"]
            ];

            $jsLayout['components']['checkout']['children']['sidebar']['children']["summary"]["children"]["cart_items"]["children"]["details"]["children"]["subtotal"]["children"] = [
                "weee_row_incl_tax" => [
                    "component" => "Magento_Weee/js/view/checkout/summary/item/price/row_incl_tax",
                    "displayArea" => "row_incl_tax"
                ],
                "weee_row_excl_tax" => [
                    "component" => "Magento_Weee/js/view/checkout/summary/item/price/row_excl_tax",
                    "displayArea" => "row_excl_tax"
                ]
            ];
        }

        if (strpos($this->templateContext->_request->getRequestUri(), "shippingaddress") !== false) {
            unset($jsLayout['components']['checkout']['children']['steps']['children']['billing-step']);
            unset($jsLayout['components']['checkout']["children"]['sidebar']);
        }
        $this->jsLayout = $jsLayout;
        return $this->serializer->serialize($this->jsLayout);
    }

    /**
     * Retrieve form key
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }

    /**
     * Retrieve checkout configuration
     *
     * @return array
     * @codeCoverageIgnore
     */
    public function getCheckoutConfig()
    {
        $configProvider = $this->configProvider->getConfig();
        return $configProvider;
    }

    public function selected_shipping_method()
    {
        $shippingMethodData = null;
        try {
            $quoteId = $this->checkoutSession->getQuote()->getId();
            $shippingMethod = $this->shippingMethodManager->get($quoteId);
            if ($shippingMethod) {
                $shippingMethodData = $shippingMethod->__toArray();
            }
        } catch (\Exception $exception) {
            $shippingMethodData = null;
        }
        return \Zend_Json::encode($shippingMethodData);
    }

    /**
     * Get base url for block.
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }

    /**
     * Retrieve serialized checkout config.
     *
     * @return bool|string
     * @since 100.2.0
     */
    public function getSerializedCheckoutConfig()
    {
        return  $this->serializer->serialize($this->getCheckoutConfig());
    }

    public function isModuleEnabled($module_name)
    {
        return false;
    }

    public function get_request_uri()
    {
        return $this->templateContext->_request->getRequestUri();
    }
}
