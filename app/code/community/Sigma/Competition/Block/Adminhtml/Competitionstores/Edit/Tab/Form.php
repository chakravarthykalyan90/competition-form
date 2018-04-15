<?php
class Sigma_Competition_Block_Adminhtml_Competitionstores_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("competition_form", array("legend"=>Mage::helper("competition")->__("Item information")));

				

				if (Mage::getSingleton("adminhtml/session")->getCompetitionstoresData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getCompetitionstoresData());
					Mage::getSingleton("adminhtml/session")->setCompetitionstoresData(null);
				} 
				elseif(Mage::registry("competitionstores_data")) {
				    $form->setValues(Mage::registry("competitionstores_data")->getData());
				}
				return parent::_prepareForm();
		}
}
