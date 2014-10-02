    <?php get_sidebar( 'footer' ); ?>

    <footer class="section section-footer">
      <div class="container">
        <div class="row">
          <div class="copyright-text col col-xs-12 col-md-6">
            <?php restful_copyright_text(); ?>
          </div>

          <div class="theme-credit col col-xs-12 col-md-6"><a href="http://themebright.co/" class="themebright-logo"><?php locate_template( 'assets/img/themebright-logo.svg', 'true' ); ?></a></div>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>