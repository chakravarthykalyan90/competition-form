<?php
class Sigma_Competition_Block_Adminhtml_Competition_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("competition_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("competition")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("competition")->__("Item Information"),
				"title" => Mage::helper("competition")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("competition/adminhtml_competition_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
