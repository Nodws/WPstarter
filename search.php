<?php get_header(); ?>

<div class="container">
  <div class="row">
    
    <div class="col-sm-9">
      <div id="content" role="main">
        <h1><?php _e('Search Results for', 'wpst'); ?> &ldquo;<?php the_search_query(); ?>&rdquo;</h1>
        <hr/>
        <?php get_template_part('loops/content', 'search'); ?>
      </div><!-- /#content -->
    </div>
    
    <div class="col-sm-3" id="sidebar" role="navigation">
       <?php get_sidebar(); ?>
    </div>
    
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
