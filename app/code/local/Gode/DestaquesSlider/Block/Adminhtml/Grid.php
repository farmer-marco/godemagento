<?php
class Gode_DestaquesSlider_Block_Adminhtml_Grid extends Mage_Adminhtml_Block_Widget_Grid_Container {
	public function __construct() {
		$this->_controller = 'adminhtml_destaquesslider';
		$this->_blockGroup = 'gode_destaquesslider';

		$this->_headerText = 'Gerenciar sliders';

		$this->_addButtonLabel = 'Adicionar novo slider';
		parent::__construct();
	}
}
?>