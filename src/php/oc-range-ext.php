<?php

/**
 * extend customizer control to be able to use range 
 */
class OC_Range_Ext {

    /**
     * range extension instance
     */
    static $instance;
    /**
     * register 
     */
    function customize_register($customize_mgr) {
        $customize_mgr->register_control_type('OC_Range');
    }

    /**
     * enqueue scripts
     */
    function enqueue_scripts($js_directory) {
        wp_register_script('oc-range',
            implode('/', [
                $js_directory,
                'oc-range.js'
        ]));
        wp_enqueue_script('oc-range');
    } 

    /**
     * enqueue style 
     */
    function enqueue_styles($css_directory) {
        wp_register_style('oc-range',
            implode('/', [
                $css_directory,
                'oc-range.css'
         ]));
        wp_enqueue_style('oc-range');
    }
}

OC_Range_Ext::$instance = new OC_Range_Ext;

// vi: se ts=4 sw=4 et:
