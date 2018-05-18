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

if (!defined('ABSPATH')) {
    exit;
}

$allowedTags = array('h1', 'h2', 'h3', 'h4', 'h5');

$heading = isset($instance['heading-title']) ? $instance['heading-title'] : '';
$subheading = isset($instance['subheading']) ? $instance['subheading'] : '';
$tag = isset($instance['tag']) && in_array($instance['tag'], $allowedTags) ? $instance['tag'] : 'h2';

?>
<?php
if (!empty($heading)) { ?>
    <<?php echo tag_escape($tag); ?> class="section-title"><?php echo esc_html($heading); ?></<?php echo tag_escape($tag); ?>>
<?php } ?>
<?php if (!empty($subheading)) { ?>
    <div class="section-description"><?php echo esc_html($subheading); ?></div>
<?php } ?>
