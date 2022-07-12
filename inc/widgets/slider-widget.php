<?php

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'…';
      } else {
        $excerpt = implode(" ",$excerpt);
      }
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

class bfd_slider extends WP_Widget {
    function __construct( $widget_options = array() ) {
        parent::__construct(
            'slider',
            'BFD Slider',
			$this->widget_options = wp_parse_args( $widget_options, array(
				'classname' => 'slider-widget bfd-slider',
				'description' => 'Use a slider to display recent or featured posts anywhere on your blog.',
			))
        );
        add_action( 'widgets_init', function() {
            register_widget( 'bfd_slider' );
        });
    }

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		/* if ( ! empty( $instance['slide_subtitle'] ) ) {
			echo '<div class="widget-subtitle">' . $instance['slide_subtitle'] . '</div>';
        }
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . $instance['title'] . $args['after_title'];
        }
		if ( ! empty( $instance['slide_text'] ) ) {
			echo '<div class="widget-text"><p>' . $instance['slide_text'] . '</p></div>';
        } */

		$slide_post_ids = $instance['slide_ids'];
		$slide_post_ids_array = explode(',', $slide_post_ids);
		if ( $instance['slide_ids'] == null ) {
			$query_args  = [
				'post_type'       => 'post',
				'posts_per_page'  => $instance['slide_count'],
				'offset'          => $instance['slide_offset'],
				'cat' => $instance['slide_category'],
				'post__in'        => array(),
				'post_status'     => 'publish',
				'ignore_sticky_posts' => 1,
				'orderby'         => 'post_date',
				'order'           => 'DESC',
			];
		} else {
			$query_args  = [
				'post_type'       => 'post',
				'posts_per_page'  => $instance['slide_count'],
				'offset'          => $instance['slide_offset'],
				'cat' => $instance['slide_category'],
				'post__in'        => $slide_post_ids_array,
				'post_status'     => 'publish',
				'ignore_sticky_posts' => 1,
				'orderby'         => 'ID',
				'order'           => 'DESC',
			];
		}
		$query_slider = new WP_Query( $query_args );
		if ( $query_slider->have_posts() ) {
			echo '<div class="slider-wrapper ';
			echo $instance['slider_style'];
      echo '">';
      if ( $instance['slider_nav'] == 'has-arrows-nav' || $instance['slider_nav'] == 'has-arrows-dots-nav' ) {
			echo '<div class="prev-slide"><i class="fa fa-angle-left"></i></div>';
    }
			echo '<ul class="slider-outer ';
			echo $instance['slides_count'];
			if ( 'yes' == $instance['disable_autoplay'] ) {
				echo ' autoplay-disabled';
			}
			echo ' ';
			echo $instance['slider_nav'];
			echo '">';
			while ( $query_slider->have_posts() ) {
				$query_slider->the_post();
				echo '<li>';
				if ( has_post_thumbnail() ) {
				echo '<div class="slider-featured-image"><a href=' . get_the_permalink() . '>';
				if ( $instance['slider_image_size'] == 'has-original-image' ) {
					echo the_post_thumbnail( 'large');
				} else {
					echo '<div class="slider-thumbnail ';
					if ( ! empty( $instance['slider_custom_image_size'] ) ) {} else {
						echo ' ';
						echo $instance['slider_image_size'];
					}
					echo '" style="background-image:url(';
					echo the_post_thumbnail_url( 'full' );
					echo ');';
					if ( ! empty( $instance['slider_custom_image_size'] ) ) {
						echo ' padding-bottom: '. $instance['slider_custom_image_size'] .';';
					} else {}
					echo '"></div>';
				}
				echo '</a></div>';			
				}
				echo '<div class="slider-content';
				if ( ! has_post_thumbnail() ) {
					echo ' has-no-image';
				}
				echo '">';
        echo '<div class="slide-details">';
        echo '<div class="slide-details-inner">';

				if ( 'yes' == $instance['slider_hide_date'] ) {} else {
					echo '<p class="slide-date">' . get_the_date() . '</p>';
				}
				if ( 'yes' == $instance['slider_hide_title'] ) {} else {
				echo '<div class="slide-title"><a href=' . get_the_permalink() . '>';
				echo the_title();
				echo '</a></div>';
				}

				if ( '1' == $instance['slider_excerpt_length'] ) {} else {
					echo '<span class="slide-snippet">' . excerpt($instance['slider_excerpt_length']) . '</span>';
				}
				if ( '' == $instance['slider_post_button'] ) {} else {
					echo '<div class="slide-more"><a href="' . get_the_permalink() . '">' . $instance['slider_post_button'] . '</a></div>';
				}

        echo '</div>';
        echo '</div>';
				echo '</div>';
				echo '</li>';
			}
			echo '</ul>';

      if ( $instance['slider_nav'] == 'has-arrows-nav' || $instance['slider_nav'] == 'has-arrows-dots-nav') {
			echo '<div class="next-slide"><i class="fa fa-angle-right"></i></div>';
    }
    
  echo '</div>';
			if ( $instance['slider_nav'] == 'has-dots-nav' || $instance['slider_nav'] == 'has-arrows-dots-nav') {
    echo '<div class="slick-dots"></div>';
  }
		}
		wp_reset_postdata();
		echo $args['after_widget'];
	}
    public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
			'disable_autoplay' => false,
			'slides_count' => 'two',
			'slider_nav' => 'has-dots-nav',
			'slider_style' => 'slider-style-1',
			'slider_image_size' => 'has-portrait-image',
			'slider_hide_title' => false,
      'slider_hide_date' => false,
			'slider_excerpt_length' => '30',
			'slider_post_button' => 'read article',
		));
    //$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_textarea( '', 'bfd' );
		//$slide_subtitle = ! empty( $instance['slide_subtitle'] ) ? $instance['slide_subtitle'] : esc_textarea( '', 'bfd' );
		//$slide_text = ! empty( $instance['slide_text'] ) ? $instance['slide_text'] : esc_textarea( '', 'bfd' );
		$slide_count = ! empty( $instance['slide_count'] ) ? $instance['slide_count'] : '4';
		$slide_offset = ! empty( $instance['slide_offset'] ) ? $instance['slide_offset'] : '0';
		$slide_category = ! empty( $instance['slide_category'] ) ? $instance['slide_category'] : '';
		$slide_ids = ! empty( $instance['slide_ids'] ) ? $instance['slide_ids'] : '';
		$slider_custom_image_size = ! empty( $instance['slider_custom_image_size'] ) ? $instance['slider_custom_image_size'] : '';
        ?>

