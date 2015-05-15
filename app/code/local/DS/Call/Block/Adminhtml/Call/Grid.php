<?php

class DS_Call_Block_Adminhtml_Call_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('dscall/call')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $helper = Mage::helper('dscall');

        $this->addColumn('Call_id', array(
            'header' => $helper->__('Call ID'),
            'index' => 'Call_id'
        ));
        $this->addColumn('title', array(
            'header' => $helper->__('Name'),
            'index' => 'title',
            'type' => 'text',
        ));
        $this->addColumn('content', array(
            'header' => $helper->__('Phone'),
            'index' => 'content'
        ));


        $this->addColumn('created', array(
            'header' => $helper->__('Created'),
            'index' => 'created',
            'type' => 'date',
        ));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('call_id');
        $this->getMassactionBlock()->setFormFieldName('call');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
        ));
        return $this;
    }

    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array(
                    'id' => $model->getId(),
                ));
    }

}