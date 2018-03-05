<?php
/**
 * Google maps api
 *
 * Displays a google maps with latitude and longitude.
 * Uses the google APIs.
 *
 * @extends  SK_Widget
 * @version  1.0.0
 * @package  Sikeller_Tools/Widgets
 * @category Widgets
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * SK_Widget_Thumb_Image Class
 */
class SK_Widget_Google_Maps extends SK_Widget
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'sk-widget sk-google-maps';
        $this->widget_description = __('Display a google maps.', 'sikeller-tools');
        $this->widget_id = 'sikeller_tools_google_maps';
        $this->widget_name = __('SK: Google Maps', 'sikeller-tools');
        $this->control_ops = array('width' => 400, 'height' => 350);
        $this->settings = apply_filters('sikeller_tools_widget_settings_' . $this->widget_id, array(
            'api_key' => array(
                'type' => 'text',
                'std' => '',
                'label' => __('API Key', 'sikeller-tools'),
                'group' => __('General', 'sikeller-tools'),
            ),
            'lattitude' => array(
                'type' => 'number',
                'std' => '',
                'step' => '0.0000001',
                'label' => __('Lattitude', 'sikeller-tools'),
                'group' => __('General', 'sikeller-tools'),
            ),
            'longitude' => array(
                'type' => 'number',
                'std' => '',
                'step' => '0.0000001',
                'label' => __('Longitude', 'sikeller-tools'),
                'group' => __('General', 'sikeller-tools'),
            ),
            'zoom' => array(
                'type' => 'number',
                'std' => '',
                'step' => '1',
                'label' => __('Zoom', 'sikeller-tools'),
                'group' => __('General', 'sikeller-tools'),
            ),
            'icon' => array(
                'type' => 'image',
                'std' => '',
                'label' => __('Marker image', 'sikeller-tools'),
                'group' => __('General', 'sikeller-tools'),
            ),
            'id' => array(
                'type' => 'text',
                'std' => '',
                'label' => __('Identifier (html id)', 'sikeller-tools'),
                'group' => __('General', 'sikeller-tools'),
            ),
        ));

        parent::__construct();
    }

    /**
     * Output widget.
     *
     * @see WP_Widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {

        $this->widget_start($args, $instance);

        $args['widget_id'] = $this->id;

        sikeller_tools_get_template('content-widget-google-maps.php', array('args' => $args, 'instance' => $instance));

        $this->widget_end($args);
    }


}
