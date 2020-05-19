
<?php 
/**
 * Adds Youtube_Subscription widget.
 */
class Youtube_Subscription_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'youtubesubscritpion_widget', // Base ID
			esc_html__( 'Youtube Subscription', 'youtubesubscription_domain' ), // Name
			array( 'description' => esc_html__( 'Widget for display YouTube subscription', 'youtubesubscription_domain' ), ) // Args
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
		echo $args['before_widget'];//Want to display anything before widget
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		//Widget actual content output
		echo '<div class="g-ytsubscribe" data-channel="'.$instance['channel'].'" data-layout="'.$instance['layout'].'" data-count="'.$instance['count'].'"></div>';
		echo $args['after_widget'];//Want to display anything before widget
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'YouTube Subscription', 'youtubesubscription' );

		$channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'mychannel', 'youtubesubscription' );
		$layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'default', 'youtubesubscription' );
		


		?>
		<!--Title-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_attr_e( 'Title:', 'youtubesubscription' ); ?>
					
			</label> 

			<input 
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
			type="text" 
			value="<?php echo esc_attr( $title ); ?>">
		</p>

		<!--Channel-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
				<?php esc_attr_e( 'Channel:', 'youtubesubscription' ); ?>
					
			</label> 

			<input 
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
			type="text" 
			value="<?php echo esc_attr( $channel ); ?>">
		</p>

		<!--Layout-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
				<?php esc_attr_e( 'Layout:', 'youtubesubscription' ); ?>
					
			</label> 

			<select
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" 
			>
			<option value="default" <?php echo ($layout=='default')? 'selected':'';?>>Default</option>
			<option value="full" <?php echo ($layout=='full')? 'selected':'';?>>Full</option>
		</select>
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? sanitize_text_field( $new_instance['channel'] ) : '';
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';
		
		return $instance;
	}

} // class Youtube_Subscription_Widget