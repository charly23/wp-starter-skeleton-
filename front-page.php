<?php 
    get_header(); 
?>
<div class="main-content">
	<div id="sub-page" class="main-sub-page clearfix">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <!--
		<div class="page-title-wrap">
            <h1 class="page-title-entry"><?php the_title(); ?></h1>
        </div> -->
		
		<div class="front-main">
			<div class="row">
            
                <!--
				<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">Content</div>
				<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">Sidebar</div>
                -->
			</div>
		</div>
        
		
        <?php the_content(); ?>
	<?php endwhile; else: ?>

	<?php endif; ?>
	</div>

</div>

<?php get_footer(); ?>