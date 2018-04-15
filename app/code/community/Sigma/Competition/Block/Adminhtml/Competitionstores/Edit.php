<?php
	
class Sigma_Competition_Block_Adminhtml_Competitionstores_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "entity_id";
				$this->_blockGroup = "competition";
				$this->_controller = "adminhtml_competitionstores";
				$this->_updateButton("save", "label", Mage::helper("competition")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("competition")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("competition")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("competitionstores_data") && Mage::registry("competitionstores_data")->getId() ){

				    return Mage::helper("competition")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("competitionstores_data")->getId()));

				} 
				else{

				     return Mage::helper("competition")->__("Add Item");

				}
		}
}