<?php
/**
 * Featured Page Widget
 * @package Zurbox Lite
 */
add_action('widgets_init', create_function('', 'register_widget("Zurbox_Featured_Page");'));

add_action('admin_print_scripts-widgets.php', 'widget_featurepage_script');
add_action('admin_print_styles-widgets.php', 'widget_featurepage_style');

add_action( 'admin_enqueue_scripts', 'zurbox_enqueue_color_picker' );
function zurbox_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'zurbox-color-script', get_template_directory_uri() . '/inc/widgets/assets/zurbox-color-picker.js', array( 'wp-color-picker' ), false, true );
}

class Zurbox_Featured_Page extends WP_Widget {
    function __construct() {
	parent::__construct(
		'zurbox_featured_page',
		'Zurbox ' . esc_html__( 'Featured Page', 'zurbox-lite' ),
		array(
		'classname' => 'zurbox_featured_page',
		'description' => esc_html__( 'Display a featured page', 'zurbox-lite' )
		)
	);
}

    	function widget( $args, $instance ) {
		extract($args);
		$title = ( isset( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Featured Page', 'zurbox-lite' );
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : strip_tags( $instance['text'] ), $instance );
		$color_txt = ( isset( $instance['color_txt'] ) ) ? $instance['color_txt'] : '#000';
		$page_id = ( empty( $instance['page_id'] ) ? '0' : $instance['page_id'] );

		$featured_post_args = array(
			'post_type' => 'page',
			'page_id' => $page_id
		);
		$featured_post = new WP_Query( $featured_post_args );

?>

<?php
	if ( $featured_post->have_posts() ) : while ( $featured_post->have_posts() ) : $featured_post->the_post();
        		echo $before_widget;
        		echo '<div class="wide-panel">';
?>


		<div class="callout<?php if ( has_post_thumbnail() ) { ?> large<?php } ?>" style="color: <?php echo $color_txt; ?>;">

			<div class="box-content">

				<?php if ( $title ) { echo '<span>' . esc_html( $title ) . '</span>'; } ?>

				<h3><a href="<?php the_permalink(); ?>" style="color: <?php echo $color_txt; ?>;"><?php the_title(); ?></a></h3>

				<?php if ( has_excerpt() ) : ?>
					<?php the_excerpt(); ?>
				<?php endif; ?>

				<?php
					if ( $text ) {
						echo '<p>' . esc_html( $text ) . '</p>';
					}
				?>
			</div>

		<?php if ( has_post_thumbnail() ) { ?>
			<span class="box-overlay"></span>
		<?php } ?>
			<div class="box-inner"<?php if ( has_post_thumbnail() ) { ?> style="background:<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), '2800x950-crop' ); ?> url(<?php echo $thumbnail[0]; ?>) no-repeat; background-size: cover; background-position:50%;"<?php } ?>></div>

		</div>
<?php
	endwhile;
	endif;
		wp_reset_postdata();
?>
<?php
        echo '</div>';
        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	$instance['title'] = '' != $new_instance['title'] ? strip_tags( $new_instance['title'] ) : false;
	$instance['text'] = '' != $new_instance['text'] ? strip_tags( $new_instance['text'] ) : false;
	$instance['page_id'] = strip_tags( $new_instance['page_id'] );
	$instance['color_txt'] = esc_attr($new_instance['color_txt']);

        	return $instance;
    }

    function form( $instance ) {
	$instance = wp_parse_args( (array) $instance, array( 'title' => esc_html__( 'Featured Page', 'zurbox-lite' ), 'text' =>'', 'color_txt' => '#000', 'page_id' => '' ) );

	extract( $instance );

	$title = strip_tags( $instance['title'] );
	$text = strip_tags( $instance['text'] );
	$page_id = strip_tags( $instance['page_id'] );
	$color_txt = esc_attr($instance['color_txt']);
?>

		<p><?php esc_html_e( 'Show a featured page: shows the title and excerpt of the page over the background featured image.', 'zurbox-lite' ); ?></p>

		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e( 'Title', 'zurbox-lite' ); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e( 'Description', 'zurbox-lite' ); ?>:</label>
		<textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $text ); ?></textarea>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('page_id'); ?>"><?php esc_html_e( 'Page:', 'zurbox-lite' ); ?></label>
		<?php
		wp_dropdown_pages( array( 
			'depth'            => 0,
			'child_of'         => 0,
			'selected'         => $page_id,
			'echo'             => 1,
			'name'             => $this->get_field_name('page_id'),
			'id'               => $this->get_field_id('page_id')
				) );
		?>
		</p>

		<p><!-- text color picker -->
		<label for="<?php echo $this->get_field_id('color_txt'); ?>"><?php esc_html_e( 'Color Text:', 'zurbox-lite' ); ?></label><br />
	  	<input class="cw-color-picker" type="text" id="<?php echo $this->get_field_id('color_txt'); ?>" name="<?php echo $this->get_field_name('color_txt'); ?>" value="<?php if($color_txt) { echo $color_txt; } else { echo '#000'; } ?>" />
		</p>

<?php
    }
} 