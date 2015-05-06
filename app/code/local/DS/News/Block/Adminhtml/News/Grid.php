<?php

class DS_News_Block_Adminhtml_News_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('dsnews/news')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $helper = Mage::helper('dsnews');

        $this->addColumn('news_id', array(
            'header' => $helper->__('Testimonials  ID'),
            'index' => 'news_id'
        ));
        $this->addColumn('title', array(
            'header' => $helper->__('Title'),
            'index' => 'title',
            'type' => 'text',
        ));
        $this->addColumn('content', array(
            'header' => $helper->__('Content'),
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
        $this->setMassactionIdField('news_id');
        $this->getMassactionBlock()->setFormFieldName('news');

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