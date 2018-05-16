<?php

class Gode_DestaquesSlider_Block_Adminhtml_Destaquesslider_Grid extends Mage_Adminhtml_Block_Widget_Grid {
	public function __construct() {
		parent::__construct();
		$this->setId('destaquessliderGrid');
		$this->setDefaultSort('id_destaques_slider');
		$this->setDefaultDir('DESC');
		$this->setSaveParametersInSession(true);
		$this->setUseAjax(true);
	}

	protected function _prepareCollection() {
		$collection = Mage::getModel('gode_destaquesslider/destaquesslider')->getCollection();
		foreach($collection as $link){
	        if($link->getStoreId() && $link->getStoreId() != 0 ){
	            $link->setStoreId(explode(',',$link->getStoreId()));
	        }
	        else{
	            $link->setStoreId(array('0'));
	        }
	    }
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}

	protected function _prepareColumns () {
		$this->addColumn('order',
			array(
				'header' => 'Ordem',
				'align' => 'right',
				'width' => '50px',
				'index' => 'order',
				));

		$this->addColumn('title',
			array(
				'header' => 'Título',
				'align' => 'left',
				'index' => 'title',
				));

		$this->addColumn('category_name',
			array(
				'header' => 'Categoria',
				'align' => 'left',
				'index' => 'category_name',
				));
		if (!Mage::app()->isSingleStoreMode()) {
		    $this->addColumn('store_id', array(
		        'header'        => 'Idioma',
		        'index'         => 'store_id',
		        'type'          => 'store',
		        'store_all'     => true,
		        'store_view'    => true,
		        'sortable'      => true,
		        'filter_condition_callback' => array($this,
		            '_filterStoreCondition'),
		    ));
		}
		return parent::_prepareColumns();
	}
	protected function _filterStoreCondition($collection, $column){
	    if (!$value = $column->getFilter()->getValue()) {
	        return;
	    }
	    $this->getCollection()->addStoreFilter($value);
	}

	public function getRowUrl($row) {
		return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	}

	public function getGridUrl()
    {
      return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}
?>