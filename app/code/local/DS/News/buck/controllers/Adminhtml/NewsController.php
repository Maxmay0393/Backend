<?php

class DS_News_Adminhtml_NewsController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('dsnews');
        $this->_addContent($this->getLayout()->createBlock('dsnews/adminhtml_news'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        Mage::register('current_news', Mage::getModel('dsnews/news')->load($id));

        $this->loadLayout()->_setActiveMenu('dsnews');
        $this->_addContent($this->getLayout()->createBlock('dsnews/adminhtml_news_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            try {
                $model = Mage::getModel('dsnews/news');
                $model->setData($data)->setId($this->getRequest()->getParam('id'));
                if(!$model->getCreated()){
                    $model->setCreated(now());
                }
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('News was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('dsnews/news')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('News was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }


//    public function massStatusAction()
//    {
//
//       $newsIds = $this->getRequest()->getParam('news');
//        $status     = (int)$this->getRequest()->getParam('status');
//            if(!is_array($newsIds)) {
//                  // No products selected
//                    Mage::getSingleton('adminhtml/session')->addError($this->__('Please select tag(s)'));
//            } else {
//                     try {
//                            foreach ($newsIds as $id)
//                            {           Mage::getSingleton('dsnews/news')
//                                     ->load($id)
//                                      ->setStatus($this->getRequest()->getParam('status'));
//
//                            }
//               Mage::getSingleton('adminhtml/session')->addSuccess(
//                     $this->__('Total of %d record(s) were successfully updated', count($newsIds))
//                );
//           } catch (Exception $e) {
//                         $this->_getSession()->addError($e->getMessage());
//                     }
//         }
//
//        $this->_redirect('*/*/');
//
//    }
    public function massStatusAction()
    {   $news_id = $this->getRequest()->getParam('id');
        $newsIds = $this->getRequest()->getParam('news');
        if (!is_array($newsIds)) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select item(s)'));
        } else {
            try {
                foreach ($newsIds as $news_id) {
                            Mage::getSingleton('dsnews/news')
                            ->load($news_id)
                            ->setStatus($this->getRequest()->getParam('status')->save());
}
                $this->_getSession()->addSuccess(
                    $this->__('Total of %d record(s) were successfully updated', count($newsIds))
                );
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/');
    }




    public function massDeleteAction()
    {
        $news = $this->getRequest()->getParam('news', null);

        if (is_array($news) && sizeof($news) > 0) {
            try {
                foreach ($news as $id) {
                    Mage::getModel('dsnews/news')->setId($id)->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d news have been deleted', sizeof($news)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select news'));
        }
        $this->_redirect('*/*');
    }

}