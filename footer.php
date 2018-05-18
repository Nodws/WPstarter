<footer class="site-footer">
  <hr/>

	<div class="container">
	<div class="row">
    <?php dynamic_sidebar('footer-widget-area'); ?>
  </div>
	<div class="row">
    <?php dynamic_sidebar('footer-full'); ?>
  </div>

  <div class="row">
    <div class="col">
      <p class="text-center">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?> </a>| <? bloginfo('description'); ?></p>
    </div>
  </div>
</div>
</footer>


<?php wp_footer(); ?>
</body>
</html>
