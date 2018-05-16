<?php
	class Gode_Destaquesslider_Helper_Data extends Mage_Core_Helper_Abstract {
		public function getAllCategoriesArray($optionList = false)
		{
		    $categoriesArray = Mage::getModel('catalog/category')
		        ->getCollection()
		        ->addAttributeToSelect('name')
		        ->addAttributeToSelect('url_path')
		        ->addAttributeToSort('path', 'asc')
		        ->addFieldToFilter('is_active', array('eq'=>'1'))
		        ->load()
		        ->toArray();

		    if (!$optionList) {
		        return $categoriesArray;
		    }

		    foreach ($categoriesArray as $categoryId => $category) {
		        if (isset($category['name'])) {
		            $categories[] = array(
		                'value' => $category['name'],
		                'label' => Mage::helper('gode_destaquesslider')->__($category['name'])
		            );
		        }
		    }

		    return $categories;
		}
	}
?>