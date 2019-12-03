<?php
/**
 * The custom widget for displaying recent posts
 * @package Zurbox Lite
 */
add_action('widgets_init', create_function('', 'register_widget("Zurbox_Recent_Posts");'));

class Zurbox_Recent_Posts extends WP_Widget {
	function __construct() {
		parent::__construct(
			'recent_posts_columns',
			'Zurbox ' . esc_html__( 'Posts Columns', 'zurbox-lite' ),
			array(
				'classname' => 'recent_posts_columns', 
				'description' => esc_html__( 'Recent posts in 1, 2, 3, 4 columns, with the category selection.', 'zurbox-lite' ),
			)
		);
 	}

 	function form( $instance ) {
		$zurbox_defaults[ 'title_section' ] = esc_html__( 'Recent Posts', 'zurbox-lite' );
 		$zurbox_defaults[ 'text_main' ] = esc_html__( 'The widget for displaying recent posts of the selected category in columns.', 'zurbox-lite' );
		$zurbox_defaults[ 'category' ] = '';
 		$zurbox_defaults[ 'button_text' ] = '';
		$zurbox_defaults[ 'limit_num' ] = '4';
		$zurbox_defaults[ 'cols_num' ] = '4';
 		$zurbox_defaults[ 'button_url' ] = '';
 		$instance = wp_parse_args( (array) $instance, $zurbox_defaults );
		$title_section = esc_attr( $instance[ 'title_section' ] );
		$text_main = esc_textarea( $instance[ 'text_main' ] );
                                $category = esc_attr( $instance['category'] );
		$button_text = esc_attr( $instance[ 'button_text' ] );
		$limit_num = esc_attr( $instance[ 'limit_num' ] );
		$cols_num = esc_attr( $instance[ 'cols_num' ] );
		$button_url = esc_url( $instance[ 'button_url' ] );
		$hide_date = isset( $instance['hide_date'] ) ? (bool) $instance['hide_date'] : false;
		$hide_excerpt = isset( $instance['hide_excerpt'] ) ? (bool) $instance['hide_excerpt'] : false;
		?>

		<p><?php esc_html_e( 'The widget for displaying recent posts of the selected category in columns.', 'zurbox-lite' ); ?></p>

		<p>
		<label for="<?php echo $this->get_field_id('title_section'); ?>"><?php esc_html_e( 'Title:','zurbox-lite' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title_section'); ?>" name="<?php echo $this->get_field_name('title_section'); ?>" type="text" value="<?php echo esc_attr($title_section); ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('text_main'); ?>"><?php esc_html_e( 'Intro Text:','zurbox-lite' ); ?></label>
		<textarea class="widefat" rows="3" cols="20" id="<?php echo $this->get_field_id('text_main'); ?>" name="<?php echo $this->get_field_name('text_main'); ?>"><?php echo $text_main; ?></textarea>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('category'); ?>"><?php esc_html_e( 'Category:', 'zurbox-lite' ); ?></label>
		<select id="<?php echo $this->get_field_id('category'); ?>"
			name="<?php echo $this->get_field_name('category'); ?>">
			<?php
			echo '<option value="0" ' .('0' == $category ? 'selected="selected"' : ''). '>'. esc_html__('All categories', 'zurbox-lite').'</option>';
			$cats = get_categories( array( 'hide_empty' => 0, 'taxonomy' => 'category', 'hierarchical' => 1 ) );
			foreach($cats as $cat) {
				echo '<option value="' . $cat->term_id . '" ' .($cat->term_id == $category ? 'selected="selected"' : ''). '>' . $cat->name . '</option>';
			} ?>
		</select>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('limit_num'); ?>"><?php esc_html_e( 'Number of posts to show:', 'zurbox-lite' ); ?></label>
		<input id="<?php echo $this->get_field_id('limit_num'); ?>" name="<?php echo $this->get_field_name('limit_num'); ?>" type="text" value="<?php echo $limit_num; ?>" />
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

		<p><input id="<?php echo $this->get_field_id('hide_excerpt'); ?>" name="<?php echo $this->get_field_name('hide_excerpt'); ?>" type="checkbox" <?php checked( isset( $hide_excerpt ) ? $hide_excerpt : 0 ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('hide_excerpt'); ?>"><?php esc_html_e( 'Hidden post Excerpt.', 'zurbox-lite' ); ?></label>
		</p>

		<p><input id="<?php echo $this->get_field_id('hide_date'); ?>" name="<?php echo $this->get_field_name('hide_date'); ?>" type="checkbox" <?php checked( isset( $hide_date ) ? $hide_date : 0 ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('hide_date'); ?>"><?php esc_html_e( 'Hidden post Date.', 'zurbox-lite' ); ?></label>
		</p>

		<p><i><?php esc_html_e( 'If you want to place the button of that section - enter the Buttons Text and Link.', 'zurbox-lite' ); ?></i></p>

		<p>
		<label for="<?php echo $this->get_field_id('button_text'); ?>"><?php esc_html_e( 'Button Text:', 'zurbox-lite' ); ?></label>
		<input id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo $button_text; ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('button_url'); ?>"><?php esc_html_e( 'Button Link:', 'zurbox-lite' ); ?></label>
		<input id="<?php echo $this->get_field_id('button_url'); ?>" name="<?php echo $this->get_field_name('button_url'); ?>" type="text" value="<?php echo $button_url; ?>" />
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
		$instance[ 'category' ] = esc_attr( $new_instance[ 'category' ] );
		$instance[ 'limit_num' ] = strip_tags( $new_instance[ 'limit_num' ] );
		$instance[ 'cols_num' ] = strip_tags( $new_instance[ 'cols_num' ] );
		$instance[ 'button_text' ] = strip_tags( $new_instance[ 'button_text' ] );
		$instance[ 'button_url' ] = esc_url_raw( $new_instance[ 'button_url' ] );
		$instance['hide_date'] = (bool) $new_instance['hide_date'];
		$instance['hide_excerpt'] = (bool) $new_instance['hide_excerpt'];

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

 		global $post;
 		$text_main = empty( $instance['text_main'] ) ? '' : $instance['text_main'];
		$category = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
 		$title_section = empty( $instance['title_section'] ) ? '' : $instance['title_section'];
 		$limit_num = isset( $instance[ 'limit_num' ] ) ? $instance[ 'limit_num' ] : ''; 
 		$cols_num = isset( $instance[ 'cols_num' ] ) ? $instance[ 'cols_num' ] : ''; 
 		$button_text = isset( $instance[ 'button_text' ] ) ? $instance[ 'button_text' ] : ''; 		
 		$button_url = isset( $instance[ 'button_url' ] ) ? $instance[ 'button_url' ] : '#';
		$hide_date = isset( $instance['hide_date'] ) ? $instance['hide_date'] : false;
		$hide_excerpt = isset( $instance['hide_excerpt'] ) ? $instance['hide_excerpt'] : false;

		echo $before_widget;
		?>


<div class="row">
<div class="small-12 large-10 columns<?php if( empty( $button_url ) ) { ?> text-center small-centered<?php } ?>">
	<?php if( !empty( $title_section ) ) { ?>
               		<h2><?php echo esc_attr( $title_section ); ?></h2>
	<?php } ?>
	<?php if( !empty( $text_main ) ) { ?>
               		<p><?php echo esc_html( $text_main ); ?></p>
	<?php } ?>
</div>
	<?php if( !empty( $button_url ) ) { ?>
<div class="small-12 large-2 columns large-text-right">
	<a href="<?php echo esc_url( $button_url ); ?>" class="button"><?php echo esc_html( $button_text ); ?></a>
</div>
	<?php } ?>
</div>

<?php
$args = array(
	'posts_per_page' => $limit_num,
	'cat' => $category,
	'post__not_in' => get_option('sticky_posts'),
	'post_status' => 'publish'
);
	$q = new WP_Query( $args );

	if( $q->have_posts() ):
?>

<?php if ( $cols_num > 1 ) { $cols_medium = 2; } else { $cols_medium = 1; } ?>

	<div class="row small-up-1 medium-up-<?php echo $cols_medium; ?> large-up-<?php echo $cols_num; ?>">
<?php
	$excerpt_length = 16;
	while( $q->have_posts() ): $q->the_post();
?>
		<div class="column">
			<div class="callout box">
				<?php the_post_thumbnail( 'zurbox-entry' ); ?>
				<?php the_title( '<h3 class="lead"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
			<?php if ( ! $hide_excerpt ) { ?>
				<p><?php the_excerpt(); ?></p>
			<?php } ?>
				<?php if ( ! $hide_date ) { zurbox_post_date(); } ?>
			</div>
		</div>
<?php
	endwhile;
?>

	</div><!-- .row -->

<?php
	endif;
	wp_reset_postdata();
?>
		<?php 
		echo $after_widget;
 	}
 }