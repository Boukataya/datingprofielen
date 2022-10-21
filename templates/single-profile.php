<?php

/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if (astra_page_layout() == 'left-sidebar') : ?>

    <?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <div <?php astra_blog_layout_class('single-layout-1'); ?>>

        <?php astra_single_header_before(); ?>

        <header class="entry-header <?php astra_entry_header_class(); ?>">

            <?php astra_single_header_top(); ?>

            <?php astra_blog_post_thumbnail_and_title_order(); ?>

            <?php astra_single_header_bottom(); ?>

        </header><!-- .entry-header -->

        <?php astra_single_header_after(); ?>

        <div class="entry-content clear" <?php
                                            echo astra_attr(
                                                'article-entry-content-single-layout',
                                                array(
                                                    'class' => '',
                                                )
                                            );
                                            ?>>

            <?php astra_entry_content_before(); ?>

            <?php the_content(); ?>
            <?php $gender = get_post_meta(get_the_ID(), 'gender', true); ?>
            <h3><?php echo $gender; ?></h3>


            <?php
            astra_edit_post_link(
                sprintf(
                    /* translators: %s: Name of current post */
                    esc_html__('Edit %s', 'astra'),
                    the_title('<span class="screen-reader-text">"', '"</span>', false)
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>

            <?php astra_entry_content_after(); ?>

            <?php
            wp_link_pages(
                array(
                    'before'      => '<div class="page-links">' . esc_html(astra_default_strings('string-single-page-links-before', false)),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-link">',
                    'link_after'  => '</span>',
                )
            );
            ?>
        </div><!-- .entry-content .clear -->
    </div>
    <?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php if (astra_page_layout() == 'right-sidebar') : ?>

    <?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>