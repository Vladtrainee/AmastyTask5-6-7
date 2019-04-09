<?php


namespace HelloWorld\HelloWorld\Controller\Action;

class AddToCart extends \Magento\Framework\App\Action\Action
{
    private $checkingAnswers = [];
    protected $_pageFactory;

    private function checkLength($inp)
    {
        if (!strlen($inp)) {
            return false;
        }
        return true;
    }

    private function checkAnswers()
    {
        if ($this->checkingAnswers) {
            foreach ($this->checkingAnswers as $a) {
                if (!$a)
                    return false;
            }
            return true;
        }
    }

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        die("jhvgv");

        return $this->_pageFactory->create();
    }
}

//http://m231ce.student7.ap72.sty/
