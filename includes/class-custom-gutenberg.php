<?php

//The core plugin class. This is used to define internationalization, admin-specific hooks, and public-facing site hooks.
class CGP
{
    //The loader that's responsible for maintaining and registering all hooks that power the plugin.
    protected $loader;

    //The unique identifier of this plugin.
    protected $plugin_name;

    //The current version of the plugin.
    protected $version;

    //Define the core functionality of the plugin.
    public function __construct()
    {
        if (defined('CGP_VERSION')) {
            $this->version = CGP_VERSION;
        } else {
            $this->version = '0.0.1';
        }
        $this->plugin_name = 'custom-gutenberg';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    //Load the required dependencies for this plugin.
    private function load_dependencies()
    {

        //The class responsible for orchestrating the actions and filters of the core plugin.
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-custom-gutenberg-loader.php';

        //The class responsible for defining internationalization functionality of the plugin.
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-custom-gutenberg-i18n.php';

        //The class responsible for defining all actions that occur in the admin area.
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-custom-gutenberg-admin.php';

        //The class responsible for defining all actions that occur in the public-facing side of the site.
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-custom-gutenberg-public.php';

        $this->loader = new CGP_Loader();
    }

    //Define the locale for this plugin for internationalization.
    private function set_locale()
    {

        $plugin_i18n = new CGP_i18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
    }

    //Register all of the hooks related to the admin area functionality of the plugin.
    private function define_admin_hooks()
    {

        $plugin_admin = new CGP_Admin($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
    }

    //Register all of the hooks related to the public-facing functionality of the plugin.
    private function define_public_hooks()
    {

        $plugin_public = new CGP_Public($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
    }

    //Run the loader to execute all of the hooks with WordPress.
    public function run()
    {
        $this->loader->run();
    }

    //The name of the plugin used to uniquely identify it within the context of  WordPress and to define internationalization functionality.
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    //The reference to the class that orchestrates the hooks with the plugin.
    public function get_loader()
    {
        return $this->loader;
    }

    //Retrieve the version number of the plugin.
    public function get_version()
    {
        return $this->version;
    }
}
