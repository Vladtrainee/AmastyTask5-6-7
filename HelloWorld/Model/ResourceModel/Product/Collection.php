<?php


namespace HelloWorld\HelloWorld\Model\ResourceModel\Product;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'product_id';
    protected $_eventPrefix = 'helloworld_helloworld_product_collection';
    protected $_eventObject = 'product_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Helloworld\HelloWorld\Model\Product', 'HelloWorld\HelloWorld\Model\ResourceModel\Product');
    }

}
