<?php get_header(); ?>

<div class="container">
    <header><h1> <?php echo ucfirst($wp_query->query[pagename]); ?></h1></header>
  <div class="row">
    
    <div class="col-sm-9">
      <div id="content" role="main">
          <?php get_template_part('loops/content', get_post_format()); ?>
      </div><!-- /#content -->  
     <nav class="pagination">
    <? wpst_pagination(); ?>
    </nav>
    </div>
    
    <div class="col-sm-3" id="sidebar" role="navigation">
       <?php get_sidebar(); ?>
    </div>
    
  </div><!-- /.row -->
  
</div><!-- /.container -->

<?php get_footer(); ?>
