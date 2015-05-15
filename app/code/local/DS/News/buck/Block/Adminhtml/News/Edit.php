<?php

class DS_News_Block_Adminhtml_News_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'dsnews';
        $this->_controller = 'adminhtml_news';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('dsnews');
        $model = Mage::registry('current_news');

        if ($model->getId()) {
            return $helper->__("Edit Testimonials  item '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add Testimonials  item");
        }
    }

}