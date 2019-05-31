<?php get_header(); ?>

    <div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">
        <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>

          <div class="blog-post">
            <h2 class="blog-post-title"><?php the_title(); ?></h2>
            <?php if(has_post_thumbnail()) : ?>
            
            <div class="post-img">
            
            <?php the_post_thumbnail(); ?>
            
            </div>
            
            <?php endif; ?>
						<p>
						<?php $currentID = get_the_ID(); ?>
						<?php $currentNumber = Get_Post_Number($currentID); ?>
						<?php echo $currentNumber; ?>
						</p>

           

			<div class="film-meta-wrapper">
			<p><strong>Regia</strong>:
				<?php the_field('regia'); ?>
			</p>
			<p><strong>Cast</strong>:
				<?php the_field('cast'); ?>
			</p>
			<p><strong>Anno</strong>:
				<?php the_field('anno'); ?>
			</p>
			<p><strong>Paese</strong>:
				<?php the_field('paese'); ?>
			</p>
			<p><strong>Durata</strong>:
				<?php the_field('durata'); ?>
      </p>
      <p><strong>Il voto di <?php bloginfo("name"); ?></strong>:
				<?php the_field('rating'); ?>
      </p>
			</div>

      <?php the_content(); ?>

      <p><strong>Premi:</strong>
				<?php the_field('premi'); ?>
      </p>

      <?php 
$linkc1 = get_field('link_compra_1');
$linkc2 = get_field('link_compra_2');
$linkc3 = get_field('link_compra_3');
$linkc4 = get_field('link_compra_4');
$links1 = get_field('link_streaming_1');
$links2 = get_field('link_streaming_2');
$links3 = get_field('link_streaming_3');
$links4 = get_field('link_streaming_4');

if( $linkc1 ): 
	$link_url = $linkc1['url'];
	$link_title = $linkc1['title'];
	?>
	<h4><strong><?php the_title(); ?> a noleggio:</strong></h4>
	<ul>
	<li><a href="<?php echo esc_url($link_url); ?>" target="_blank"><?php echo esc_html($link_title); ?></a></li>
<?php endif;
if( $linkc2 ): 
	$link_url = $linkc2['url'];
	$link_title = $linkc2['title'];
	?>
	<li><a href="<?php echo esc_url($link_url); ?>" target="_blank"><?php echo esc_html($link_title); ?></a></li>
<?php endif;
if( $linkc3 ): 
	$link_url = $linkc3['url'];
	$link_title = $linkc3['title'];
	?>
	<li><a href="<?php echo esc_url($link_url); ?>" target="_blank"><?php echo esc_html($link_title); ?></a></li>
<?php endif;
if( $linkc4 ): 
	$link_url = $linkc4['url'];
	$link_title = $linkc4['title'];
	?>
	<li><a href="<?php echo esc_url($link_url); ?>" target="_blank"><?php echo esc_html($link_title); ?></a></li>
<?php endif; ?>

</ul>
<?php
if( $links1 ): 
	$link_url = $links1['url'];
	$link_title = $links1['title'];
	?>
	<h4><strong><?php the_title(); ?> in streaming:</strong></h4>
	<ul>
	<li><a href="<?php echo esc_url($link_url); ?>" target="_blank"><?php echo esc_html($link_title); ?></a></li>
<?php endif;
if( $links2 ): 
	$link_url = $links2['url'];
	$link_title = $links2['title'];
	?>
	<li><a href="<?php echo esc_url($link_url); ?>" target="_blank"><?php echo esc_html($link_title); ?></a></li>
<?php endif;
if( $links3 ): 
	$link_url = $links3['url'];
	$link_title = $links3['title'];
	?>
	<li><a href="<?php echo esc_url($link_url); ?>" target="_blank"><?php echo esc_html($link_title); ?></a></li>
<?php endif;
if( $links4 ): 
	$link_url = $links4['url'];
	$link_title = $links4['title'];
	?>
	<li><a href="<?php echo esc_url($link_url); ?>" target="_blank"><?php echo esc_html($link_title); ?></a></li>
<?php endif; ?>
</ul>
            
            <?php comments_template(); ?>
            

          </div><!-- /.blog-post -->

          <?php endwhile; ?>
    <?php else : ?>
      <p><?php __('No Posts Found'); ?> </p>
    <?php endif; ?>

        </div><!-- /.blog-main -->

<?php get_footer(); ?>
