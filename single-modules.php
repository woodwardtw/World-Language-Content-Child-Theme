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
									<?php 
									if( current_user_can('editor') || current_user_can('administrator') ) {
										$url = htmlentities(get_permalink($post->ID));
										echo '<button id="copy-embed" class="outcomes">Copy Embed Code</button><input onClick="this.select();" type="text" name="iframe-embed" id="iframe-code" data-url="' . $url . '">';							
									}
									?>
									<button data-toggle="collapse" data-target="#outcomes">Outcomes</button>
									<div id="outcomes" class="collapse outcomes">
										<?php the_field('outcome'); ?>
									</div>
									
									<?php if( get_field('prt1') ): ?>
										<div class="prt1 prt">
											<h2><?php 
											$field_id = get_field_object('prt1')['key'];
											$field = get_field_object($field_id)['label'];
											echo $field; ?>	
											</h2>	
											<div class="field-content">															
											<?php the_field('prt1'); ?>
											</div>
										</div>	
									<?php endif; ?>

									<?php if( get_field('prt2') ): ?>
										<div class="prt2 prt">	
											<h2>
												<?php 
											$field_id = get_field_object('prt2')['key'];
											$field = get_field_object($field_id)['label'];
											echo $field; ?>	

											</h2>
											<div class="field-content">						
												<?php the_field('prt2'); ?>
											</div>	
										</div>
									<?php endif; ?>
									<?php if( get_field('prt3') ): ?>
										<div class="prt3 prt">	
											<h2>
												<?php 
											$field_id = get_field_object('prt3')['key'];
											$field = get_field_object($field_id)['label'];
											echo $field; ?>	
											</h2>	
											<div class="field-content">	
												<?php the_field('prt3'); ?>
											</div>	
										</div>
									<?php endif; ?>
									<?php if( get_field('prt4') ): ?>
										<div class="prt4 prt">	
											<h2>
												<?php 
											$field_id = get_field_object('prt4')['key'];
											$field = get_field_object($field_id)['label'];
											echo $field; ?>	
											</h2>	
											<div class="field-content">			
												<?php the_field('prt4'); ?>
											</div>	
										</div>
									<?php endif; ?>
									<?php if( get_field('prt5') ): ?>
										<div class="prt5 prt">	
											<h2>
												<?php 
											$field_id = get_field_object('prt5')['key'];
											$field = get_field_object($field_id)['label'];
											echo $field; ?>	
											</h2>		
											<div class="field-content">													
												<?php the_field('prt5'); ?>
											</div>	
										</div>
									<?php endif; ?>
									<?php if( get_field('prt6') ): ?>
										<div class="prt6 prt">	
											<h2>
												<?php 
											$field_id = get_field_object('prt6')['key'];
											$field = get_field_object($field_id)['label'];
											echo $field; ?>	
											</h2>		
											<div class="field-content">													
												<?php the_field('prt6'); ?>
											</div>	
										</div>
									<?php endif; ?>
									<?php if( get_field('prt7') ): ?>
										<div class="prt7 prt">	
											<h2>
												<?php 
											$field_id = get_field_object('prt7')['key'];
											$field = get_field_object($field_id)['label'];
											echo $field; ?>	
											</h2>		
											<div class="field-content">													
												<?php the_field('prt7'); ?>
											</div>	
										</div>	
									</div>
								<?php endif; ?>
								<?php wp_link_pages(); ?>
								<div class="lessons-list field-content">		
									<ul>
									 	<?php 
									 	$lessonTitle ='<h3>Lessons</h3>';
										$children = wp_list_pages('title_li='.$lessonTitle.'&child_of='.get_the_ID().'&post_type=modules&echo=0'); 
										 if ( $children) : ?>									   
										        <?php echo $children; ?>
									<?php endif; ?>

								 	</ul>
							
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


			<script>
			jQuery(function () {
       var player = jQuery('iframe');
       var url = window.location.protocol + player.attr('src').split('?')[0];
       var status = jQuery('.status');
         jQuery( ".fadeOver" ).hide();
       // Listen for messages from the player
       if (window.addEventListener) {
           window.addEventListener('message', onMessageReceived, false);
       }
       else {
           window.attachEvent('onmessage', onMessageReceived, false);
       }

       // Handle messages received from the player
       function onMessageReceived(e) {
           var data = JSON.parse(e.data);

           switch (data.event) {
               case 'ready':
                   onReady();
                   break;

               case 'playProgress':
                   onPlayProgress(data.data);
                   break;

               case 'pause':
                   onPause();
                   break;

               case 'finish':
                   onFinish();
                   break;
           }
       }

       // Call the API when a button is pressed
       jQuery('button').on('click', function () {
           post(jQuery(this).text().toLowerCase());
       });

       // Helper function for sending a message to the player
       function post(action, value) {
           var data = {
               method: action
           };

           if (value) {
               data.value = value;
           }

           var message = JSON.stringify(data);
           player[0].contentWindow.postMessage(data, url);
       }

       function onReady() {
           status.text('ready');

           post('addEventListener', 'pause');
           post('addEventListener', 'finish');
           post('addEventListener', 'playProgress');
       }

       function onFinish() {
           jQuery(".fadeOver").fadeIn("slow");
       }

       function onPlayProgress(data) {
           status.text(data.seconds + 's played');
       }
   });

 jQuery( ".fadeOver" ).click (function(){

    jQuery( "iframe" )[0].src= '//player.vimeo.com/video/119551148';
    requestFullscreen(jQuery( "iframe" )[0]);

});

function requestFullscreen(el){
    if (el.requestFullscreen) {
            el.requestFullscreen();
        } else if (el.msRequestFullscreen) {
            el.msRequestFullscreen();
        } else if (el.mozRequestFullScreen) {
            el.mozRequestFullScreen();
        } else if (el.webkitRequestFullscreen) {
            el.webkitRequestFullscreen();
        }
    }
			</script>

<?php get_footer(); ?>