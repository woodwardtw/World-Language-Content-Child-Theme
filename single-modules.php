<?php
/**
 * The Template for displaying scene single posts.
 *
 * 
 */

get_header(); ?>
</div>
	
	<div id="module-content" class="clearfix row">
	<div class="container-fluid">
                <div class="row">
			
				<div id="main" class="col-sm-12 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
													
							<div class="page-header module-header" style="background-image:url(<?php the_field('intro_img'); ?>)"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>
							
							<!--<p class="meta"><?php _e("Posted", "wpbootstrap"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php echo get_the_date('F jS, Y', '','', FALSE); ?></time></p>-->
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix module-content" itemprop="articleBody">
							<button data-toggle="collapse" data-target="#outcomes">Outcomes</button>
							<div id="outcomes" class="collapse outcomes">
								<?php the_field('outcome'); ?>
							</div>
							
							<div class="prt1 prt">
								<h2>Début</h2>								
								<?php the_field('prt1'); ?>
							</div>	
							<div class="prt2 prt">	
								<h2>Échafaudage auditif</h2>						
								<?php the_field('prt2'); ?>
							</div>
							<div class="prt3 prt">	
								<h2>Échafaudage grammatical</h2>							
								<?php the_field('prt3'); ?>
							</div>
							<div class="prt4 prt">		
								<h2>Activity</h2>						
								<?php the_field('prt4'); ?>
							</div>
							<div class="prt5 prt">	
								<h2>DERNIÈRE T CHE</h2>							
								<?php the_field('prt5'); ?>
							</div>

							<?php wp_link_pages(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","wpbootstrap") . ':</span> ', ' ', '</p>'); ?>
							
							<?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","wpbootstrap"); ?></a>
							<?php } ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php comments_template('',true); ?>
					
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
			<!--	<?php get_sidebar(); // sidebar 1 ?> -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>