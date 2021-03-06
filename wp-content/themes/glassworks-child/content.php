<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-card'); ?>>
    <header>
        <h2>
            <a href="<?php the_permalink(); ?>">
                <?php echo get_the_date(); ?> - <?php the_title(); ?>
            </a>
        </h2>
    </header>
    <div class="blog-content">
        <?php the_excerpt(); ?>
    </div>
</article>