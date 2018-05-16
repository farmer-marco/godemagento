<?php

class Gode_DestaquesSlider_Model_Resource_DestaquesSlider extends Mage_Core_Model_Resource_Db_Abstract
{
     public function _construct()
     {
         $this->_init('gode_destaquesslider/destaquesslider', 'id_destaques_slider');
     }
}

?>