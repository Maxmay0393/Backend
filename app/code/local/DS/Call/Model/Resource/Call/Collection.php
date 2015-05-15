<?php

class DS_Call_Model_Resource_Call_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('dscall/call');
    }

}