<?php get_header(); ?>

    <!-- Row for main content area -->
    <div class="large-12 columns" id="content" role="main">

        <?php /* Start loop */ ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="entry-content">
                <div class="eighty">
                    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                        <header>
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header>
                        <p class="post-info"><?php the_author();?> - <?php echo get_the_date(); ?></p>
                        <?php the_content(); ?>
                        <footer>
                            <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
                            <p class="entry-tags"><?php the_tags(); ?></p>
                            <?php edit_post_link('Edit this Post'); ?>
                        </footer>
                    </article>
                </div>
            </div>
        <?php endwhile; // End the loop ?>

    </div>

<?php get_footer(); ?>