<?php

class DS_Call_Model_Resource_Call extends Mage_Core_Model_Mysql4_Abstract
{

    public function _construct()
    {
        $this->_init('dscall/table_call', 'call_id');
    }

}