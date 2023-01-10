<?php

namespace Tha\Chart\Controller\Adminhtml\Line;

//use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $_pageFactory;
    protected $orderRepository;
    protected $searchCriteriaBuilder;

    public function __construct(\Magento\Backend\App\Action\Context $context,
                                PageFactory $pageFactory,
                                \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
                                \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
                                )
                                {
        // $this->_pageFactory = $pageFactory;
        $this->orderRepository = $orderRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context);
    }

    public function execute(){
       // echo "day la noi dung nam trong controller backend";
        //$result = $this->_pageFactory->create();
        // thay doi tieu de cho trang admin vua tao
       // $result->getConfig()->getTitle()->prepend(__('MAP Order'));
        //return $result;

        $date = (new \DateTime())->modify('-3 day');

        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter(
                'status',
                'pending',
                'eq'
            )->addFilter(
                'created_at',
                $date->format('Y-m-d'),
                'gt'
            )->create();
            $orders = $this->orderRepository->getList($searchCriteria);
            var_dump($orders);
        exit();
    }
}

?>
