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
<div class="container">
  <div class="row">
    
    <div class="col-12">
      <div id="content" role="main">
          <?php the_content(); ?>
      </div><!-- /#content -->
    </div>
    
   
    
  </div><!-- /.row -->
</div><!-- /.container -->
<?php get_footer(); ?>
