<?php
$installer = $this;
$tableNews = $installer->getTable('dsnews/table_news');

$installer->startSetup();
$installer->getConnection()
    ->changeColumn($tableNews, 'title', 'title', array(
        'type' => Varien_Db_Ddl_Table::TYPE_INTEGER,
        'length'    => '10',
        'nullable' => false,
        'comment'   => 'custome_id',
        'unsigned'  => true

    ));


$installer->endSetup();
?>
