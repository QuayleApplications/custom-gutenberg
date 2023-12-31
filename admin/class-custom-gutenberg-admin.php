<?php

//The admin-specific functionality of the plugin.
class CGP_Admin
{
    //The ID of this plugin.
    private $plugin_name;

    //The version of this plugin.
    private $version;

    //Initialize the class and set its properties.
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    //Register the stylesheets for the admin area.
    public function enqueue_styles()
    {
        //This function is provided for demonstration purposes only.
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/custom-gutenberg-admin.css', array(), $this->version, 'all');
    }

    //Register the JavaScript for the admin area.
    public function enqueue_scripts()
    {
        //This function is provided for demonstration purposes only.
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/custom-gutenberg-admin.js', array('jquery'), $this->version, false);
    }
}
