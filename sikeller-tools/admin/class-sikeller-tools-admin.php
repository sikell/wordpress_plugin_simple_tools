<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://sikeller.de
 * @since      1.0.0
 *
 * @package    Sikeller_Tools
 * @subpackage Sikeller_Tools/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sikeller_Tools
 * @subpackage Sikeller_Tools/admin
 */
class Sikeller_Tools_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $sikeller_tools The ID of this plugin.
     */
    private $sikeller_tools;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $sikeller_tools The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($sikeller_tools, $version)
    {

        $this->sikeller_tools = $sikeller_tools;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Sikeller_Tools_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Sikeller_Tools_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->sikeller_tools, plugin_dir_url(__FILE__) . 'css/sikeller-tools-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Sikeller_Tools_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Sikeller_Tools_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->sikeller_tools, plugin_dir_url(__FILE__) . 'js/sikeller-tools-admin.js', array('jquery'), $this->version, false);

    }

}
