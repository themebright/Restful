<?php

get_header();

?>

<section class="masthead section">
  <div class="container">
    <h1 class="masthead__title"><?php _e( 'Not Found' , 'restful' ); ?></h1>
  </div>
</section>

<section class="main section">
  <div class="container">
    <article class="entry">
      <div class="entry__body rich-text">
        <p><?php _e( 'Sorry, the page or file you tried to access was not found.', 'restful' ); ?></p>
      </div>
    </article>
  </div>
</section>

<?php

get_footer();
