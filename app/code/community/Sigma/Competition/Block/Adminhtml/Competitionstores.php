<?php


class Sigma_Competition_Block_Adminhtml_Competitionstores extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_competitionstores";
	$this->_blockGroup = "competition";
	$this->_headerText = Mage::helper("competition")->__("Competitionstores Manager");
	$this->_addButtonLabel = Mage::helper("competition")->__("Add New Item");
	parent::__construct();
	
	}

}