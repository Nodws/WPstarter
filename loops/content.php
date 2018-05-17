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
                <time  class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php the_time('j F Y') ?></time>
              </em>
            </h5>
        </header>
        <section>
            <?php the_post_thumbnail(); ?>
            <?php the_excerpt(); ?>
        </section>
        <footer>
            <p class="text-muted" style="margin-bottom: 20px;">
                <i class="fa fa-folder-open-o"></i>&nbsp; <?php _e('Category', 'wpst'); ?>: <?php the_category(', ') ?>
            </p>
        </footer>
    </article>
<?php endwhile; ?>


<?php  endif; ?>