<p><label style="padding-right: 5px;" for="<?php echo esc_attr( $this->get_field_id( 'slide_count' ) ); ?>"><?php echo esc_html__( 'Number of Posts to Show:', 'bfd' ); ?></label>
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'slide_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'slide_count' ) ); ?>" type="text" value="<?php echo esc_attr( $slide_count ); ?>" dir="ltr"></p>

  <p><input type="checkbox" id="<?php echo $this->get_field_id( 'disable_autoplay' ); ?>" name="<?php echo $this->get_field_name( 'disable_autoplay' ); ?>" value="yes"<?php checked('yes', $instance['disable_autoplay']); ?>>
    <label for="<?php echo $this->get_field_id( 'disable_autoplay' ); ?>">Disable autoplay?</label></p>

<p><label style="padding-right: 5px;" for="<?php echo esc_attr( $this->get_field_id( 'slide_offset' ) ); ?>"><?php echo esc_html__( 'Number of Posts to Offset:', 'bfd' ); ?></label>
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'slide_offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'slide_offset' ) ); ?>" type="text" value="<?php echo esc_attr( $slide_offset ); ?>" dir="ltr"></p>

<p><label for="<?php echo esc_attr( $this->get_field_id( 'slides_count' ) ); ?>"><?php esc_html_e( 'Number of Slides:', 'bfd' ); ?></label>
<select style="width: 100%;" id="<?php echo $this->get_field_id( 'slides_count' ); ?>" name="<?php echo $this->get_field_name( 'slides_count' ); ?>">
<option <?php if ( 'one' == $instance['slides_count'] ) echo 'selected="selected"'; ?> value="one">One</option>
<option <?php if ( 'one-center' == $instance['slides_count'] ) echo 'selected="selected"'; ?> value="one-center">One, Centered</option>
<option <?php if ( 'two' == $instance['slides_count'] ) echo 'selected="selected"'; ?> value="two">Two</option>
<option <?php if ( 'two-center' == $instance['slides_count'] ) echo 'selected="selected"'; ?> value="two-center">Two, Centered</option>
<option <?php if ( 'three' == $instance['slides_count'] ) echo 'selected="selected"'; ?> value="three">Three</option>
<option <?php if ( 'four' == $instance['slides_count'] ) echo 'selected="selected"'; ?> value="four">Four</option>
<option <?php if ( 'five' == $instance['slides_count'] ) echo 'selected="selected"'; ?> value="five">Five</option>
</select></p>

