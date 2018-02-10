<?php
/**
 * The template for displaying heading widget.
 *
 * This template can be overridden by copying it to yourtheme/sikeller-tools/content-widget-heading.php.
 *
 * @see     http://sikeller.de/sikeller-tools
 * @author  Simon Keller
 * @package Sikeller_Tools/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading    = isset( $instance[ 'heading-title' ] ) ? $instance[ 'heading-title' ] : '';
$subheading = isset( $instance[ 'subheading' ] ) ? $instance[ 'subheading' ] : '';

?>
<?php
if( !empty( $heading ) ) { ?>
	<h2 class="section-title"><?php echo esc_html($heading); ?></h2>
<?php } ?>
<?php if( !empty( $subheading ) ) { ?>
	<div class="section-description"><?php echo esc_html($subheading); ?></div>
<?php } ?>
