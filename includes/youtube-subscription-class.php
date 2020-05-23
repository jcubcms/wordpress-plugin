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
		//When the dark theme is chosen 
       
        $theme_name=$instance['theme'];
        if($theme_name=='dark'){
        	echo "<div  class='dark-theme'>";
        	echo 
		' 
			<div 
			class="g-ytsubscribe" 
			data-channelid="'.$instance['channel_id'].'" 
			data-layout="'.$instance['layout'].'"
			data-theme="'.$instance['theme'].'" 
			data-count="'.$instance['count'].'"
			>
			</div>
		';
        	echo '</div>';
        }
        //when the default theme is chosen
        else{

		echo 
		' 
			<div 
			class="g-ytsubscribe" 
			data-channelid="'.$instance['channel_id'].'" 
			data-layout="'.$instance['layout'].'"
			data-theme="'.$instance['theme'].'" 
			data-count="'.$instance['count'].'"
			>
			</div>
		';
	}
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
		$channel_id = ! empty( $instance['channel_id'] ) ? $instance['channel_id'] : esc_html__( 'UCuWW2AYNVJjlmtMboHwdJNQ', 'youtubesubscription' );
		$layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'default', 'youtubesubscription' );
		$count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( 'default', 'youtubesubscription' );
		$theme = ! empty( $instance['theme'] ) ? $instance['theme'] : esc_html__( 'deault', 'youtubesubscription' );
		

		?>
		<!--Title Section-->
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

		<!--Channel Id Section--> 
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'channel_id' ) ); ?>">
				<?php esc_attr_e( 'YouTubeChannel ID:', 'youtubesubscription' ); ?>
					
			</label> 

			<input 
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'channel_id' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'channel_id' ) ); ?>" 
			type="text" 
			value="<?php echo esc_attr( $channel_id ); ?>">
		</p>

		<!--Layout Section-->
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
          
          <!--Subscriber Count Section-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">
				<?php esc_attr_e( 'Count:', 'youtubesubscription' ); ?>
					
			</label> 

			<select
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" 
			>
			<option value="default" <?php echo ($count=='default')? 'selected':'';?>>Default</option>
			<option value="hidden" <?php echo ($count=='hidden')? 'selected':'';?>>Hidden</option>
		</select>
		</p>

          <!--Theme Section-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'theme' ) ); ?>">
				<?php esc_attr_e( 'Theme:', 'youtubesubscription' ); ?>
					
			</label> 

			<select
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'theme' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'theme' ) ); ?>" 
			>
			<option value="default" <?php echo ($theme=='default')? 'selected':'';?>>Default</option>
			<option value="dark" <?php echo ($theme=='dark')? 'selected':'';?>>Dark</option>
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
		$instance['channel_id'] = ( ! empty( $new_instance['channel_id'] ) ) ? sanitize_text_field( $new_instance['channel_id'] ) : '';
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? sanitize_text_field( $new_instance['count'] ) : '';
		$instance['theme'] = ( ! empty( $new_instance['theme'] ) ) ? sanitize_text_field( $new_instance['theme'] ) : '';
		
		return $instance;
	}

} // class Youtube_Subscription_Widget