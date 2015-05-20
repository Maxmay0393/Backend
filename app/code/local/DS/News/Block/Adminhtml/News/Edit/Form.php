<?php

class DS_News_Block_Adminhtml_News_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $helper = Mage::helper('dsnews');
        $model = Mage::registry('current_news');

        $form = new Varien_Data_Form(array(
                        'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save', array(
                        'id' => $this->getRequest()->getParam('id'))),
                    'method' => 'post',
                   'enctype' => 'multipart/form-data'
                ));

        $this->setForm($form);

        $fieldset = $form->addFieldset('news_form', array('legend' => $helper->__('Testimonials  Information')));

        $fieldset->addField('title','select', array(
               'label' => $helper->__('Id_name'),
            'required' => true,
                'name' => 'title',
              'values' => $helper->getUsersList(),
        ));

        $fieldset->addField('user_name','select', array(
               'label' => $helper->__('User name'),
            'required' => true,
                'name' => 'user_name',
              'values' => $helper->getUsersName(),
        ));

        $fieldset->addField('content', 'editor', array(
            'label' => $helper->__('Content'),
            'required' => true,
            'name' => 'content',
        ));

        $fieldset->addField('created', 'date', array(
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
             'image' => $this->getSkinUrl('images/grid-cal.gif'),
             'label' => $helper->__('Created'),
              'name' => 'created'
        ));

        $fieldset->addField('status', 'select', array(
            'label' => $helper->__('Status'),
             'name' => 'status',
            'values' => array(
                array(
                    'value' => 1,
                    'label' => $helper->__('Enabled'),
                ),
                array(
                    'value' => 0,
                    'label' => $helper->__('Disabled'),
                ),
            ),
        ));
        if (!$model->getId()) {
            $model->setData('is_active', '1');
        }

		
        $form->setUseContainer(true);

        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
            $form->setValues($data);
        } else {
            $form->setValues($model->getData());
        }

        return parent::_prepareForm();
    }

}
?>