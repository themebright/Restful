    <?php get_sidebar( 'footer' ); ?>

    <footer class="footer section">
      <div class="container">
        <div class="row">
          <div class="footer__copyright col col--xs--12 col--md--6">&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?></div>
          <div class="footer__credit col col--xs--12 col--md--6"><a href="http://themebright.com/"><?php _e( 'Theme designed by ThemeBright', 'restful' ); ?></a></div>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>
