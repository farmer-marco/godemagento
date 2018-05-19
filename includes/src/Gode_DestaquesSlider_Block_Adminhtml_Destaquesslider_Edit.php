<?php
class Gode_DestaquesSlider_Block_Adminhtml_DestaquesSlider_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{
	public function __construct() {
		parent::__construct();
		$this->_objectId = 'id';
		$this->_blockGroup = 'gode_destaquesslider';
		$this->_controller = 'adminhtml_destaquesslider';
		$this->_updateButton('save', 'label', 'gravar slider');
		$this->_updateBUtton('delete', 'label', 'apagar slider');
	}

	public function getHeaderText() {
		if( Mage::registry('destaquesslider_data') && Mage::registry('destaquesslider_data')->getId()) {
			return 'Editar o slider '.$this->htmlEscape( Mage::registry('destaquesslider_data')->getTitle());
		}
		else {
			return 'Adicionar um slider';
		}
	}
}
?>