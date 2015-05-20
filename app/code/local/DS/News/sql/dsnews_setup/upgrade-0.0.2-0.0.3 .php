<?php
    $installer = $this;
    $tableNews = $installer->getTable('dsnews/table_news');

    $installer->startSetup();
    $installer->getConnection()
        ->addColumn($tableNews, 'user_name', array(
            'comment'   => 'User_name',
            'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
            'length'    => '100',
            'nullable'  => false,
        ));


    $installer->endSetup();
?>
