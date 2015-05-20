<?php
$installer = $this;


$installer->startSetup();
$installer->getConnection()
    ->addForeignKey
    (
        $installer->getFkName('ds_news_entities', 'title','customer/entity', 'entity_id'),
        $installer->getTable('ds_news_entities'),'title', $installer->getTable('customer/entity'), 'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE
    );


$installer->endSetup();
?>
