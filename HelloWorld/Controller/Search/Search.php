<?php


namespace HelloWorld\HelloWorld\Controller\Search;

use HelloWorld\HelloWorld\Model\Store as Store;
use Magento\Framework\Controller\ResultFactory;

class Search extends \Magento\Framework\App\Action\Action
{

    private $model;
    protected $_pageFactory;
    protected $resultJsonFactory;

    public function __construct (
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        Store $model
    )
    {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->model = $model;
        return parent::__construct($context);
    }




    public function execute()
    {
        //
        if ($inp = $this->getRequest()->getParams('data')){

            $test = $this->model->findBySKU( $this->getRequest()->getParam('test_input') );


            return  $this->resultJsonFactory->create()->setData(['items' => array_keys($test)]);

        }


    }


//http://m231cevlad.student7.ap72copy.sty/
//helloworld/search/search
//ssh ap72copy из под корня
}