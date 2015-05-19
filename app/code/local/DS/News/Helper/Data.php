<?php

class DS_News_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getUsersList()
    {

        $groups = Mage::getResourceModel('customer/customer_collection')->addNameToSelect()->load();
        $result=array();
        foreach ($groups as $customer) {
                                                 $result[] =  array(
                                                     'label' => $customer->getName(),
                                                     'value' => $customer->getid(),
                                                 );

                                       }

        return $result;
    }
    public function getUsersName()
    {

        $groups = Mage::getResourceModel('customer/customer_collection')->addNameToSelect()->load();
        $result=array();
        foreach ($groups as $customer) {
            $result[] =  array(
                'label' => $customer->getName(),
                'value' => $customer->getName(),
            );

        }

        return $result;
    }
    public function getUsersListOnGrid()
    {
        $groups = Mage::getResourceModel('customer/customer_collection')->addNameToSelect()->load();
        $output = array();
        foreach($groups as $category){
            $output[$category->getid()] = $category->getName();
        }
        return $output;

    }
}