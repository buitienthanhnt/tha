<?php
namespace Tha\Chart\Block;

use Magento\Catalog\Model\ProductFactory;

class Line extends \Magento\Framework\View\Element\Template
{
    protected $orderCollectionFactory;
    protected $order;
    protected $pro;
    protected $statusCollectionFactory;
    protected $productRepository;


    public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                                \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
                                \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
                                \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
                                \Magento\Sales\Model\Order $order,
                                ProductFactory $pro,
                                \Magento\Sales\Model\ResourceModel\Order\Status\CollectionFactory $statusCollectionFactory,
                                \Magento\Catalog\Model\ProductRepository $productRepository
                                )
                                {
        $this->pro = $pro;
        $this->productRepository = $productRepository;
        $this->statusCollectionFactory = $statusCollectionFactory;
        $this->order = $order;
        $this->orderRepository = $orderRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->orderCollectionFactory = $orderCollectionFactory;
        parent::__construct($context);
    }

    // so don hang trong ngay theo thoi gian
    public function sodon(){
     $date = (new \DateTime())->modify('-1 day');

     $searchCriteria = $this->searchCriteriaBuilder
        ->addFilter(
            'created_at',
            $date->format('Y-m-d'),
            'eq'
        )->create();

     $orders = $this->orderRepository->getList($searchCriteria);
     echo(count($orders));
    }

    // tra ve tong so san pham cua cac order trong ngay
    public function pro_by_orders(array $time){
        $pro_num = 0;
        $collections = $this->orderCollectionFactory->create()
        ->addFieldToSelect('*')
        ->addFieldToFilter('created_at', ['from' => $time['be'], 'to' => $time['en']]);
        foreach ($collections as $collection) {
            $order = $this->order->load($collection->getId());
            $pro_num += count($order->getItems());
        }
        return $pro_num;
    }

    // tra ve thoi gian trong ngay, so don hang trong ngay, tong so san pham cua cac don hanag grong ngay
    public function so_don_hang($date){
        if (is_array($date)) {
           $tim = $date;
        }else {
            $tim = [];
            $tim = is_array($date) ? $date : [];

            $time = is_int($date) ? time() - $date*24*60*60 : strtotime($date);

            $tim['be'] = date('Y-m-d 00:00:00', $time);
            $tim['en'] = date('Y-m-d 00:00:00', $time + 24*60*60);
        }

        $collection = $this->orderCollectionFactory->create()
            ->addFieldToSelect('*')
            ->addFieldToFilter('created_at', ['from' => $tim['be'], 'to' => $tim['en']]);
        //
        $pros = $this->pro_by_orders($tim);
        return ['order' => count($collection), 'time' => str_replace(" 00:00:00", '', $tim['be']), 'pro' => $pros];
    }

    // thoi gian - so don - so san pham theo cac 7 ngay gan nhat
    public function arr_don(int $num = 7){
        $arr = [];
        $arr['name'] = 'order';
        $arr['conten'] = 'so luong don hang theo 7 ngay gan nhat';
        for ($i=$num; $i >= 0; $i--) {
            $arr['time'][] = $this->so_don_hang($i)['time'];
            $arr['data'][] = $this->so_don_hang($i)['order'];
            $arr['pros'][] = $this->so_don_hang($i)['pro'];
        }
        return $arr;
    }

    // tra ve mang gom thoi gian bat dau va thoi gian ket thuc cua 1 ngay
    public function ngay($str){
        $time = is_int($str) ? $str : strtotime($str);
        $arr['be'] = date('Y-m-d 00:00:00', $time);


        return $arr;
    }

    // tra ve mot san pham theo id cua no
    public function get_pro(int $id = 6){
        $pro = $this->pro->create();
        $data = $pro->load($id);
        return $data;
    }

    // tat ca cac trang thai don hang trong magento
    public function getAllOrderStatus(){
        $options = $this->statusCollectionFactory->create()->toOptionArray();
        return $options;
    }

    // tra ve mang gom key la status va value la so san pham theo trang thai
    public function order_by_status(){
        $status = $this->getAllOrderStatus();
        $arrs = [];
        $i = 0;
        foreach ($status as $statu) {
           $number = $this->orderCollectionFactory->create()->addFieldToSelect(
                '*'
            )->addFieldToFilter(
                'status',
                ['eq' => $statu['value']]
            )->setOrder(
                'created_at',
                'desc'
            );
            $arrs[$i][] = $statu['label'];
            $arrs[$i][] = count($number);
            $i+=1;
        }
        return json_encode($arrs);
    }

    // tong doanh so trong mot ngay cua cac order return number
    public function doanh_so(array $time){
        $moneys = 0;
        $all_pros = $this->pro_in_order($time);
       foreach ($all_pros as $all_pro) {
           $moneys += $all_pro->getprice();
       }
       return $moneys;
    }

    // return array paroduct of all order in the day
    public function pro_in_order(array $time){
        $arrs = [];
        $collections = $this->orderCollectionFactory->create()
        ->addFieldToSelect('*')
        ->addFieldToFilter('created_at', ['from' => $time['be'], 'to' => $time['en']]);
       foreach ($collections as $collection) {
           $pros = $collection->getitems();
           foreach ($pros as $pro) {
              $arrs[] = $pro;
           }
       }
       return $arrs;
    }

    // tra ve cac ngay trong tuan tu thu hai den chu nhat.
    public function day_in_week($time){
        $time = is_string($time) ? strtotime($time) : $time;
        $date = date('w', $time);
        $arrs = [];
        $da = ($date == 0 ? 7 : $date) - 1;

        for ($i = $da; $i >= 0; $i--) {
           $tim = date('Y-m-d 00:00:00', $time - 24*60*60*$i);
           //echo $tim."<br>";
           $arrs[] = $this->ngay($tim);
        }
        for ($i = 1; $i < 7 - $da; $i++) {
            $tim = date('Y-m-d 00:00:00', $time + 24*60*60*$i);
            //echo $tim."<br>";
            $arrs[] = $this->ngay($tim);
        }
        return $arrs;
    }

    public function get_pro_res(int $id = 1){
        $pro = $this->productRepository->getById($id);
        return $pro->getData();
    }

    public function tk_in_week($time){
        $arr = [];
        $date = is_int($time) ? $time : strtotime($time);
        $arr_times = $this->day_in_week($date);
        foreach ($arr_times as $arr_time) {
            $arr['time'][] = $this->so_don_hang($arr_time)['time'];
            $arr['data'][] = $this->so_don_hang($arr_time)['order'];
            $arr['pros'][] = $this->so_don_hang($arr_time)['pro'];

        }
        return json_encode($arr);
    }

    public function ss_week($time){
        $monney = [];
        $dates = $this->day_in_week($time);
        foreach ($dates as $date) {
           $monney[$date] = $this->doanh_so(($date));
        }
        return json_encode($monney);
    }

}
