<?php
/**
 * Abstract Widget Class
 *
 * @class    SK_Widget
 * @extends  WP_Widget
 * @version  1.0.0
 * @package  Sikeller_Tools/Abstracts
 * @category Widgets
 * @author   ThemeGrill
 */
abstract class SK_Widget extends WP_Widget {

	/**
	 * CSS class.
	 *
	 * @var string
	 */
	public $widget_cssclass;

	/**
	 * Widget description.
	 *
	 * @var string
	 */
	public $widget_description;

	/**
	 * Widget ID.
	 *
	 * @var string
	 */
	public $widget_id;

	/**
	 * Widget name.
	 *
	 * @var string
	 */
	public $widget_name;

	/**
	 * Widget Settings.
	 *
	 * @var array
	 */
	public $settings = array();

	/**
	 * Widget Control Options.
	 *
	 * @var array
	 */
	public $control_ops = array();

	/**
	 * Constructor.
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => $this->widget_cssclass,
			'description' => $this->widget_description,
			'customize_selective_refresh' => false,
		);

		parent::__construct( $this->widget_id, $this->widget_name, $widget_ops, $this->control_ops );
	}

    /**
     * Output the html at the start of a widget.
     *
     * @param  array $args
     * @param  $instance
     * @return string
     */
    public function widget_start( $args, $instance ) {
        echo $args['before_widget'];

        if ( $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
    }

    /**
     * Output the html at the end of a widget.
     *
     * @param  array $args
     * @return string
     */
    public function widget_end( $args ) {
        echo $args['after_widget'];
    }
}
