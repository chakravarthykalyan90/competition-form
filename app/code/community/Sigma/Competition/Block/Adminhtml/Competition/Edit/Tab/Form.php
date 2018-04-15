<?php
class Sigma_Competition_Block_Adminhtml_Competition_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("competition_form", array("legend"=>Mage::helper("competition")->__("Item information")));

				
						$fieldset->addField("first_name", "text", array(
						"label" => Mage::helper("competition")->__("First Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "first_name",
						));
					
						$fieldset->addField("last_name", "text", array(
						"label" => Mage::helper("competition")->__("Last Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "last_name",
						));
					
						$fieldset->addField("email", "text", array(
						"label" => Mage::helper("competition")->__("Email"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "email",
						));
					
						$fieldset->addField("telephone_number", "text", array(
						"label" => Mage::helper("competition")->__("Telephone Number"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "telephone_number",
						));
					
						$fieldset->addField("postcode", "text", array(
						"label" => Mage::helper("competition")->__("Postcode"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "postcode",
						));
					
						$fieldset->addField("receipt_number", "text", array(
						"label" => Mage::helper("competition")->__("Receipt Number"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "receipt_number",
						));
					
						$fieldset->addField("phrase_answer", "text", array(
						"label" => Mage::helper("competition")->__("Phrase Answer"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "phrase_answer",
						));
					
						$fieldset->addField("submitted_at", "text", array(
						"label" => Mage::helper("competition")->__("Date"),
						"name" => "submitted_at",
						));
					
						$fieldset->addField("store_name", "text", array(
						"label" => Mage::helper("competition")->__("Store Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "store_name",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getCompetitionData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getCompetitionData());
					Mage::getSingleton("adminhtml/session")->setCompetitionData(null);
				} 
				elseif(Mage::registry("competition_data")) {
				    $form->setValues(Mage::registry("competition_data")->getData());
				}
				return parent::_prepareForm();
		}
}
