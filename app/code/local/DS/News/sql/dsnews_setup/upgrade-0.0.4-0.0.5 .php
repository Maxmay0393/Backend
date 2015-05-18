<?php
//echo '<h1>Upgrade DS News to version 0.0.6</h1>';
//exit;

$installer = $this;


$installer->startSetup();

$installer->run
("
		ALTER TABLE `ds_news_entities` CHANGE `title` `title` INT(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Title';
		ALTER TABLE `ds_news_entities` ADD  FOREIGN KEY (`title`) REFERENCES `test1`.`customer_entity`(`entity_id`) ON DELETE CASCADE ON UPDATE CASCADE;
        ALTER TABLE `ds_news_entities`  ADD `user_name` VARCHAR(100) NOT NULL COMMENT 'User_name' AFTER `title`;
");

$installer->endSetup();
