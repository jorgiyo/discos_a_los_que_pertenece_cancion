<?php
/*
Plugin Name: Discos que contienen una canción
Plugin URI: 
Description: 
Version: 
Author: 
Author URI: 
License: 
License URI: 
*/

function lista_discos_cancion(){


$discos = get_posts(array(
							'post_type' => 'discos',
							'meta_query' => array(
								array(
									'key' => 'kanziones', // name of custom field
									'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
									'compare' => 'LIKE'
								)
							)
						));

?>
						<?php if( $discos ): ?>
							<ul>
							<?php foreach( $discos as $disco ): ?>
								<?php 

								//$photo = get_field('photo', $disco->ID);

								?>
								<li>
									<a href="<?php echo get_permalink( $disco->ID ); ?>">
										//<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" width="30" />
										<?php echo get_the_title( $disco->ID ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<?php endif; 

	}

add_shortcode ('cancion_en_discos','lista_discos_cancion');
?>