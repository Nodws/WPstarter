
<?php
/**
 * Template name: Sidebar
 *
 * @package wpst
 */
?>
<?php get_header();
?>
<div class="container-fluid">
  <div class="row">
    
    <div class="col-sm-8">
     <?php
  if (have_posts()) : while(have_posts()) : the_post();
  the_content( );

  endwhile; endif;
 ?>
    </div>
    
    <div class="col-sm-4" id="sidebar" role="navigation">
       <?php get_sidebar(); ?>
    </div>
    
  </div><!-- /.row -->
</div><!-- /.container -->


<?php get_footer(); ?>
