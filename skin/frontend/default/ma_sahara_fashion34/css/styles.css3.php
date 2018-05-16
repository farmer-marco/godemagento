<?php
    header('Content-type: text/css; charset: UTF-8');
    header('Cache-Control: must-revalidate');
    header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 3600) . ' GMT');
    $url = $_REQUEST['url'];
?>

.pt_custommenu div.pt_menu .parentMenu span.block-title:before {
    width: 8px; height: 4px;
    border: 4px solid #b6b6b6;
    border-left-color: #fff;
    border-right-color: #fff;
    border-bottom-color: #fff;
    position: absolute; top: 22px; right: 0;
    content: "";
    pointer-events: none;
    cursor: pointer;
}

.block .block-title:before, .block-layered-nav dt:before {
    width: 8px; height: 4px;
    border: 4px solid #e8e8e8;
    border-top-color: #434342;
    border-right-color: #434342;
    border-bottom-color: #434342;
    position: absolute; top: 0; bottom: 0; margin: auto; right: 8px;
    content: "";
    pointer-events: none;
    cursor: pointer;
}

.block-progress .block-title:before {
border: 0;
}

.product-options dd .input-box:before {
    width: 8px; height: 4px;
    border: 4px solid #b6b6b6;
    border-left-color: #fff;
    border-right-color: #fff;
    border-bottom-color: #fff;
    position: absolute; top: 8px; right: 6px;
    content: "";
    pointer-events: none;
    cursor: pointer;
    z-index: 1111;
}

.bx-wrapper .bx-controls a {
    border-radius: 2px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
}

.item .item-inner:hover .product-image img, .header .header-content .follow-us ul li a:hover, .static_block_custom_menu ul li a:hover img {
    opacity: 0.7;
    -webkit-opacity: 0.7;
    -moz-opacity: 0.7;
}

.banner-home-content .banner-block a img, .banner-left a img {
    transform: scale(1);
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    transition: all 0.5s ease-out;
    -webkit-transition: all 0.5s ease-out;
    -moz-transition: all 0.5s ease-out;
}

.banner-home-content .banner-block:hover a img, .banner-left:hover a img {
    transform: scale(1.1);
    -webkit-transform: scale(1.1);
    -moz-transform: scale(1.1);
}

.banner-home-content .banner-block .text-des {
    transition: background 0.5s ease-out;
    -webkit-transition: background 0.5s ease-out;
    -moz-transition: background 0.5s ease-out;
}