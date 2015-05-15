<?php

class DS_Call_Block_Call extends Mage_Core_Block_Template
{

    public function getLoSrc()
    {
        echo'wwww';
    }

    public function getCallCollection()
    {
        $callCollection = Mage::getModel('dscall/call')->getCollection();
        $callCollection->setOrder('call_id', 'DESC');
        return $callCollection;
    }
	 public function getWelcome()
    {
        if (empty($this->_data['welcome'])) {
            if (Mage::isInstalled() && Mage::getSingleton('customer/session')->isLoggedIn()) {
                $this->_data['welcome'] = $this->__('Welcome, %s!', $this->escapeHtml(Mage::getSingleton('customer/session')->getCustomer()->getName()));
            } else {
                $this->_data['welcome'] = Mage::getStoreConfig('design/Call/welcome');
            }
        }

        return $this->_data['welcome'];
    }
public function __construct()
    {
        parent::__construct();
        $collection = Mage::getModel('dscall/call')->getCollection();
        $this->setCollection($collection);
        $collection->setOrder('created', 'DESC');
        return $collection;
    }
 
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
 
        $pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
        $pager->setAvailableLimit(array(5=>5,10=>10,20=>20,'all'=>'all'));
        $pager->setCollection($this->getCollection());
        $this->setChild('pager', $pager);
        $this->getCollection()->load();
        return $this;
    }
 
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
  
}
?>
