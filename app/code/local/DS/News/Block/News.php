<?php

class DS_News_Block_News extends Mage_Core_Block_Template
{

    
	 public function getWelcome()
    {
        if (empty($this->_data['welcome'])) {
            if (Mage::isInstalled() && Mage::getSingleton('customer/session')->isLoggedIn()) {
                $this->_data['welcome'] = $this->__('Welcome, %s!', $this->escapeHtml(Mage::getSingleton('customer/session')->getCustomer()->getName()));
            } else {
                $this->_data['welcome'] = Mage::getStoreConfig('design/News/welcome');
            }
        }
        return $this->_data['welcome'];
    }




public function __construct()
    {
        parent::__construct();
        $collection = Mage::getModel('dsnews/news')->getCollection()->addFieldToFilter('status', '1');
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
