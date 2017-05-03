<?php
/*
The Default Loop (used by index.php and category.php)
=====================================================
*/
?>

<?php if(have_posts()): while(have_posts()): the_post();?>
    <article role="article" id="post_<?php the_ID()?>">
        <header>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h2>
            <h5>
              <em>
                <span class="text-muted author"><?php _e('By', 'wpst'); echo " "; the_author() ?>,</span>
                <time  class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php the_time('jS F Y') ?></time>
              </em>
            </h5>
        </header>
        <section>
            <?php the_post_thumbnail(); ?>
            <?php the_content( __( '&hellip; ' . __('Continue reading', 'wpst' ) . ' <i class="glyphicon glyphicon-arrow-right"></i>', 'wpst' ) ); ?>
        </section>
        <footer>
            <p class="text-muted" style="margin-bottom: 20px;">
                <i class="fa fa-folder-open-o"></i>&nbsp; <?php _e('Category', 'wpst'); ?>: <?php the_category(', ') ?><br/>
                <i class="fa fa-comment-o"></i>&nbsp; <?php _e('Comments', 'wpst'); ?>: <?php comments_popup_link(__('None', 'wpst'), '1', '%'); ?>
            </p>
        </footer>
    </article>
<?php endwhile; ?>

<?php if ( function_exists('wpst_pagination') ) { wpst_pagination(); } else if ( is_paged() ) { ?>
  <ul class="pagination">
    <li class="older"><?php next_posts_link('<i class="fa fa-arrow-left"></i> ' . __('Previous', 'wpst')) ?></li>
    <li class="newer"><?php previous_posts_link(__('Next', 'wpst') . ' <i class="fa fa-arrow-right"></i>') ?></li>
  </ul>
<?php } ?>

<?php else: wp_redirect(get_bloginfo('siteurl').'/404', 404); exit; endif; ?>
