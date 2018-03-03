<?php
/**
 * Heading Widget
 *
 * Displays heading widget.
 *
 * @extends  SK_Widget
 * @version  1.0.0
 * @package  Sikeller_Tools/Widgets
 * @category Widgets
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * SK_Widget_Heading Class
 */
class SK_Widget_Heading extends SK_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'sk-widget section-title-wrapper';
		$this->widget_description = __( 'Add a heading here.', 'sikeller-tools' );
		$this->widget_id          = 'sikeller_tools_heading';
		$this->widget_name        = __( 'SK: Heading', 'sikeller-tools' );
		$this->control_ops        = array( 'width' => 400, 'height' => 350 );
		$this->settings           = apply_filters( 'sikeller_tools_widget_settings_' . $this->widget_id, array(
			'heading-title'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Heading', 'sikeller-tools' ),
                'group' => __( 'General', 'sikeller-tools' ),
			),
			'subheading'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Sub Heading', 'sikeller-tools' ),
                'group' => __( 'General', 'sikeller-tools' ),
			),
            'tag'  => array(
                'type'  => 'select',
                'std'   => 'h2',
                'label' => __( 'Heading Tag', 'sikeller-tools' ),
                'options' => array(
                    'h1'  => __( 'h1', 'sikeller-tools' ),
                    'h2' => __( 'h2', 'sikeller-tools' ),
                    'h3' => __( 'h3', 'sikeller-tools' ),
                    'h4' => __( 'h4', 'sikeller-tools' ),
                    'h5' => __( 'h5', 'sikeller-tools' ),
                ),
                'group' => __( 'General', 'sikeller-tools' ),
            ),
		) );

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
	public function widget( $args, $instance ) {

		$this->widget_start( $args, $instance );

		$args['widget_id'] = $this->id;

        sikeller_tools_get_template( 'content-widget-heading.php', array( 'args' => $args, 'instance' => $instance ) );

		$this->widget_end( $args );
	}


}
