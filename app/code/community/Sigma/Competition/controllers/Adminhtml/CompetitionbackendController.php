<?php
class Sigma_Competition_Adminhtml_CompetitionbackendController extends Mage_Adminhtml_Controller_Action
{

	protected function _isAllowed()
	{
		//return Mage::getSingleton('admin/session')->isAllowed('competition/competitionbackend');
		return true;
	}

	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Competition Place Holder"));
	   $this->renderLayout();
    }
}