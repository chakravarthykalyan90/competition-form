<?php

class Sigma_Competition_Block_Adminhtml_Competitionstores_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("competitionstoresGrid");
				$this->setDefaultSort("entity_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("competition/competitionstores")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("entity_id", array(
				"header" => Mage::helper("competition")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "entity_id",
				));
                
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('entity_id');
			$this->getMassactionBlock()->setFormFieldName('entity_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_competitionstores', array(
					 'label'=> Mage::helper('competition')->__('Remove Competitionstores'),
					 'url'  => $this->getUrl('*/adminhtml_competitionstores/massRemove'),
					 'confirm' => Mage::helper('competition')->__('Are you sure?')
				));
			return $this;
		}
			

}