<?php
  
class Gode_DestaquesSlider_Model_Mysql4_DestaquesSlider_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        //parent::__construct();
        $this->_init('gode_destaquesslider/destaquesslider');
    }

    public function addStoreFilter($store, $withAdmin = true){

	    if ($store instanceof Mage_Core_Model_Store) {
	        $store = array($store->getId());
	    }

	    if (!is_array($store)) {
	        $store = array($store);
	    }

	    $this->addFilter('store_id', array('in' => $store));

	    return $this;
	}
} 

?>