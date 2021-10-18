<?php

namespace pechenki\WIC;

use pechenki\WIC\src\WicCore;

class wic extends  WicCore{


    /**
     *
     */
    public function init (){
        add_action('admin_menu', array($this, 'settingsTemplete'));
        add_action('init', array($this, 'load'));

        add_action( 'wp_ajax_wic_css', array($this,'addCss'));
        add_action( 'wp_ajax_nopriv_wic_css', array($this,'addCss'));

        add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );


    }


    public function register_plugin_styles() {

        $urlcss = sprintf('%s?action=wic_css',admin_url('admin-ajax.php'));
        $COOKIE = $_COOKIE;
        $disabled = 'disabled';

        if (isset($COOKIE['gray']))  $disabled = '';

        $style = sprintf('<link rel="stylesheet" id="wic_css-css" href="%s" media="all" %s>',$urlcss,$disabled);

        echo  $style;

        wp_enqueue_style( 'wic_css' );
        wp_localize_script( 'wic', 'wicdata',
            array(
                'url' =>  $urlcss
            )
        );
        wp_enqueue_script( 'wic' );

    }

    /**
     * init script to load page
     */
    public function load(){

        wp_enqueue_script('wic', VIC_DIR_URL . '/public/js/wic.js');

        $COOKIE = $_COOKIE;

        if (isset($COOKIE['gray'])){



            add_filter( 'body_class',function ($classes){
                $classes[] = 'grey-contrast';
                return $classes;
            });
        }

    }

    public function head(){
        add_action( 'wp_enqueue_scripts', function (){
            wp_localize_script( 'wicdata-script', 'wicdata',
                array(
                    'url' => admin_url('admin-ajax.php')
                )
            );
        }, 99 );

    }


    /**
     *
     */
    public  function  addCss(){
        header('Content-Type: text/css');
        echo $this->customCss;
        wp_die();
    }
    /**
     * settings action
     */
    public function settingsTemplete()
    {
        add_menu_page('Visually-impaired-contrast',  'Visually-impaired-contrast', 'manage_options', 'v-i-contrast', array($this, 'settings'));

    }
    /*
     * settings html
     */
    public function settings(){
      $this->render('admin/index',['wic_css'=>$this->customCss]);
    }
}
