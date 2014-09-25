<!DOCTYPE html>

<!--[if IE 9 ]><html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->

<head>

    <?php wp_head(); ?>

</head>


<body id="<?php print get_stylesheet(); ?>" <?php body_class('ct-body'); ?>>

<div class="overflow-container">
    <a class="skip-content" href="#main">Skip to content</a>
<header id="site-header" class="site-header" role="banner">

    <?php

    $social_icon_setting = get_theme_mod('social_icons_display_setting');

    if(
        // if secondary menu is set, or...
        (has_nav_menu( 'secondary' )) ||

        // if search bar is on, or...
        (get_theme_mod('search_input_setting') == 'show') ||

        // default is 'no', so if it is equal header & footer, or header display it
        ( $social_icon_setting == 'header-footer' || $social_icon_setting == 'header' ) ) {

            echo "<div class='top-navigation'>";

                echo "<div class='container'>";

                    // add secondary menu if set
                    get_template_part( 'menu', 'secondary' );

                    // add search input if set
                    if(get_theme_mod('search_input_setting') == 'show'){
                        get_search_form();
                    }
                    // display social icons if set
                    if( (get_theme_mod('social_icons_display_setting') == 'header-footer') || (get_theme_mod('social_icons_display_setting') == 'header')){
                        ct_tracks_customizer_social_icons_output();
                    }

                echo "</div>";

            echo "</div>";
    } ?>
    <div class="container">

        <div id="title-info" class="title-info">
            <?php get_template_part('logo')  ?>
        </div>

        <?php get_template_part( 'menu', 'primary' ); // adds the primary menu ?>
    </div><!-- .container -->
</header>
<div id="main" class="main" role="main">