<?php
class Sigma_Competition_Model_Mysql4_Competition extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("competition/competition", "entity_id");
    }
}