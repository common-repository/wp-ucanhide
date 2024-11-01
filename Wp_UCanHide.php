<?php
/*
Plugin Name: Wp UCanHide
Version: 1.0
Description: A very useful and simple plug-in that allows you to hide a part of a post for people who are not logged on your site.All text situated between those two TAGS [hide] [/hide] will be automatically hidden to unregistered visitors.This plug-in is based on the Hidethis Plugin made by Mark Edwards (http://www.edwards.org/tags/Wordpress)
Author: Jeremy Poulain
Author URI: http://betablog.free.fr
*/


function Wp_UCanHide($text) {
    
	global $user_ID;

        if ($user_ID == '') {

	$posdebut = strpos($text, '[hide]');
	$posfin = strpos($text, '[/hide]');
        

        $texttohide = substr($text,$posdebut,$posfin);
        $text = str_replace($texttohide, "", $text);        
        
        return $text;

        }else{

        $text = str_replace('[hide]', "", $text);
        $text = str_replace('[/hide]', "", $text);

        return $text;

        }
}

// Apply the filters, to get things going
add_filter('the_content', 'Wp_UCanHide');

?>