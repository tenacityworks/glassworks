</div><!-- Row End -->
</div><!-- Container End -->

<footer class="full-width closed-menu" role="contentinfo">
    <div class="large-12 colunms">
        <div class="">

            <a href="<?php echo bloginfo('url'); ?>">
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

            <span id="gallery-toggle"></span>

        </div>
    </div>

    <!-- Gallery Thumbnail -->
    <div class="large-12 colunms gallery-thumbnails-wrapper">
        <div class="row">
            <div class="gallery-thumbnails">
                <?php
                $terms = get_terms("gallerycategory");
                $count = count($terms);
                if ( $count > 0 ){
                    foreach ( $terms as $term ) {
                        echo '<div class="gallery-thub-group">';
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
                            <li>
                                <a href="<?php ?> #">
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
</footer>

<?php wp_footer(); ?>

<script>
    (function($) {
        $(document).foundation();
    })(jQuery);
</script>

</body>
</html>