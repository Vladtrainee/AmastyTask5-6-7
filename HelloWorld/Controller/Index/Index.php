<?php

namespace HelloWorld\HelloWorld\Controller\Index;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Checkout\Controller\Cart\Add;
use Magento\Checkout\Model\Cart as CustomerCart;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    private $checkingAnswers = [];
    protected $_pageFactory;
    private $productRepository;
    private $resultJsonFactory;
    private $cart;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        CustomerCart $cart,
        ProductRepositoryInterface $productRepository,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->productRepository = $productRepository;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->cart = $cart;
        return parent::__construct($context);
    }

    private function checkLength($inp){
        if (!strlen($inp)){
            return false;
        }
        return true;
    }

    private function checkAnswers(){
        if ($this->checkingAnswers) {
            foreach ($this->checkingAnswers as $a) {
                if (!$a)
                    return false;
            }
            return true;
        }
    }



    public function execute()
    {

        if ($this->getRequest()->getPost('test_input')){

            $inp = $this->getRequest()->getPost('test_input');
            
            $product = $this->productRepository->get($inp);

            $params = array(
                'qty' => 1,
            );

            $this->cart->addProduct($product->getId(), $params);
            $this->cart->save();

            return  $this->resultJsonFactory->create()->setData('true');

        }

        else
            return $this->_pageFactory->create();
    }
}