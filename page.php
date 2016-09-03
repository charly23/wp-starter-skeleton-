<?php 
    get_header(); 
?>
<div class="main-content">
	<div id="sub-page" class="main-sub-page clearfix">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="page-title-wrap">
            <h1 class="page-title-entry"><?php the_title(); ?></h1>
        </div>
        
		<div class="sub-main-page">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content-entry">
        				<?php	
        					if ( has_post_thumbnail() ) { 
        				?>	  
        					
        					<div class="page-featured-image">
        					   <?php echo get_the_post_thumbnail(get_the_ID(),'page-featured-image' , array('alt' => the_title_attribute('echo=0'),'title' =>the_title_attribute('echo=0'))); ?>
        					</div>  
        					
        				<?php	
        					} 
        				?>
                        <div class="page-content"><?php the_content(); ?></div>
        			</div>
            
                </div>
				<!--<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12"><?php get_sidebar(); ?></div>-->
			</div>
		</div>
		
	<?php endwhile; else: ?>

	<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>