<?
/*
  Full width no sidebar for Visual Composer
*/
?>
<div class="container-fluid">
<?php get_header();
  if (have_posts()) : while(have_posts()) : the_post();
  the_content( );

  endwhile; endif;
 ?>
</div>

<?php get_footer(); ?>