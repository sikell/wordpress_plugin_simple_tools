<?php
/**
 * Thumbnail image Widget
 *
 * Displays a thumbnail image and links to the larger version of
 * this image. Both images must be defined separate.
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
class SK_Widget_Thumb_Image extends SK_Widget
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'sk-widget thumbnail-img';
        $this->widget_description = __('Display a thumbnail and link larger image.', 'sikeller-tools');
        $this->widget_id = 'sikeller_tools_thumb_image';
        $this->widget_name = __('SK: Thumbnail image', 'sikeller-tools');
        $this->control_ops = array('width' => 400, 'height' => 350);
        $this->settings = apply_filters('sikeller_tools_widget_settings_' . $this->widget_id, array(
            'image_thumbnail' => array(
                'type' => 'image',
                'std' => '',
                'label' => __('Image thumbnail', 'sikeller-tools'),
                'group' => __('General', 'sikeller-tools'),
            ),
            'image_link' => array(
                'type' => 'image',
                'std' => '',
                'label' => __('Large linked image', 'sikeller-tools'),
                'group' => __('General', 'sikeller-tools'),
            ),
            'alt_tag' => array(
                'type' => 'text',
                'std' => '',
                'label' => __('Image name', 'sikeller-tools'),
                'group' => __('General', 'sikeller-tools'),
            ),
            'link_title' => array(
                'type' => 'text',
                'std' => '',
                'label' => __('Link title', 'sikeller-tools'),
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

        sikeller_tools_get_template('content-widget-thumb-image.php', array('args' => $args, 'instance' => $instance));

        $this->widget_end($args);
    }


}
