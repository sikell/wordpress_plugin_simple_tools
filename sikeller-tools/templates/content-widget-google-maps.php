<?php
/**
 * The template for displaying a google maps.
 *
 * This template can be overridden by copying it to yourtheme/sikeller-tools/content-widget-google-maps.php.
 *
 * @see     http://sikeller.de/sikeller-tools
 * @author  Simon Keller
 * @package Sikeller_Tools/Templates
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

$api_key = isset($instance['api_key']) ? $instance['api_key'] : '';
$lattitude = isset($instance['lattitude']) ? $instance['lattitude'] : '';
$longitude = isset($instance['longitude']) ? $instance['longitude'] : '';
$zoom = isset($instance['zoom']) ? $instance['zoom'] : '4';
$icon = isset($instance['icon']) ? $instance['icon'] : '';
$id = isset($instance['id']) ? $instance['id'] : 'maps';
?>

    <div id="<?php echo esc_html($id); ?>"></div>
    <script>
        function initMap() {
            var latLong = {lat: <?php echo esc_html($lattitude); ?>, lng: <?php echo esc_html($longitude); ?>};
            var map = new google.maps.Map(document.getElementById('<?php echo esc_html($id); ?>'), {
                zoom: <?php echo esc_html($zoom); ?>,
                center: latLong
            });
            var marker = new google.maps.Marker({
                position: latLong,
                map: map,
                <?php if(!empty($icon)) {
                    echo 'icon: "'.esc_url($icon).'"';
                } ?>
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=<?php echo esc_html($api_key); ?>&callback=initMap">
    </script>
<?php ?>