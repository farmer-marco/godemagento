<?php
	class Gode_DestaquesSlider_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
	{
		protected function _initAction() {
			$this->loadLayout()->_setActiveMenu('gode_destaquesslider/set_time')->_addBreadcrumb('Gerenciador de Sliders', 'Gerenciador de Sliders');
			return $this;
		}
		public function indexAction() {
			$this->_initAction();
			$this->renderLayout();
		}

		public function editAction() {
			$destaquessliderId = $this->getRequest()->getParam('id');
			$destaquessliderModel = Mage::getModel('gode_destaquesslider/destaquesslider')->load($destaquessliderId);

			if ($destaquessliderModel->getId() || $destaquessliderId == 0) {
				Mage::register('destaquesslider_data', $destaquessliderModel);
				$this->loadLayout();
				// $this->_setActiveMenu('gode_destaquesslider/items');
				$this->_addBreadcrumb('gerenciador de Sliders', 'gerenciador de Sliders');
				$this->_addBreadcrumb('Gerenciador de Sliders','Gerenciador de Sliders');
				$this->getLayout()->getBlock('head')
					 ->setCanLoadExtJs(true);
				$this->_addContent(
					$this->getLayout()->createBlock('gode_destaquesslider/adminhtml_destaquesslider_edit')
					)
					 ->_addLeft(
					 	$this->getLayout()->createBlock('gode_destaquesslider/adminhtml_destaquesslider_edit_tabs')
					 	);
				$this->renderLayout();
			}
			else {
				Mage::getSingleton('adminhtml/session')->addError('Slider não existe');
				$this->_redirect('*/*/');

			}
		}

		public function newAction() {
			$this->_forward('edit');
		}

		public function saveAction() {
			if ($this->getRequest()->getPost()) {
				try {
					$postData = $this->getRequest()->getPost();
					$destaquessliderModel = Mage::getModel('gode_destaquesslider/destaquesslider');

					if ($this->getRequest()->getParam('id_destaques_slider')<=0) {
						if(isset($postData['stores'])) {
						    if(in_array('0',$postData['stores'])){
						        $postData['store_id'] = '0';
						    }
						    else{
						        $postData['store_id'] = implode(",", $postData['stores']);
						    }
						   unset($postData['stores']);
						}
						$destaquessliderModel->setCreatedTime(Mage::getSingleton('core/date')->gmtDate());
						$destaquessliderModel
							->addData($postData)
							->setUpdateTIme( Mage::getSingleton('core/date')->gmtDate())
							->setId($this->getRequest()->getParam('id'))
							->save();
						Mage::getSingleton('adminhtml/session')->addSuccess('gravado com sucesso!');
						Mage::getSingleton('adminhtml/session')->setdestaquessliderData(false);
						$this->_redirect('*/*/');
						return;

					}
				} catch (Exception $e) {
					Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
					Mage::getSingleton('adminhtml/session')->setdestaquessliderData($this->getRequest()->getPost());
					$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
					return;
				}
				$this->_redirect('*/*/');
			}
		}
		public function deleteAction() {
			if($this->getRequest()->getParam('id') > 0) {
				try {
					$destaquessliderModel = Mage::getModel('gode_destaquesslider/destaquesslider');
					$destaquessliderModel->setId($this->getRequest()->getParam('id'))->delete();
					Mage::getSingleton('adminhtml/session')->addSuccess('slider apagado');
					$this->_redirect('*/*/');
				}
				catch (Exception $e) {
					Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
					$this->_redirect('*/*/edit', array('id'=>$this->getRequest()->getParam('id')));
				}
			}
			$this->_redirect('*/*/');
		}
	}
?>