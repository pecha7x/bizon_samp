<?php get_header(); ?>


<div class="row">

<div class="span8">

<?php if(have_posts() ) : ?>
<?php while(have_posts() ) : the_post(); ?>

<h1> <?php the_title(); ?>  </h1>
<p>Теги:
       <?php the_tags(' ', ', ', ' ' ); ?>  
    |  <i class="icon-user"></i>  <?php the_author_link(); ?>    </a>
   |   <i class="icon-calendar"></i> <?php the_time('d.m.Y'); ?>
   |   <i class="icon-comment"></i>       <?php comments_number(); ?>  
        </p>
<p><?php the_content(' '); ?></p>


<?php endwhile; ?>
<?php endif; ?>
<?php comments_template();  ?> 

</div>
<div class="span4">
<?php get_sidebar(); ?>
</div>

</div>

<?php get_footer(); ?>