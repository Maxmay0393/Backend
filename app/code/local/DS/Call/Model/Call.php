<?php

class DS_Call_Model_Call extends Mage_Core_Model_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('dscall/call');
    }

}