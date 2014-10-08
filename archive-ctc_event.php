<?php

get_header();

$queried_object = get_queried_object();
$has_sidebar = is_active_sidebar( 'events' );

?>

<section class="section-masthead <?php if ( ! $has_sidebar ) echo 'masthead-centered' ?>">
  <div class="container">
    <h1 class="masthead-title"><?php echo $queried_object->labels->name; ?></h1>
  </div>
</section>

<section class="section section-main">
  <div class="container">
    <div class="row">
      <div class="col col-xs-12 <?php echo ( $has_sidebar ? 'col-md-7' : 'col-md-8 col-md-push-2' ); ?>">
        <?php

        global $wp_query;

        $args = array_merge( $wp_query->query_vars, array(
          'order'      => 'ASC',
          'orderby'    => 'meta_value',
          'meta_key'   => '_ctc_event_start_date',
          'meta_query' => array(
            array(
              'key'     => '_ctc_event_end_date',
              'value'   => date_i18n( 'Y-m-d' ),
              'compare' => '>=',
              'type'    => 'DATE'
            )
          )
        ) );

        query_posts( $args );

        if ( have_posts() ) : while ( have_posts() ) : the_post();

        ?>
          <?php get_template_part( 'content', 'full' ); ?>
        <?php endwhile; ?>
          <?php if ( restful_show_posts_nav() ) : ?>
            <nav class="pagination">
              <?php echo paginate_links(); ?>
            </nav>
          <?php endif; ?>
        <?php else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; wp_reset_query(); ?>
      </div>

      <?php if ( $has_sidebar ) get_sidebar( 'events' ); ?>
    </div>
  </div>
</section>

<?php get_footer();