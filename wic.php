<?php

namespace pechenki\WIC;

use pechenki\WIC\src\WicCore;

class wic extends  WicCore{




    public function init (){
        add_action('admin_menu', array($this, 'settingsTemplete'));
        add_action('init', array($this, 'load'));


    }
    public function load(){
        wp_enqueue_script('wic', VIC_DIR_URL . '/public/js/wic.js');
    }

    /**
     *
     */
    public function settingsTemplete()
    {
        add_menu_page('Visually-impaired-contrast',  'Visually-impaired-contrast', 'manage_options', 'v-i-contrast', array($this, 'settings'));

    }
    /*
     *
     */
    public function settings(){
      $this->render('admin/index',['test'=>32]);
    }
}
