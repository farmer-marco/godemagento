<?php
class Gode_DestaquesSlider_Block_Adminhtml_DestaquesSlider_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {
	protected function _prepareForm() {
		$form = new Varien_Data_Form();
		$categoryHelper = Mage::helper('catalog/category');
		$categories = $categoryHelper->getStoreCategories();
		$categories_names = array();
		foreach($categories as $category) {
			$categories_names = array_merge($categories_names, array($category->getName() => $category->getName()));
		}
		$this->setForm($form);
		$fieldset = $form->addFieldset('destaquesslider_form',
										array('legend'=>'information'));
		$fieldset->addField('title', 'text', array(
							'label' => 'Titulo',
							'class' => 'required-entry',
							'required' => true,
							'name' => 'title',
							));
		$fieldset->addField('category_name', 'select', array(
							'label' => 'Nome da Categoria',
							'class' => 'required-entry',
							'required' => true,
							'name' => 'category_name',
							'values' => Mage::helper('gode_destaquesslider')->getAllCategoriesArray(true),
							));
		if (!Mage::app()->isSingleStoreMode()) {
			$fieldset->addField('store_id', 'multiselect', array(
						        'name' => 'stores[]',
						        'label' => 'Idioma',
						        'title' => 'Idioma',
						        'required' => true,
						        'values' => Mage::getSingleton('adminhtml/system_store')
						                     ->getStoreValuesForForm(false, true),
						    ));
		}
		else {
		    $fieldset->addField('store_id', 'hidden', array(
		        'name' => 'stores[]',
		        'value' => Mage::app()->getStore(true)->getId()
		    ));
		}
		$fieldset->addField('order', 'text', array(
							'label' => 'Ordem',
							'name' => 'order',
							));

		if ( Mage::registry('destaquesslider_data')) {
			$form->setValues(Mage::registry('destaquesslider_data')->getData());
		}

		return parent::_prepareForm();
	}
}
?>