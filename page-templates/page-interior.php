<?php
/**
 * Template name: Interiores
 *
 * @package WPstarter
 */
?>
<?php get_header();
?>
<div class="cover" style="background-image:url(<? the_post_thumbnail_url( 'full' );  ?>)">
	<div class="container">
		<h2><?php the_title()?></h2>	
	</div>
</div>

<?php if(have_posts()): while(have_posts()): the_post();?>
      <div id="content" class="container" role="main">
          <?php echo the_content();
           ?>
      </div><!-- /#content -->
   <? endwhile; endif; ?>
<?php get_footer(); ?>
