<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
/*
function lesfrancas_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer Right',
		'id'            => 'footer_right',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	   register_widget( 'Social_Link_Widget' );


}
add_action( 'widgets_init', 'lesfrancas_widgets_init' );

*/

/**
 * Adds Social_Link_Widget widget.
 */
class Social_Link_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'social_link', // Base ID
			esc_html__( 'Réseaux Sociaux', 'lesfrancas' ), // Name
			array( 'description' => esc_html__( 'Lien des réseaux sociaux', 'lesfrancas' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		/*if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}*/

		if ( ! empty( $instance['facebook'] ) ) {
			?>
				<a href="<?= apply_filters( 'widget_facebook', $instance['facebook'] ); ?>" target="blank">
					<img src="<?= get_stylesheet_directory_uri() . '/dist/img/Facebook-color.svg' ?>" alt="Facebook" class="socialsIcon">
				</a>
			<?php
		}
		if ( ! empty( $instance['twitter'] ) ) {
			?>
				<a href="<?= apply_filters( 'widget_twitter', $instance['twitter'] ); ?>" target="blank">
                    <img src="<?= get_stylesheet_directory_uri() . '/dist/img/Twitter-color.svg' ?>" alt="Twitter" class="socialsIcon">
                </a>
			<?php
		}

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : esc_html__( 'New facebook', 'lesfrancas' );
		$twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : esc_html__( 'New twitter', 'lesfrancas' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_attr_e( 'Facebook:', 'lesfrancas' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_attr_e( 'Twitter:', 'lesfrancas' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';

		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';

		return $instance;
	}

} // class Social_Link_Widget