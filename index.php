<?php get_header(); ?>

    <div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">
        <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>

          <div class="blog-post">
            <a href="<?php the_permalink(); ?>"><h2 class="blog-post-title"><?php the_title(); ?></h2></a>
            <?php if(has_post_thumbnail()) : ?>
            
            <div class="post-img">
            <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
            </a>
            </div>
            
            <?php endif; ?>

            <?php the_excerpt(); ?> <span><a href="<?php the_permalink(); ?>">Read more...</a></span>
          </div><!-- /.blog-post -->
          
          <?php endwhile; ?>
          <nav class="blog-pagination">
            <?php previous_posts_link( 'Newer posts' ); ?>
            <?php next_posts_link( 'Older posts' ); ?>
          </nav>
    <?php else : ?>
      <p><?php __('No Posts Found'); ?> </p>
    <?php endif; ?>

        </div><!-- /.blog-main -->



<?php get_footer(); ?>
