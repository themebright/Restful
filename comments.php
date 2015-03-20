<?php

if ( post_password_required() ) return;

?>

<div id="comments" class="comments">
  <?php if ( have_comments() ) : ?>
    <div class="comments__replies">
      <h2 class="comments__replies-title"><?php comments_number(); ?></h2>
    </div>

    <ol class="comments__list">
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
      <nav class="comments__pagination pagination">
        <?php paginate_comments_links(); ?>
      </nav>
    <?php endif; ?>

    <?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
      <div class="comments__closed alert alert--error"><?php _e( 'Comments are closed.', 'restful' ); ?></div>
    <?php endif; ?>
  <?php endif; ?>

  <?php

  $args = array(
    'comment_notes_after' => false
  );

  comment_form( $args );

  ?>
</div>
