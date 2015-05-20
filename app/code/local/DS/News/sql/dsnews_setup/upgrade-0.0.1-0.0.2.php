<?php
$installer = $this;
$connection = $installer->getConnection();
 
$installer->startSetup();
 
$installer->getConnection()
    ->addColumn($installer->getTable('dsnews/table_news'),
    'status',
    array(
        'type' => Varien_Db_Ddl_Table::TYPE_SMALLINT,
        'nullable' => false,
        'default' => '0',
        'comment' => 'status'
    )
);
 
$installer->endSetup();		
?>
		

