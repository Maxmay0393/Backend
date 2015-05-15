<?php

class DS_Call_Block_Adminhtml_Call_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'dscall';
        $this->_controller = 'adminhtml_call';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('dscall');
        $model = Mage::registry('current_call');

        if ($model->getId()) {
            return $helper->__("Edit Call_back  item '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add Call_back  item");
        }
    }

}