<?php
class Sigma_Competition_Model_Mysql4_Competitionstores extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("competition/competitionstores", "entity_id");
    }
}