<?php
/**
 * The template for displaying thumbnail image widget.
 *
 * This template can be overridden by copying it to yourtheme/sikeller-tools/content-widget-thumb-image.php.
 *
 * @see     http://sikeller.de/sikeller-tools
 * @author  Simon Keller
 * @package Sikeller_Tools/Templates
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

$image = isset($instance['image_thumbnail']) ? $instance['image_thumbnail'] : '';
$link = isset($instance['image_link']) ? $instance['image_link'] : '';
$alt_value = isset($instance['alt_tag']) ? $instance['alt_tag'] : '';
$link_title = isset($instance['link_title']) ? $instance['link_title'] : '';
?>
<?php
if (!empty($link)) { ?>
    <a href="<?php echo esc_url($link); ?>" title="<?php echo esc_html($link_title); ?>">
        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_html($alt_value); ?>"/>
    </a>
<?php } else { ?>
    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_html($alt_value); ?>"/>
<?php } ?>