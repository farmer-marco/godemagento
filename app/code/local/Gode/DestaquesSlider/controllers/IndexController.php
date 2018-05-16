<?php
class Gode_DestaquesSlider_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$this->loadLayout();
		$this->renderLayout();
	}
	public function saveAction()
	 {
	    //we get the datas sent with POST
	    $title = ''.$this->getRequest()->getPost('title');
	   

	    //we check that the name is not empty
	    if( isset($title) && ($title!='') )
	    {
	      $slider = Mage::getModel('gode_destaquesslider/destaquesslider');
	      $slider->setData('title',$title);
	      $slider->save();
	    }
	}
}
?>