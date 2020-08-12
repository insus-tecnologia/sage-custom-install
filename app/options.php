<?php

namespace App;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', function () {
    Container::make( 'theme_options', __('Theme Options', 'sage') )
        ->add_fields( array(
            // CREATE HERE YOUR THEME OPTIONS FIELDS:
            Field::make( 'text', 'crb_facebook_url') ,
            Field::make( 'textarea', 'crb_footer_text' )
        ));
});

// Load Carbon Fields
add_action( 'after_setup_theme', function () {
    \Carbon_Fields\Carbon_Fields::boot();
});