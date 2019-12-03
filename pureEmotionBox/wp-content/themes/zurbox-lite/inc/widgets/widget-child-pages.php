<?php
/**
 * The custom widget for displaying child pages columns
 * @package Zurbox Lite
 */
add_action('widgets_init', create_function('', 'register_widget("Zurbox_Child_Pages");'));

class Zurbox_Child_Pages extends WP_Widget {
	function __construct() {
		parent::__construct(
			'child_pages',
			'Zurbox ' . esc_html__( 'Child Pages', 'zurbox-lite' ),
			array(
				'classname' => 'child_pages', 
				'description' => esc_html__( 'Displaying child pages in 1, 2, 3, 4 columns.', 'zurbox-lite' ),
			)
		);
 	}

 	function form( $instance ) {
		$zurbox_defaults[ 'title_section' ] = '';
 		$zurbox_defaults[ 'text_main' ] = '';
		$zurbox_defaults[ 'cols_num' ] = '4';
 		$instance = wp_parse_args( (array) $instance, $zurbox_defaults );
		$title_section = esc_attr( $instance[ 'title_section' ] );
		$text_main = esc_textarea( $instance[ 'text_main' ] );
		$cols_num = esc_attr( $instance[ 'cols_num' ] );
		?>

		<p><?php esc_html_e( 'The widget for displaying child pages in columns.', 'zurbox-lite' ); ?></p>

		<p>
		<label for="<?php echo $this->get_field_id('title_section'); ?>"><?php esc_html_e( 'Title:','zurbox-lite' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title_section'); ?>" name="<?php echo $this->get_field_name('title_section'); ?>" type="text" value="<?php echo esc_attr($title_section); ?>" />
		</p>


		<p>
		<label for="<?php echo $this->get_field_id('text_main'); ?>"><?php esc_html_e( 'Intro Text:','zurbox-lite' ); ?></label>
		<textarea class="widefat" rows="3" cols="20" id="<?php echo $this->get_field_id('text_main'); ?>" name="<?php echo $this->get_field_name('text_main'); ?>"><?php echo $text_main; ?></textarea>
		</p>


		<p>
		<label for="<?php echo $this->get_field_id('cols_num'); ?>"><?php esc_html_e( 'Number of columns:', 'zurbox-lite' ); ?></label>
		<select name="<?php echo $this->get_field_name('cols_num'); ?>" id="<?php echo $this->get_field_id('cols_num'); ?>" class="widefat">
		<?php
		$options = array(
			'1' => esc_html__( 'One', 'zurbox-lite' ),
			'2' => esc_html__( 'Two', 'zurbox-lite' ),
			'3' => esc_html__( 'Three', 'zurbox-lite' ),
			'4' => esc_html__( 'Four', 'zurbox-lite' ),
		);
		foreach ( $options as $value => $key ) {
			echo '<option value="' . $value . '" ' . selected( $cols_num, $value, false ) . '>' . $key . '</option>';
		}
		?>
		</select>
		</p>

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		if ( current_user_can('unfiltered_html') )
			$instance['text_main'] =  $new_instance['text_main'];
		else
			$instance['text_main'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text_main']) ) );

		$instance[ 'title_section' ] = esc_attr( $new_instance[ 'title_section' ] );
		$instance[ 'cols_num' ] = strip_tags( $new_instance[ 'cols_num' ] );

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

 		global $post;
 		$text_main = empty( $instance['text_main'] ) ? '' : $instance['text_main'];
 		$title_section = empty( $instance['title_section'] ) ? '' : $instance['title_section'];
 		$cols_num = isset( $instance[ 'cols_num' ] ) ? $instance[ 'cols_num' ] : ''; 
		echo $before_widget;
		?>

<?php
		$excerpt_length = 19;
		$child_pages = new WP_Query( array(
			'post_type'      => 'page',
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_parent'    => $post->ID,
			'posts_per_page' => 9,
			'no_found_rows'  => true,
		) );
?>

<?php if ( $child_pages->have_posts() ) : ?>

<div class="row column text-center">
	<?php if( !empty( $title_section ) ) { ?>
               		<h2><?php echo esc_attr( $title_section ); ?></h2>
	<?php } ?>
	<?php if( !empty( $text_main ) ) { ?>
               		<p><?php echo esc_html( $text_main ); ?></p>
	<?php } ?>
</div>

<?php if ( $cols_num > 1 ) { $cols_medium = 2; } else { $cols_medium = 1; } ?>

	<div class="row small-up-1 medium-up-<?php echo $cols_medium; ?> large-up-<?php echo $cols_num; ?>">

		<?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>

		<div class="column">
			<div class="callout box">
				<?php the_post_thumbnail( 'zurbox-entry' ); ?>
				<?php the_title( '<h3 class="lead"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
				<p><?php the_excerpt(); ?></p>
			</div>
		</div>

		<?php endwhile; ?>

	</div><!-- .row -->

	<?php
		endif;
		wp_reset_postdata();
	?>

	<?php 
		echo $after_widget;
 	}
 }