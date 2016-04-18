</div><!-- Row End -->
</div><!-- Container End -->

<footer class="full-width closed-menu" role="contentinfo">
    <div class="large-12 colunms">
        <div class="footer-container">

            <a href="<?php bloginfo('url'); ?>">
                <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" align="Glassworks Logo"/>
            </a>

            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'footer-nav'
                    )
                );
            ?>
            <span id="mobi-trigger"></span>

            <?php if ( is_front_page() ) { ?>
                <?php echo '<span id="gallery-toggle"></span>'; ?>
            <?php } ?>

        </div>
    </div>

    <!-- Gallery Thumbnails on homepage -->
    <?php if ( is_front_page() ) { ?>
        <div class="large-12 colunms gallery-thumbnails-wrapper">
            <div class="row">
                <div class="gallery-thumbnails">
                    <?php
                    $terms = get_terms("gallerycategory");
                    $count = count($terms);
                    if ( $count > 0 ){
                        foreach ( $terms as $term ) {
                            echo '<div class="gallery-thumb-group">';
                            echo '<h2>' . $term->name . '</h2>';
                            echo '<ul>';

                            $loop = new WP_Query( array(
                                'post_type' => 'gallery',
                                'posts_per_page' => -1,
                                'orderby' => 'date',
                                'order' => 'ASC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'gallerycategory',
                                        'field' => 'id',
                                        'terms' => $term->term_id
                                    )
                                )
                            ));
                            ?>

                            <?php while ($loop->have_posts()) : $loop->the_post();    // the loop ?>
                                <li class="foot-slide" data-id="<?php echo $post->ID; ?>">
                                    <a href="javascript:void(0);  <?php //echo get_home_url() . '/' . '#'; ?> ">
                                        <?php echo pods_image( get_post_meta( $post->ID, 'gallery_image', true ), 'thumbnail' );    // do loop content ?>
                                    </a>
                                </li>
                            <?php endwhile;  ?>
                            <?php wp_reset_postdata();  // reset $post so that the rest of the template is in the original context ?>

                            <?php
                            echo '</ul>';

                        }
                    } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</footer>

<?php wp_footer(); ?>

<script>
    (function($) {
        $(document).foundation();
    })(jQuery);
</script>

</body>
</html>