<?php
/**
 * Template part for displaying archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Ridge_Bali
 */

?>
	<?php
	// Get the post title and truncate it to 122 characters
	$title = get_truncated_title(10);
    // Get the post description and truncate it to 122 characters
    $description = get_truncated_description(20);
    // Get the first category for the current post
	$categories = get_the_category($post->ID);           
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-post-grid' );
    $thumbnail_url = $thumbnail[0];
	?>

	<div id="post-<?php the_ID(); ?>" class="col-lg-4 col-md-12 mb-3 d-flex align-items-stretch">
        <div class="card rounded-0 border-0 overflow-hidden">
            <div class="image position-relative overflow-hidden">
            	<a class="" href="<?php echo get_the_permalink(); ?>">
            	<img src="<?php echo esc_url( $thumbnail_url ); ?>" class="img-fluid shadow object-fit-cover" alt="<?php echo esc_html( $title); ?>" style="display: block; height: 100%; width: 100%;">
            	</a>
            </div>

            <div class="card-body px-0 content d-flex flex-column">	

            	<div class="blog-category mb-2">                        	
                <?php 
                	if (!empty($categories)) {
		                $category = $categories[0];
						$category_id = get_cat_ID( $category->name );
		                ?>
		                <h5 class="mt-3">
		                	<a class="blog-category" href="#">
		                			<?php echo $category->name; ?>
		                		</a>
		                </h5>
		            <?php
		            }
                ?>
            	</div>

                <div class="blog-title mb-2">
                    <h3 class="blog-title">
                    	<a class="blog-title" href="<?php echo get_the_permalink(); ?>"><?php echo $title; ?></a>
                    </h3>
            	</div>
            	<div class="blog-description mt-auto align-self-start">
                	<p class="blog-description para-desc mx-auto mb-0"><?php echo $description; ?>
                </p>
            	</div>              
            </div>
        </div>
    </div><!--end col-->
