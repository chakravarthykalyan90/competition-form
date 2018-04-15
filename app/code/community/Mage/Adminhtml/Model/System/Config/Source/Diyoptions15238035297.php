<?php
class Mage_Adminhtml_Model_System_Config_Source_Diyoptions15238035297
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
		
            array('value' => 1, 'label'=>Mage::helper('adminhtml')->__('Homepage')),
            array('value' => 2, 'label'=>Mage::helper('adminhtml')->__('404 Page')),
            array('value' => 3, 'label'=>Mage::helper('adminhtml')->__('Custom Page')),
        );
    }

}
