<?php
/**
 * @package WordPress
 * @subpackage Twenty_Twelve_Child
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
            
        <?php
            $posts = get_field( 'homepage_work' );    
            if ( $posts ) :
        ?>
            <ul class="h-list work-list">
                <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                    <li <?php post_class( 'box' ); ?>>
                        <div class="box-inner">
                            <a class="img-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'work-thumb' ); ?></a>
                            <h2 class="post-name"><?php the_title(); ?></h2>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>  
        <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>