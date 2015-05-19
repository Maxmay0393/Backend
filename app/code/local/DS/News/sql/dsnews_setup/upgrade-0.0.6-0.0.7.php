<?php

//echo '<h1>Upgrade DS News to version 0.0.3</h1>';
//exit;
$installer = $this;
$tableNews = $installer->getTable('dsnews/table_news');

$installer->startSetup();
$installer->run
("
   ALTER TABLE `{$tableNews}` ADD  FOREIGN KEY (`title`) REFERENCES `test1`.`customer_entity`(`entity_id`) ON DELETE CASCADE ON UPDATE CASCADE;

");
$installer->endSetup();

