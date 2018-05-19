<?php
class Gode_DestaquesSlider_Model_Resource_DestaquesSlider_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
 {
     public function _construct()
     {
         parent::_construct();
         $this->_init('gode_destaquesslider/destaquesslider');
     }
}
?>