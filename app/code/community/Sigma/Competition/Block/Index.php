<?php
class Sigma_Competition_Block_Index extends Mage_Core_Block_Template
{

    public function getStoresInfo()
    {
        $storeData = Mage::getModel('competition/competitionstores')->getCollection()->getData();
        return $storeData;
    }
}
