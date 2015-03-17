<?php

if ( post_password_required() ) return;

if ( comments_open() ) : ?>
  <div class="comments-wrapper">

    <?php if ( have_comments() ) : ?>
      <div class="replies-wrapper">
        <h3><?php comments_number(); ?></h3>

        <ol class="comments-list">
          <?php

          $args = array(
            'style'       => 'ol',
            'short_ping'  => true,
            'avatar_size' => 60
          );

          wp_list_comments( $args );

          ?>
        </ol>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
          <div class="pagination">
            <?php paginate_comments_links(); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php restful_comment_form(); ?>
  </div>
<?php endif;
