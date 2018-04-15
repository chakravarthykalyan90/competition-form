<?php

class Sigma_Competition_Block_Adminhtml_Competition_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
            parent::__construct();
            $this->setId("competitionGrid");
            $this->setDefaultSort("entity_id");
            $this->setDefaultDir("DESC");
            $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
            $collection = Mage::getModel("competition/competition")->getCollection();
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
                
            $this->addColumn("first_name", array(
            "header" => Mage::helper("competition")->__("First Name"),
            "index" => "first_name",
            ));
            $this->addColumn("last_name", array(
            "header" => Mage::helper("competition")->__("Last Name"),
            "index" => "last_name",
            ));
            $this->addColumn("email", array(
            "header" => Mage::helper("competition")->__("Email"),
            "index" => "email",
            ));
            $this->addColumn("telephone_number", array(
            "header" => Mage::helper("competition")->__("Telephone Number"),
            "index" => "telephone_number",
            ));
            $this->addColumn("postcode", array(
            "header" => Mage::helper("competition")->__("Postcode"),
            "index" => "postcode",
            ));
            $this->addColumn("receipt_number", array(
            "header" => Mage::helper("competition")->__("Receipt Number"),
            "index" => "receipt_number",
            ));
            $this->addColumn("phrase_answer", array(
            "header" => Mage::helper("competition")->__("Phrase Answer"),
            "index" => "phrase_answer",
            ));
            $this->addColumn("submitted_at", array(
            "header" => Mage::helper("competition")->__("Date"),
            "index" => "submitted_at",
            "type" => "date",
            ));
            $this->addColumn("store_id", array(
            "header" => Mage::helper("competition")->__("Store Id"),
            "index" => "store_id",
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
        $this->getMassactionBlock()->addItem('remove_competition', array(
                 'label'=> Mage::helper('competition')->__('Remove Competition'),
                 'url'  => $this->getUrl('*/adminhtml_competition/massRemove'),
                 'confirm' => Mage::helper('competition')->__('Are you sure?')
            ));
        return $this;
    }
}