<p><label style="padding-right: 5px;" for="<?php echo esc_attr( $this->get_field_id( 'slide_category' ) ); ?>"><?php echo esc_html__( 'Add Category/Categories:', 'bfd' ); ?></label><span style="font-size: 11px !important; display: block; padding: 5px 0; font-style: italic;">
Learn how to find your category IDs <a href="https://njengah.com/find-wordpress-category-id" target="_blank">here</a>. Separate category IDs with a comma.</span>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'slide_category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'slide_category' ) ); ?>" type="text" value="<?php echo esc_attr( $slide_category ); ?>" dir="ltr"></p>

<p><label style="padding-right: 5px;" for="<?php echo esc_attr( $this->get_field_id( 'slide_ids' ) ); ?>"><?php echo esc_html__( 'Add Post IDs:', 'bfd' ); ?></label><span style="font-size: 11px !important; display: block; padding: 5px 0; font-style: italic;">
Learn how to find your post IDs <a href="https://kinsta.com/blog/wordpress-get-post-id/#1-find-the-id-within-each-posts-url" target="_blank">here</a>. Separate post IDs with a comma. </span><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'slide_ids' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'slide_ids' ) ); ?>" type="text"
value="<?php echo esc_attr( $slide_ids ); ?>" dir="ltr"></p>

<p><label for="<?php echo esc_attr( $this->get_field_id( 'slider_nav' ) ); ?>"><?php esc_html_e( 'Slider Navigation:', 'bfd' ); ?></label>
<select style="width: 100%;" id="<?php echo $this->get_field_id( 'slider_nav' ); ?>" name="<?php echo $this->get_field_name( 'slider_nav' ); ?>">
<option <?php if ( 'has-dots-nav' == $instance['slider_nav'] ) echo 'selected="selected"'; ?> value="has-dots-nav">Dots</option>
<option <?php if ( 'has-arrows-nav' == $instance['slider_nav'] ) echo 'selected="selected"'; ?> value="has-arrows-nav">Arrows</option>
<option <?php if ( 'has-arrows-dots-nav' == $instance['slider_nav'] ) echo 'selected="selected"'; ?> value="has-arrows-dots-nav">Dots + Arrows</option>
<option <?php if ( 'has-no-nav' == $instance['slider_nav'] ) echo 'selected="selected"'; ?> value="has-no-nav">None</option>
</select></p>

<p style="border-top: 1px solid #7e8993; margin: 30px 0 25px;"></p>

<p><label for="<?php echo esc_attr( $this->get_field_id( 'slider_style' ) ); ?>"><?php esc_html_e( 'Slider Style:', 'bfd' ); ?></label>
<select style="width: 100%;" id="<?php echo $this->get_field_id( 'slider_style' ); ?>" name="<?php echo $this->get_field_name( 'slider_style' ); ?>">
<option <?php if ( 'slider-style-1' == $instance['slider_style'] ) echo 'selected="selected"'; ?> value="slider-style-1">Style 1</option>
<option <?php if ( 'slider-style-2' == $instance['slider_style'] ) echo 'selected="selected"'; ?> value="slider-style-2">Style 2</option>
</select></p>

<p><label for="<?php echo esc_attr( $this->get_field_id( 'slider_image_size' ) ); ?>"><?php esc_html_e( 'Image Size:', 'bfd' ); ?></label>
<select style="width: 100%;" id="<?php echo $this->get_field_id( 'slider_image_size' ); ?>" name="<?php echo $this->get_field_name( 'slider_image_size' ); ?>">
<option <?php if ( 'has-landscape-image' == $instance['slider_image_size'] ) echo 'selected="selected"'; ?> value="has-landscape-image">Landscape</option>
<option <?php if ( 'has-square-image' == $instance['slider_image_size'] ) echo 'selected="selected"'; ?> value="has-square-image">Square</option>
<option <?php if ( 'has-portrait-image' == $instance['slider_image_size'] ) echo 'selected="selected"'; ?> value="has-portrait-image">Portrait</option>
<option <?php if ( 'has-original-image' == $instance['slider_image_size'] ) echo 'selected="selected"'; ?> value="has-original-image">Original</option>
</select></p>

<p><label style="padding-right: 5px;" for="<?php echo esc_attr( $this->get_field_id( 'slider_custom_image_size' ) ); ?>"><?php echo esc_html__( 'Custom Image Size:', 'bfd' ); ?></label><span style="font-size: 11px !important; display: block; padding: 5px 0; font-style: italic;">
This will override the main image size settings. Recommended: use % or hv instead of px. Example: 60vh = 60% of the screen.</span>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'slider_custom_image_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'slider_custom_image_size' ) ); ?>" type="text" value="<?php echo esc_attr( $slider_custom_image_size ); ?>" dir="ltr"></p>

