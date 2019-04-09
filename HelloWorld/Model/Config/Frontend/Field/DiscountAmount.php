<?php


namespace HelloWorld\HelloWorld\Model\Config\Frontend\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

class DiscountAmount extends AbstractFieldArray
{
    protected function _prepareToRender()
    {
        $this->addColumn(
            'price',
            [
                'label' => __('Price'),
                'class' => 'required-entry'
            ]
        );
        $this->addColumn(
            'discount_amount',
            [
                'label' => __('Discount'),
                'class' => 'required-entry'
            ]
        );
        $this->_addAfter = false;
        $this->_addButtonLabel = __('New discount');
    }
}