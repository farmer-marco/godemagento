<?php
class Gode_DestaquesSlider_Block_Adminhtml_DestaquesSlider_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {
	public function __construct() {
		parent::__construct();
		$this->setId('destaquesslider_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle('Informações sobre o slider');
	}

	protected function _beforeToHtml() {
		$this->addTab('form_section', array(
				'label' => 'Sobre o Slider',
				'title' => 'Sobre o Slider',
				'content' => $this->getLayout()
								->createBlock('gode_destaquesslider/adminhtml_destaquesslider_edit_tab_form')
								->toHtml()
			));

		return parent::_beforeToHtml();
	}
}
?>