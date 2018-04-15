<?php

class Sigma_Competition_Adminhtml_CompetitionController extends Mage_Adminhtml_Controller_Action
{
		protected function _isAllowed()
		{
		//return Mage::getSingleton('admin/session')->isAllowed('competition/competition');
			return true;
		}

		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("competition/competition")->_addBreadcrumb(Mage::helper("adminhtml")->__("Competition  Manager"),Mage::helper("adminhtml")->__("Competition Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Competition"));
			    $this->_title($this->__("Manager Competition"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("Competition"));
				$this->_title($this->__("Competition"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("competition/competition")->load($id);
				if ($model->getId()) {
					Mage::register("competition_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("competition/competition");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Competition Manager"), Mage::helper("adminhtml")->__("Competition Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Competition Description"), Mage::helper("adminhtml")->__("Competition Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("competition/adminhtml_competition_edit"))->_addLeft($this->getLayout()->createBlock("competition/adminhtml_competition_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("competition")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Competition"));
		$this->_title($this->__("Competition"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("competition/competition")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("competition_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("competition/competition");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Competition Manager"), Mage::helper("adminhtml")->__("Competition Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Competition Description"), Mage::helper("adminhtml")->__("Competition Description"));


		$this->_addContent($this->getLayout()->createBlock("competition/adminhtml_competition_edit"))->_addLeft($this->getLayout()->createBlock("competition/adminhtml_competition_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						

						$model = Mage::getModel("competition/competition")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Competition was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setCompetitionData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setCompetitionData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("competition/competition");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('entity_ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("competition/competition");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'competition.csv';
			$grid       = $this->getLayout()->createBlock('competition/adminhtml_competition_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'competition.xml';
			$grid       = $this->getLayout()->createBlock('competition/adminhtml_competition_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
