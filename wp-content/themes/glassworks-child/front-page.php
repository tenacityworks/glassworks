<?php get_header(); ?>

<!-- Row for main content area -->
<div class="small-12 large-12 columns" id="content" role="main">

    <div class="entry-content">

        <?php
            $args = array(
                'post_type' => 'gallery',
                'posts_per_page' => -1
            );

            $slider = new WP_Query( $args );
        ?>

        <div class="home-carousel">
            <?php while($slider->have_posts()) : $slider->the_post(); ?>
                <div class="home-gallery">
                    <div class="gallery-photo" data-id="<?php echo $post->ID; ?>">
                        <?php echo pods_image( get_post_meta( $post->ID, 'gallery_image', true ), 'original' );  ?>
                    </div>
                    <div class="gallery-description">
                        <?php
                            // check if description exists
                            $content_exists = get_the_content();
                            if($content_exists != '') { ?>
                                <?php echo '<span id="info-btn"></span>';       // display info block ?>
                                    <div class="info-content">
                                        <?php the_content(); ?>
                                    </div>
                            <?php } else {
                                echo "";   //show demo information;
                            }
                        ?>
                    </div>

                </div>
            <?php endwhile;?>

            <?php wp_reset_query(); ?>
        </div>

    </div>


</div>

<?php get_footer(); ?>
