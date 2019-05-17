<div class="d-none d-sm-block col-sm-3 offset-sm-1 blog-sidebar">
<?php if(is_active_sidebar('sidebar')): ?>
            <?php dynamic_sidebar('sidebar'); ?>
          <?php endif; ?>
</div>
          </div><!-- /.row -->    
        </div><!-- /.container -->


<footer class="blog-footer">
      <p>&copy <?php echo Date("Y"); ?> - <a href="/"><?php bloginfo("name"); ?></a> | <a href="#">Privacy</a> | <a href="#">Terms</a></p>
    </footer>

    <?php wp_footer(); ?>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>
  </body>
</html>