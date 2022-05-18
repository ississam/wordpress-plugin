<?php
/*
Plugin Name: Smashing Fields Plugin
description: >-
Setting up configurable fields for our plugin.
Author: Matthew Ray
Version: 1.0.0
*/
class Smashing_Fields_Plugin
{

        public function __construct()
        {
                // Hook into the admin menu
                add_action('admin_menu', array($this, 'create_plugin_settings_page'));
                add_action('admin_init', array($this, 'setup_sections'));
        }

        public function create_plugin_settings_page()
        {
                // Add the menu item and page
                $page_title = 'Issam plug page title';
                $menu_title = 'Issam plug menu title';
                $capability = 'manage_options';
                $slug = 'smashing_fields';
                $callback = array($this, 'plugin_settings_page_content');
                $icon = 'dashicons-admin-plugins';
                $position = 100;

                // add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
                add_submenu_page('options-general.php', $page_title, $menu_title, $capability, $slug, $callback);
        }

        public function plugin_settings_page_content()
        { ?>
                <div class="wrap">
                        <h2>IssamSettings Page</h2>
                        <form method="post" action="options.php">
                                <?php
                                                settings_fields('smashing_fields');
                                                do_settings_sections('smashing_fields');
                                                submit_button();
                                                ?>
                        </form>
                </div> <?php
        }

        // public function setup_sections()
        // {
        //         add_settings_section('our_first_section', 'My First Section Title', false, 'smashing_fields');
        // }

        public function setup_sections()
        {
                add_settings_section('our_first_section', 'My First Section Title', array($this, 'section_callback'), 'smashing_fields');
                add_settings_section('our_second_section', 'My Second Section Title', array($this, 'section_callback'), 'smashing_fields');
                add_settings_section('our_third_section', 'My Third Section Title', array($this, 'section_callback'), 'smashing_fields');
        }

        public function section_callback( $arguments ) {
                echo'Hello World'; 
        }

                                // Our code will go here
}
                        new Smashing_Fields_Plugin();
