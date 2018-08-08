

<?php
/**
 * @category Gode
 * @package Gode_Catalog
*/

class Gode_RenderSlider_Block_Catalog_Product_View extends Mage_Catalog_Block_Product_View
{
	public function getProductsforSlider($products_array, $slider_title) 
	{
		echo '<div class="row"><div class="products-slider-thumbs col-xs-12 col-sm-8"><h1 class="related-title"><span>';
		echo $slider_title;
		echo '</span></h1><div class="related-products-slider">';
        foreach($products_array as $slider_product){
        	echo '<div>
                    <a href="';
			echo $slider_product->getProductUrl();
			echo '" title="';
			echo $this->stripTags($slider_product->getImageLabel($slider_product, 'small_image'), null, true);
			echo '" class="product-image"><img src="';
			echo $this->helper('catalog/image')->init($slider_product, 'small_image')->resize(180);
			echo '" alt="';
			echo $this->helper('catalog/image')->init($slider_product, 'small_image')->resize(180);
			echo '" /></a><h2 class="artista"><strong>';
			echo $slider_product->getData('artista');
			echo '</strong></h2><h2 class="nome-da-obra">';
			echo $slider_product->getName();
			echo '</h2>';
			$_slider_product = Mage::getModel('catalog/product')->load($slider_product->getId());
			$productBlock = $this->getLayout()->createBlock('catalog/product_price');
			// echo $productBlock->getPriceHtml($_slider_product);
			if($_slider_product->isConfigurable())
            {
                $childProducts = Mage::getModel('catalog/product_type_configurable')->getUsedProducts(null,$_slider_product);
                $childPriceLowest = "";    
                $childPriceHighest = "";    

                foreach($childProducts as $child){
                    $_child = Mage::getModel('catalog/product')->load($child->getId());

                    if($childPriceLowest == '' || $childPriceLowest > $_child->getPrice() )
                    $childPriceLowest =  $_child->getPrice();

                }
                $formattedPrice = Mage::helper('core')->currency($childPriceLowest, true, false);
                echo '<div class="price-box"><span class="price">' . $this->__('from') . ' ' . $formattedPrice . '</span></div>';
            }
            
            else {
                echo $productBlock->getPriceHtml($_slider_product);
                }
                   

			echo '</div>';
          }
          echo '</div></div></div>';
        
	}
}
?>