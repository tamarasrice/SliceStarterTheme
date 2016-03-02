<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _tk
 */

get_header(); ?>

<div id="content" class="main-content-inner col-sm-12 col-md-8">

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header>
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header><!-- .entry-header -->
        
            <div class="entry-content">
                <div class="entry-content-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
                <?php the_content(); ?>
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', '_tk' ),
                        'after'  => '</div>',
                    ) );
                ?>
            </div><!-- .entry-content -->
            <?php edit_post_link( __( 'Edit', '_tk' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
        </article><!-- #post-## -->

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
		?>

	<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