<p><input id="<?php echo esc_attr( $this->get_field_id( 'slider_hide_title' ) ); ?>" type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'slider_hide_title' ) ); ?>" value="yes"<?php checked('yes', $instance['slider_hide_title'] ); ?>/>
<label for="<?php echo esc_attr( $this->get_field_id( 'slider_hide_title' ) ); ?>"><?php esc_html_e( 'Hide post title?', 'bfd' ); ?></label></p>

<p><input id="<?php echo esc_attr( $this->get_field_id( 'slider_hide_date' ) ); ?>" type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'slider_hide_date' ) ); ?>" value="yes"<?php checked( 'yes', $instance['slider_hide_date'] ); ?>/>
<label for="<?php echo esc_attr( $this->get_field_id( 'slider_hide_date' ) ); ?>"><?php esc_html_e( 'Hide post date?', 'bfd' ); ?></label></p>
<p style="border-top: 1px solid #7e8993; margin: 30px 0 25px;"></p>

<p><label style="padding-right: 5px;" for="<?php echo esc_attr( $this->get_field_id( 'slider_excerpt_length' ) ); ?>"><?php echo esc_html__( 'Excerpt Length:', 'bfd' ); ?></label>
<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'slider_excerpt_length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'slider_excerpt_length' ) ); ?>" value="<?php echo esc_attr( $instance['slider_excerpt_length'] ); ?>" size="2" placeholder="15" />
<span style="display: block; font-size: 12px; font-style: italic;">1 for no excerpt.</span></p>

<p><label for="<?php echo esc_attr( $this->get_field_id( 'slider_post_button' ) ); ?>"><?php echo esc_html__( 'Post Button Text:', 'bfd' ); ?><span style="display: block; padding: 5px 0; font-size: 12px; font-style: italic;">Leave empty for no button.</span></label>
  <input style="width: 100%;" type="text" id="<?php echo esc_attr( $this->get_field_id( 'slider_post_button' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'slider_post_button' ) ); ?>" value="<?php echo esc_attr( $instance['slider_post_button'] ); ?>" placeholder="" /></p>

        <?php }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
		//$instance['slide_subtitle'] = ( ! empty( $new_instance['slide_subtitle'] ) ) ? $new_instance['slide_subtitle'] : '';
        //$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? $new_instance['title'] : '';
		//$instance['slide_text'] = ( ! empty( $new_instance['slide_text'] ) ) ? $new_instance['slide_text'] : '';
		$instance['disable_autoplay'] = isset( $new_instance['disable_autoplay'] ) ? 'yes' : 'no';
		$instance['slide_count'] = ( ! empty( $new_instance['slide_count'] ) ) ? $new_instance['slide_count'] : '';
		$instance['slide_offset'] = ( ! empty( $new_instance['slide_offset'] ) ) ? $new_instance['slide_offset'] : '';
		$instance['slides_count'] = ( $new_instance['slides_count'] );
		$instance['slide_category'] = ( ! empty( $new_instance['slide_category'] ) ) ? $new_instance['slide_category'] : '';
		$instance['slide_ids'] = ( ! empty( $new_instance['slide_ids'] ) ) ? $new_instance['slide_ids'] : '';
		$instance['slider_nav'] = ( ! empty( $new_instance['slider_nav'] ) ) ? $new_instance['slider_nav'] : '';
		$instance['slider_style'] = ( ! empty( $new_instance['slider_style'] ) ) ? $new_instance['slider_style'] : '';
		$instance['slider_image_size'] = ( ! empty( $new_instance['slider_image_size'] ) ) ? $new_instance['slider_image_size'] : '';
		$instance['slider_custom_image_size'] = ( ! empty( $new_instance['slider_custom_image_size'] ) ) ? $new_instance['slider_custom_image_size'] : '';
		$instance['slider_hide_title'] = isset( $new_instance['slider_hide_title'] ) ? 'yes' : 'no';
    $instance['slider_hide_date'] = isset( $new_instance['slider_hide_date'] ) ? 'yes' : 'no';
		$instance['slider_excerpt_length'] = ( !empty( $new_instance['slider_excerpt_length'] ) ) ? $new_instance['slider_excerpt_length'] : '30';
		$instance['slider_post_button'] = ( !empty( $new_instance['slider_post_button'] ) ) ? $new_instance['slider_post_button'] : '';
        return $instance;
    }
}
$bfd_slider = new bfd_slider();
?>
