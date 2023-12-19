<?php

//Define the internationalization functionality
class CGP_i18n
{
    //Load the plugin text domain for translation.
    public function load_plugin_textdomain()
    {
        load_plugin_textdomain(
            'custom-gutenberg',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }
}
