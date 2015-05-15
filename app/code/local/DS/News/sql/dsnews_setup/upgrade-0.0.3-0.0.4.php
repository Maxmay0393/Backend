<?php

//echo '<h1>Upgrade DS News to version 0.0.3</h1>';
//exit;

$installer = $this;
$connection = $installer->getConnection();
 
$installer->startSetup();
 
$installer->getConnection()
    ->addColumn($installer->getTable('dsnews/table_news'),
    'is_active',
    array(
        'type' => Varien_Db_Ddl_Table::TYPE_SMALLINT,
        'nullable' => false,
        'default' => '0',
        'comment' => 'is_active'
    )
);
 
$installer->endSetup();		
		
		

