<?php

class Gode_DestaquesSlider_Block_Monblock extends Mage_Core_Block_Template
{
	
     public function methodblock()
     {
     	
     	$retour = '';
     	$storeId = Mage::app()->getStore()->getStoreId();
     	$collection = Mage::getModel('gode_destaquesslider/destaquesslider')
				     	->getCollection()
				     	->addFieldToFilter('store_id',$storeId);
		$collection->getSelect()->order('order ASC');
		
		// echo $colletion->getSelect();
     	// $cat = Mage::getResourceModel('catalog/category_collection')->addFieldToFilter('name', $categoryName)->getData();
		if (count($collection) > 0) {
			$includeJavascript = 'TRUE';
			foreach ($collection as $data) {
				$cat = Mage::getResourceModel('catalog/category_collection')->addFieldToFilter('name', $data->getData('category_name'))->getData();

				$cat_id = $cat[0]['entity_id'];
		        $products = Mage::getModel('catalog/category')
					        ->load($cat_id)
		        			->getProductCollection()
		        			->addAttributeToSelect('artista')
			                ->addAttributeToSelect('name')
			                ->addAttributeToSelect('small_image');
		        if (count($products)>0) {
		        	
		        	echo '<section class="products-slider-thumbs"><div><h1 class="related-title"><span>';
					// echo $sliderTitle;
					echo $data->getData('title');
					echo '</span></h1><div class="related-products-slider">';
			        foreach($products as $slider_product){
						echo '<div>
		                    <a href="';
						echo $slider_product->getProductUrl();
						echo '" title="';
						echo $this->stripTags($slider_product->getImageLabel($slider_product, 'small_image'), null, true);
						echo '" class="product-image"><img src="';
						echo Mage::getBaseUrl('media')."gode/loader-180x.gif";
						echo '" data-lazy="';
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
						echo $productBlock->getPriceHtml($_slider_product);
						echo '</div>';
			        }
			        echo '</div></div></section>';
			    }
		        

		        
	    	}
	    	if ($includeJavascript) {
	        	$this->addJavascript();
	        	$includeJavascript = FALSE;
	        }
	    }
    }

    public function addJavascript() {
    	
    		
    		echo '<script type="text/javascript">
                        jQuery(function ($) {
                            $(".related-products-slider").slick({
                            	lazyLoad: "ondemand",
                                dots: false,
                                infinite: true,
                                speed: 300,
                                slidesToShow: 4,
                                slidesToScroll: 4,
                                responsive: [{
                                    breakpoint: 1024,
                                    settings: {
                                        slidesToShow: 3,
                                        slidesToScroll: 3
                                    }
                                    },{
                                        breakpoint: 600,
                                        settings: {
                                            slidesToShow: 2,
                                            slidesToScroll: 2
                                        }
                                    },{
                                        breakpoint: 480,
                                        settings: {
                                            slidesToShow: 2,
                                            slidesToScroll: 2
                                        }
                                    }]
                            });
                        });
                    </script>';
    	
    }
}
?>