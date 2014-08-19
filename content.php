<?php

if( is_single() ) { ?>
    <div <?php post_class(); ?>>
        <?php
        if(get_theme_mod('premium_layouts_setting') == 'full-width-images' || get_theme_mod('premium_layouts_setting') == 'two-column-images'){
            if (has_post_thumbnail( $post->ID ) ) {
                echo "<div class='featured-image-container'>";
                ct_tracks_featured_image();
                echo "</div>";
            }
        } else {
            ct_tracks_featured_image();
        }
        ?>
        <div class="entry-meta">
            <?php get_template_part('content', 'post-meta'); ?>
        </div>
        <div class='entry-header'>
            <h1 class='entry-title'><?php the_title(); ?></h1>
        </div>
        <div class="entry-container">
            <div class="entry-content">
                <article>
                    <?php the_content(); ?>
                    <?php wp_link_pages(array('before' => '<p class="singular-pagination">' . __('Pages:','tracks'), 'after' => '</p>', ) ); ?>
                </article>
            </div>
            <?php echo get_template_part('sidebar','after-post-content'); ?>
            <div class='entry-meta-bottom'>
                <?php ct_tracks_further_reading(); ?>
                <div class="entry-categories"><?php ct_tracks_category_display(); ?></div>
                <div class="entry-tags"><?php ct_tracks_tags_display(); ?></div>
            </div>
            <?php
            if(get_theme_mod('additional_options_author_meta_settings') != 'hide'){ ?>
                <div class="author-meta">
                    <div class="author">
                        <?php ct_tracks_profile_image_output(); ?>
                        <span>Written by: <?php the_author_posts_link(); ?></span>
                    </div>
                    <div class="bio">
                        <p><?php the_author_meta( 'description' ); ?></p>
                        <?php ct_tracks_author_social_icons(); ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php
} else { ?>
    <div <?php post_class(); ?>>
        <?php
        // don't link the image if full-width layout
        if(get_theme_mod('premium_layouts_setting') == 'full-width' || get_theme_mod('premium_layouts_setting') == 'full-width-images'){
            ct_tracks_featured_image();
        } else { ?>
            <a class="featured-image-link" href="<?php the_permalink(); ?>">
                <?php ct_tracks_featured_image(); ?>
            </a>
        <?php } ?>
        <div class="excerpt-container">
            <?php
            if(get_theme_mod('premium_layouts_setting') == 'full-width-images' || get_theme_mod('premium_layouts_setting') == 'two-column-images'){ ?>
                <div class="content-container">
            <?php } ?>
            <div class="excerpt-meta">
                <?php get_template_part('content', 'post-meta'); ?>
            </div>
            <div class='excerpt-header'>
                <h1 class='excerpt-title'>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h1>
            </div>
            <div class='excerpt-content'>
                <article>
                    <?php ct_tracks_excerpt(); ?>
                </article>
            </div>
            <?php
                if(get_theme_mod('premium_layouts_setting') == 'full-width-images' || get_theme_mod('premium_layouts_setting') == 'two-column-images'){ ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php
}