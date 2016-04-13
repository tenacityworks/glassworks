<?php get_header(); ?>

    <!-- Row for main content area -->
    <div class="large-12 columns" id="content" role="main">

        <div class="entry-content">

        <?php if ( have_posts() ) : ?>

            <div class="eighty">

                <?php if(is_home()) {       // check if is blog ?>
                    <header>
                        <h1 class="entry-title">
                            <?php echo __("Blog"); ?>
                        </h1>
                    </header>
                <?php } ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>

            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; // end have_posts() check ?>

            <nav id="post-nav">
                <div class="post-previous"><?php next_posts_link( __( 'Next five posts', 'reverie' ) ); ?></div>
                <div class="post-next"><?php previous_posts_link( __( 'Previous five posts', 'reverie' ) ); ?></div>
            </nav>

            </div>

        </div>

    </div>

<?php get_footer(); ?>