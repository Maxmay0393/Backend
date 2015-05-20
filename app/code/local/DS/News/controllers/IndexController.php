<?php
class DS_News_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->getLayout()->getBlock('head')->setTitle($this->__(Mage::getStoreConfig('ds/ds_group/ds_title',Mage::app()->getStore())));
        $this->getLayout()->getBlock('head')->setDescription($this->__(Mage::getStoreConfig('ds/ds_group/ds_description',Mage::app()->getStore())));
        $this->getLayout()->getBlock('head')->setKeywords($this->__(Mage::getStoreConfig('ds/ds_group/ds_keywords',Mage::app()->getStore())));
        $this->renderLayout();

    }

   
	
	public function saveAction()
 {
    //select data from a POST request came
    $title = ''.Mage::getSingleton('customer/session')->getCustomer()->getId();
    $content = ''.$this->getRequest()->getPost('content');
     $user_name = ''.Mage::getSingleton('customer/session')->getCustomer()->getName();
 
    if(isset($title)&&($title!='') && isset($content)&&($content!='')&& isset($user_name)&&($user_name!=''))
   {
      //write data to the database
      $contact = Mage::getModel('dsnews/news');
      $contact->setData('title', $title);
      $contact->setData('content', $content);
      $contact->setData('user_name', $user_name);
      $contact->save();
   }
     Mage::getSingleton('core/session')->addSuccess('Testimonials adopted and will be published after verification');
   //redirection to the index method indexController
    
   $this->_redirect('testimonials/index/index');
}

}
?>