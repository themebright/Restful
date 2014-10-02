<div class="comments-wrapper">
  <div class="replies-wrapper">
    <h3><?php comments_number(); ?></h3>

    <ol class="comments-list">
      <?php wp_list_comments(); ?>
    </ol>

    <?php if ( get_previous_comments_link() || get_next_comments_link() ) : ?>
      <div class="pagination">
        <?php paginate_comments_links(); ?>
      </div>
    <?php endif; ?>
  </div>

  <?php restful_comment_form(); ?>
</div>