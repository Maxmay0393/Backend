<?php
class DS_News_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function viewAction()
    {
        $newsId = Mage::app()->getRequest()->getParam('id', 0);
        $news = Mage::getModel('dsnews/news')->load($newsId);

        if ($news->getId() > 0) {
            $this->loadLayout();
            $this->getLayout()->getBlock('news.content')->assign(array(
                "newsItem" => $news,
            ));
            $this->renderLayout();
        } else {
            $this->_forward('noRoute');
        }
    }
	
	public function saveAction()
 {
    //выбираем данные из пришедшего запроса POST
    $title = ''.Mage::getSingleton('customer/session')->getCustomer()->getName();
    $content = ''.$this->getRequest()->getPost('content');
	
     
 
    if(isset($title)&&($title!='') && isset($content)&&($content!=''))
   {
      //записываем данные в базу
      $contact = Mage::getModel('dsnews/news');
      $contact->setData('title', $title);
      $contact->setData('content', $content);
      $contact->save();
   }
   //перенаправление на метод index контроллера indexController
    
   $this->_redirect('Testimonials/index/index');
}

}