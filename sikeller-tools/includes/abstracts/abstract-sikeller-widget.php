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


    /**
     * Outputs the settings update form.
     *
     * @see   WP_Widget->form
     * @param array $instance
     */
    public function form( $instance ) {
        if ( empty( $this->settings ) ) {
            return;
        }

        $group_name_array = array(); ?>

        <div class="sikeller-tab-title-container">
            <?php $group_count = 1;

            foreach ( $this->settings as $key => $setting ) {

                $group_name = isset( $setting['group'] ) ? $setting['group'] : __( 'General', 'sikeller-tools' );

                if ( ! in_array( $group_name, $group_name_array )) {
                    $group_name_array[] = $group_name;

                    if( $group_name_array[0] != '' ) { ?>
                        <a class="sikeller-tools-tab-title <?php echo ($group_count == 1 ? ' active' : '' ); ?>" href="#sikeller-tools-tab-<?php echo esc_attr( $group_count ); ?>">
                            <?php echo esc_html( $group_name ); ?>
                        </a>
                        <?php
                    }
                    $group_count++;
                }
            } ?>

        </div><!-- .sikeller-tools-tab-title-container -->
        <div class="sikeller-tools-tab-content-container">
            <?php $group_count = 1;

            foreach ( $group_name_array as $group ) { ?>
                <div class="sikeller-tools-tab" id="sikeller-tools-tab-<?php echo esc_attr( $group_count ); ?>">
                    <?php foreach ( $this->settings as $key => $setting ) {
                        $current_setting_group = isset( $setting['group'] ) ? $setting['group'] : __( 'General', 'sikeller-tools' );
                        if ( $current_setting_group == $group || empty( $group_name_array ) ) {
                            $class = isset( $setting['class'] ) ? $setting['class'] : '';
                            $value = isset( $instance[ $key ] ) ? $instance[ $key ] : $setting['std'];
                            $field_width = isset( $setting['field_width'] ) ? $setting['field_width'] : 'col-full';

                            switch ( $setting['type'] ) {

                                case 'text' :
                                    ?>
                                    <p class="sk-widget-col <?php echo esc_attr( $field_width ); ?>">
                                        <label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
                                        <input class="widefat <?php echo esc_attr( $class ); ?>" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" type="text" value="<?php echo esc_attr( $value ); ?>" />
                                    </p>
                                    <?php
                                    break;

                                case 'textarea' :
                                    ?>
                                    <p>
                                        <label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
                                        <textarea class="widefat <?php echo esc_attr( $class ); ?>" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" cols="20" rows="3"><?php echo esc_textarea( $value ); ?></textarea>
                                        <?php if ( isset( $setting['desc'] ) ) : ?>
                                            <small><?php echo esc_html( $setting['desc'] ); ?></small>
                                        <?php endif; ?>
                                    </p>
                                    <?php
                                    break;

                                // Default: run an action.
                                default :
                                    do_action( 'sikeller_tools_toolkit_widget_field_' . $setting['type'], $key, $value, $setting, $instance );
                                    break;
                            } //End switch().
                        }
                    } ?>
                </div><!-- tab closed -->
                <?php $group_count++;
            } ?>
        </div><!-- .sikeller-tools-tab-content-container -->
        <?php
    }
    
}
