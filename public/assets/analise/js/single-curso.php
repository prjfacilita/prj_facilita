<?php get_header(); 

//theme settings
global $rd_data; 
$blog_sidebar = $rd_data['rd_blog_sidebar'];

$data = get_post_meta( $post->ID, 'wpcf-data-do-curso', true );	
$inscricao = get_post_meta( $post->ID, 'wpcf-data-da-inscricao', true );	
$local = get_post_meta( $post->ID, 'wpcf-local', true );	

?>

<?php if (have_posts()) the_post(); 

	function custom_field(){  
	
		echo '<div class="courses__single-sidebar">';
		echo '<h3>Informações</h3>';
		echo '<div classs="courses__single-field">';
		echo '<div class="date-course">';
		echo $data;
		echo '</div>';
		echo '</div>';

	}
	add_shortcode( 'custom_field', 'custom_field' ); ?> 
	

	<div class="page-content">
		<!--PAGE TITLE-->
		<div class="page-title">
			<div class="container">
				<h1><?php echo get_the_title();?></h1>	
			</div>	
		</div>
		<!--FIM PAGE TITLE-->		

		<div class="container">
			<!--POST-->
				<div class="post">
					<div class="content">
					<!--IMAGE DESTAQUE-->
						<?php		
							$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
							if($url):
								echo '<a href="'.$url. '" class="prettyPhoto">';
								echo "<div class='post-attachement'>";
								echo the_post_thumbnail('blog_tn');
								echo "</a></div>";
							endif;	
						?>
					<!--FIM IMAGEM DESTAQUE-->	
						<?php echo the_content(); ?>
						<?php 
							if(nt_check_fg_status() == true){
								echo nt_gallery(get_the_ID(), ''); 	
							}	
						?>  
				<!--SHARE -->		
					<div class="share_icons_container">
						<div class="shareicons_icon"></div>
						<div class="single_post_share_icon">
							<?php rd_share_panel(); ?>
						</div>
					</div>
				<!--FIM SHARE -->	
					
			<!--NAVIGATION -->		
					<div class="single_post_navigation">
						<?php $prev = get_permalink(get_adjacent_post(false,'',false)); 
							if ($prev != get_permalink()) { ?>
								<a href="<?php echo esc_url($prev); ?>" class="next_post">
									<?php echo __('Próximo'); ?> 
								</a>
						<?php } ?>
						<?php $next = get_permalink(get_adjacent_post(false,'',true)); 
						if ($next != get_permalink()) { ?>
							<a href="<?php echo esc_url($next); ?>" class="previous_post">
								<?php echo __('Anterior'); ?>
							</a>
						<?php } ?>
					</div>
				<!--FIM -->
				</div>
			<!--FIM POST -->
			</div>
		</div>
	</div>
<?php get_footer(); ?>

