<?php

/**
 * PACKT News Status Model
 *
 * @category   PACKT
 * @package    PACKT_News
 * @author     Nurul Ferdous <ferdous@dynamicguy.com>
 */
class PACKT_News_Model_Status extends Varien_Object
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 2;

    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED => Mage::helper('news')->__('Enabled'),
            self::STATUS_DISABLED => Mage::helper('news')->__('Disabled')
        );
    }

}