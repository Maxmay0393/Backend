<?php
class DS_News_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->getLayout()->getBlock('head')->setTitle($this->__(Mage::getStoreConfig('my/my_group/my_input',Mage::app()->getStore())));
        $this->getLayout()->getBlock('head')->setDescription($this->__(Mage::getStoreConfig('my/my_group/my_input2',Mage::app()->getStore())));
        $this->getLayout()->getBlock('head')->setKeywords($this->__(Mage::getStoreConfig('my/my_group/my_input1',Mage::app()->getStore())));
        $this->renderLayout();

    }

    public function viewAction()
    {
//        $newsId = Mage::app()->getRequest()->getParam('id', 0);
//        $news = Mage::getModel('dsnews/news')->load($newsId);
//
//        if ($news->getId() > 0) {
            $this->loadLayout();
//            $this->getLayout()->getBlock('news.content')->assign(array(
//                "newsItem" => $news,
//            ));
            $this->renderLayout();
//        } else {
//            $this->_forward('noRoute');
//        }
    }
	
	public function saveAction()
 {
    //выбираем данные из пришедшего запроса POST
    $title = ''.Mage::getSingleton('customer/session')->getCustomer()->getId();
    $content = ''.$this->getRequest()->getPost('content');

     $user_name = ''.Mage::getSingleton('customer/session')->getCustomer()->getName();
 
    if(isset($title)&&($title!='') && isset($content)&&($content!='')&& isset($user_name)&&($user_name!=''))
   {
      //записываем данные в базу
      $contact = Mage::getModel('dsnews/news');
      $contact->setData('title', $title);
      $contact->setData('content', $content);
       $contact->setData('user_name', $user_name);
      $contact->save();
   }
   //перенаправление на метод index контроллера indexController
    
   $this->_redirect('testimonials/index/index');
}

}