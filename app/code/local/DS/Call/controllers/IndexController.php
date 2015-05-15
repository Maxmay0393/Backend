<?php
class DS_Call_IndexController extends Mage_Core_Controller_Front_Action
{
	
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function viewAction()
    {
        $callId = Mage::app()->getRequest()->getParam('id', 0);
        $call = Mage::getModel('dscall/call')->load($callId);

        if ($call->getId() > 0) {
            $this->loadLayout();
            $this->getLayout()->getBlock('call.content')->assign(array(
                "callItem" => $call,
            ));
            $this->renderLayout();
        } else {
            $this->_forward('noRoute');
        }
    }
	
	public function saveAction()
 {
    //выбираем данные из пришедшего запроса POST
    $title = ''.$this->getRequest()->getPost('title');
    $content = ''.$this->getRequest()->getPost('content');
	
     
 
    if(isset($title)&&($title!='') && isset($content)&&($content!=''))
   {
      //записываем данные в базу
      $contact = Mage::getModel('dscall/call');
      $contact->setData('title', $title);
      $contact->setData('content', $content);
      $contact->save();
   }
   //перенаправление на метод index контроллера indexController
    
   $this->_redirect('Call_back/index/index');
}

}