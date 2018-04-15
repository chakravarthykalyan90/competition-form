<?php


class Sigma_Competition_Block_Adminhtml_Competition extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_competition";
	$this->_blockGroup = "competition";
	$this->_headerText = Mage::helper("competition")->__("Competition Manager");
	$this->_addButtonLabel = Mage::helper("competition")->__("Add New Item");
	parent::__construct();
	
	}

}