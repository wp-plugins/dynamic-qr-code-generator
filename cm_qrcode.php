<?php
/**
 * Plugin Name: Dyanomic QR Code Generator by codemire
 * Plugin URI: http://www.codemire.com
 * Description: Generate QR code for every page, post or whole Wordpress site. Share Smartly.
 * Version: 0.0.1
 * Author: codemier
 * Author URI: http://facebook.com/rakib.hbo
 * License: GPL2
 */
?>
<?php
//Adding action and filters
add_action( 'add_meta_boxes', 'cm_qrcode_add_metabox' );
add_action( 'wp_dashboard_setup', 'cm_qrcode_dashboard' );
if(function_exists('cm_qrcode')==false){
    function cm_qrcode(){
        
    }
}

if(function_exists('cm_qrcode_add_metabox')==false){
    function cm_qrcode_add_metabox(){
        $screens=array('post','page');
        foreach($screens as $screen){
            add_meta_box('cm_qrcode', 'QR code for the permalink', 'cm_qrcode_html', $screen,'side','high');
        }    
    }
}

function cm_qrcode_html(){
    $link=urlencode(get_permalink());
    $qr_img="https://chart.googleapis.com/chart?cht=qr&chs=200x200&chld=H|4&chl=".$link;
     $qr_img_l="https://chart.googleapis.com/chart?cht=qr&chs=540x540&chld=H|4&chl=".$link;
    $html="<a href='".$qr_img_l ."' target='_blank'>";
    $html .= "<img src='". $qr_img . "' Title='Click here to get larger version'";
    $html .="</a>";
    //$html .="<p> Click on Picture to download larger version</p>";
    echo $html;

}

if(function_exists('cm_qrcode_dashboard')==false){
    function cm_qrcode_dashboard(){
    add_meta_box('cm_qrcode', 'QR code for website link', 'cm_qrcode_dashboard_html', 'dashboard','side','high');
    }
}
function cm_qrcode_dashboard_html(){
    $link=urlencode(get_site_url());
    $qr_img="https://chart.googleapis.com/chart?cht=qr&chs=300x300&chld=H|4&chl=".$link;
     $qr_img_l="https://chart.googleapis.com/chart?cht=qr&chs=540x540&chld=H|4&chl=".$link;
    $html="<a href='".$qr_img_l ."' target='_blank'>";
    $html .= "<img src='". $qr_img . "' Title='Click here to get larger version'";
    $html .="</a>";
    $html .="<p> Click on Picture to download larger version</p>";
    echo $html;
}
?>