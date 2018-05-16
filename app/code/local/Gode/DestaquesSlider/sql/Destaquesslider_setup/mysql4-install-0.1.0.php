<?php
  
$installer = $this;
  
$installer->startSetup();
  
$installer->run("
  
-- DROP TABLE IF EXISTS {$this->getTable('destaques_slider')};
CREATE TABLE {$this->getTable('destaques_slider')} (
  `id_destaques_slider` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `category_name` varchar(255) NOT NULL DEFAULT '',
  `order` smallint(6) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_destaques_slider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
    ");
  
$installer->endSetup(); 