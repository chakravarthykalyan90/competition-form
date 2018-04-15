<?php
class Sigma_Competition_IndexController extends Mage_Core_Controller_Front_Action
{
    public function IndexAction()
    {
      
        $this->loadLayout();
        $this->getLayout()->getBlock("head")->setTitle($this->__("Competition"));
            $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
        $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
           ));

        $breadcrumbs->addCrumb("competition", array(
                "label" => $this->__("Competition"),
                "title" => $this->__("Competition")
           ));

        $this->renderLayout();
    }
    public function saveAction()
    {

        $post_data=$this->getRequest()->getPost();
        if ($post_data) {
            try {
                $model = Mage::getModel("competition/competition")
                ->addData($post_data)
                ->save();

                Mage::getSingleton("core/session")->addSuccess("Competition was successfully saved");

                $this->_redirect("*/*/");
                return;
            } catch (Exception $e) {
                Mage::getSingleton("core/session")->addError($e->getMessage());
                Mage::getSingleton("core/session")->setCompetitionData($this->getRequest()->getPost());
                $this->_redirect("*/*/");
                return;
            }
        }
        $this->_redirect("*/*/");
    }
}
