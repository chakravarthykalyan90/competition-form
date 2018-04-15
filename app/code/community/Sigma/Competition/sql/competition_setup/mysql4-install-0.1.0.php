<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table sigma_competition(entity_id int not null auto_increment, 

first_name varchar(30), 
last_name varchar(30),
email varchar(40),
telephone_number varchar(15),
postcode varchar(15),
receipt_number int(7),
phrase_answer varchar(10),
submitted_at timestamp DEFAULT CURRENT_TIMESTAMP,
store_name varchar(100),
primary key(entity_id));

create table sigma_competition_store(entity_id int not null auto_increment, 

store_id int(4),
store_name varchar(5),
primary key(entity_id));		
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
