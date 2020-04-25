<?php

/**
 * Plugin Name: Post Exp
 * Plugin URI: https://github.com/khoa002/wordpress_defiantKoala
 * Description: Calculate experience points that can be earned with a post
 * Version: 1.0
 * Author: Khoa Nguyen
 * Author URI: https://github.com/khoa002
 */

add_action('the_content', 'showExp');

function showExp($content)
{
    $exp = calculatePostEXP($content);
    $content .= "<p>EXP: {$exp}</p>";
    return $content;
}

function calculatePostEXP($body){
	$exp_per_char = 0.8;
	$bodystripped = strip_tags($body);
	$bodystripped = trim($bodystripped);
	$bodystripped = str_replace(" ","",$bodystripped);
	$len = strlen($bodystripped);
	return floor(($exp_per_char * $len) + 94);
}