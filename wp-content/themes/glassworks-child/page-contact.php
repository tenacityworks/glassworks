<?php
/*
Template Name: Contact Page
*/
get_header(); ?>

<!-- Row for main content area -->
<div class="small-12 large-12 columns" id="content" role="main">

    <div class="entry-content">

        <?php /* Start loop */ ?>
        <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <header>
                <h1 class="entry-title">
                    <?php the_title(); ?>
                </h1>
            </header>



        <div class="eighty">

            <?php //the_content();      no content - page uses settings ?>

            <?php
                // get stored contact details
                $telephone = get_option( 'contactdetails_telephone' );
                $mobile = get_option( 'contactdetails_mobile' );
                $email_address = get_option( 'contactdetails_email_address' );
                $address = get_option( 'contactdetails_address' );
                $directions = get_option( 'contactdetails_directions' );
                $map_lat = get_option( 'contactdetails_map_latitude' );
                $map_long = get_option( 'contactdetails_map_longitude' );
            ?>

            <div class="content-block">
                <div id="map-wrapper" data-lat="<?php echo $map_lat; ?>" data-long="<?php echo $map_long; ?>" >
                    <div id="map">
                        <!-- Load Google Maps -->
                    </div>
                </div>

            </div>

            <div class="content-block">
                <h2><?php echo __( 'Directions', 'glassworks-child' ); ?></h2>
                <?php echo $directions; ?>
            </div>

            <div class="content-block">
                <h2><?php echo __( 'Address', 'glassworks-child' ); ?></h2>
                <?php echo $address; ?>
            </div>

            <div class="content-block">
                <h2><?php echo __( 'Contact Details', 'glassworks-child' ); ?></h2>
                <ul>
                    <li><span>T: </span><?php echo $telephone; ?></li>
                    <li><span>M: </span><?php echo $mobile; ?></li>
                    <li><span>E: </span><?php echo $email_address; ?></li>
                </ul>
            </div>

        </div>


        <footer>
            <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
            <p><?php the_tags(); ?></p>
        </footer>

        </article>

    </div>
    <?php endwhile; // End the loop ?>

</div>

<?php get_footer(); ?>
