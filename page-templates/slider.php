

<section class="slider" >	
				
			<?php
				$id_posts = get_option( 'page_for_posts');
				$id_author = get_the_author_meta( 'ID');
				//array con los post selectionados
				$posts_destacado = get_post_meta( $id_posts, 'slider_post', true );
				
				
			// recorremos el array
			foreach ( $posts_destacado as $post ) : setup_postdata( $post );
			
			
			?>	
						
				<div class="card my-3">
					<div class="row no-gutters ">
						
						<div class="col-12 col-lg-1 d-flex flex-md-column align-items-center justify-content-around">
						
							<div class="author__post d-flex flex-lg-column">
								<a
									href="<?php echo get_author_posts_url(get_the_author_meta('ID'),
									get_the_author_meta('user_nicename') ); ?>">
					
									<?php 
									echo get_avatar($id_author);
									?>
															
								</a>

								<p class="name__author pl-2" ><?php the_author_meta( 'nickname' );?>
								</p>	
							</div>
							
							<div class="fecha__publicacion mb-3 d-flex flex-lg-column align-items-center">
								<svg class="bi bi-calendar text-success" width="2.4em" height="2.4em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M16 2H4a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2zM3 5.857C3 5.384 3.448 5 4 5h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H4c-.552 0-1-.384-1-.857V5.857z" clip-rule="evenodd"/>
								<path fill-rule="evenodd" d="M8.5 9a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
								</svg>
								
								<p class= "dia__publicacion" >
								<?php the_time('d'); ?>
								</p>
								
								<p class= "mes__publicacion">
								<?php the_time('M'); ?>
								</p>

							</div>

							
							<div class="comments d-flex flex-lg-column align-items-center mb-3">
									<svg class="bi bi-chat text-primary" width="2.4em" height="2.4em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M8.207 13.293L7.5 14a5.5 5.5 0 110-11h5a5.5 5.5 0 110 11s-1.807 2.169-4.193 2.818C7.887 16.933 7.449 17 7 17c.291-.389.488-.74.617-1.052C8.149 14.649 7.5 14 7.5 14c.707-.707.708-.707.708-.706h.001l.002.003.004.004.01.01a1.184 1.184 0 01.074.084c.039.047.085.108.134.183.097.15.206.36.284.626.114.386.154.855.047 1.394.717-.313 1.37-.765 1.895-1.201a10.266 10.266 0 001.013-.969l.05-.056.01-.012m0 0A1 1 0 0112.5 13a4.5 4.5 0 100-9h-5a4.5 4.5 0 000 9 1 1 0 01.707.293" clip-rule="evenodd"/>
									</svg>
									<p class="number_comments"><?php echo get_comments_number($post);?>
									</p>
							</div>
							
							
						</div> <!--col-2-->
						
						<!-- imagen -->
						<?php if(has_post_thumbnail()):?>
						<div class="col-12 col-lg-5 ">
							<img src="<?php echo the_post_thumbnail_url('slider')?>" class="laz img_slider">
						</div>
						
						<!-- content -->
						<div class=" col-12 col-lg-6">
							<div class="card-body">
								<h1 class="card-title"> 
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h1>
									<p class="card-text"><?php the_excerpt(  );?>
									</p>
									
							</div>
						</div><!--col-12-->
						
						<?php else: ;?>
							
							<div class=" col-lg-11">
							<div class="card-body">
								<h1 class="card-title"> 
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h1>
									<p class="card-text"><?php the_excerpt(  )?>
									</p>
									
							</div>
						</div><!--col-12-->

						<?php endif;?>		
					
					</div><!--row-->
				</div><!--card-->
		
			<?php endforeach; 
			wp_reset_postdata();?>
		
	</section > <!--slider-->	