<?php

class DS_Call_Block_Adminhtml_Call extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    protected function _construct()
    {
        parent::_construct();

        $helper = Mage::helper('dscall');
        $this->_blockGroup = 'dscall';
        $this->_controller = 'adminhtml_call';

        $this->_headerText = $helper->__('Call_back  Management');
       $this->_addButtonLabel = $helper->__('Add Call_back ');
    }

}