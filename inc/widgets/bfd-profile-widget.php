<?php
add_action('widgets_init', 'bfd_profile_widget');
function bfd_profile_widget() {
    register_widget( 'bfd_profile' );
}
add_action('admin_enqueue_scripts', 'profile_widget_uploader');
function profile_widget_uploader() {
wp_enqueue_script('ads_script', get_template_directory_uri() . '/js/img-upload.js', false, '1.0.0', true);
}
// Widget
class bfd_profile extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'bfd-profile');
        parent::__construct('bfd-profile-widget', 'BFD Profile Widget', $widget_ops);
    }

    function widget($args, $instance) {
    echo $args['before_widget'];
 if(!empty ($instance['text'] )) {?>
<h2 class='widget-title'><span><?php echo apply_filters('widget_title', $instance['text'] ); ?></span></h2>
<?php }
if(!empty ($instance['image_uri'] )) { ?>
<div class="custom-img">
		<a href="<?php echo esc_url($instance['link_url']); ?>">
		<?php
		if ( $instance['image_size'] == 'full' ) {
			echo '<img src="' . $instance['image_uri'] . '"/>';
		} else {
			echo '<div class="cropped-image ' . $instance['image_size'] . '" style="background-image:url(' . $instance['image_uri'] . ')"></div>';
		}?>
		</a>
</div>
<?php } ?>
<div class='img-details'>
  <div class='img-details-inner'>
  <?php  if(!empty ($instance['heading'] )) { ?>
<div class='widget-heading'><span><?php echo apply_filters('widget_heading', $instance['heading'] ); ?></span></div>
<?php } if(!empty ($instance['desc'] )) { ?>
<span class='caption'><?php echo  $instance['desc']; ?></span>
<?php } if(!empty ($instance['button_title'] )) { ?>
<div class='img-btn'><a href="<?php echo esc_url($instance['link_url']); ?>"><?php echo $instance['button_title']; ?></a></div>
<?php } ?>
</div>
</div>

    <?php
    echo $args['after_widget'];
}
    function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['text'] = strip_tags( $new_instance['text'] );
    $instance['heading'] = strip_tags( $new_instance['heading'] );
		$instance['desc'] = strip_tags( $new_instance['desc'] );
		$instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
		$instance['image_size'] = ( ! empty( $new_instance['image_size'] ) ) ? $new_instance['image_size'] : '';
		$instance['link_url'] = strip_tags( $new_instance['link_url'] );
		$instance['button_title'] = strip_tags( $new_instance['button_title'] );
    return $instance;
    }

    function form($instance) {
    $instance = wp_parse_args( (array) $instance, array(
      'image_size' => 'full',
      'text'       => '',
      'desc'       => '',
      'image_uri'  => '',
      'link_url'   => '',
      'button_title' => '',
      'heading'    => '',
      ));
?>
 <p>
        <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e( 'Widget title. <i>Visible only when the widget is placed in the sidebar area.</i>', 'santella' ) ?></label><br />
        <input type="text" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>" value="<?php echo $instance['text']; ?>" class="widefat" />
    </p>
    <p>
    <label for="<?= $this->get_field_id( 'image_uri' ); ?>"><?php _e( 'Image', 'santella' ) ?></label>
    <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
    <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>" value="<?= $instance['image_uri'] ?? ''; ?>" style="margin-top:5px;" />
    <input type="button" id="<?= $this->id ?>" class="button button-primary upload_media" value="Upload Image" style="margin-top:5px;" />
    </p>

<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'image_size' ) ); ?>"><?php esc_html_e( 'Image Size:', 'santella' ); ?></label>
<select style="width: 100%;" id="<?php echo $this->get_field_id( 'image_size' ); ?>" name="<?php echo $this->get_field_name( 'image_size' ); ?>">
<option <?php if ( 'landscape' == $instance['image_size'] ) echo 'selected="selected"'; ?> value="landscape">Landscape</option>
<option <?php if ( 'square' == $instance['image_size'] ) echo 'selected="selected"'; ?> value="square">Square</option>
<option <?php if ( 'portrait' == $instance['image_size'] ) echo 'selected="selected"'; ?> value="portrait">Portrait</option>
<option <?php if ( 'full' == $instance['image_size'] ) echo 'selected="selected"'; ?> value="full">Full</option>
	<option <?php if ( 'circle' == $instance['image_size'] ) echo 'selected="selected"'; ?> value="circle">Circle</option>
</select>
</p>
<p>
       <label for="<?php echo $this->get_field_id('heading'); ?>"><?php _e( 'Heading. <i>Visible only when widget is placed outside the sidebar area.</i>', 'santella') ?></label><br />
       <input type="heading" name="<?php echo $this->get_field_name('heading'); ?>" id="<?php echo $this->get_field_id('heading'); ?>" value="<?php echo $instance['heading']; ?>" class="widefat" />
   </p>
<p>
	<label for="<?php echo $this->get_field_id('desc'); ?>" style="display:block;"><?php _e( 'Your Desc:', 'santella') ?>' </label>
	<textarea class="<?php echo $this->get_field_id('desc'); ?>" rows="6" cols="40" name="<?php echo $this->get_field_name('desc'); ?>" style="width:100%;margin-top:5px;"><?php echo $instance['desc'] ;?></textarea>
</p>
    <p>

		<label for="<?= $this->get_field_id( 'button_title' ); ?>"><?php _e( 'Button Name', 'santella') ?></label>
        <input type="btn-title" class="widefat <?= $this->id ?>_title" name="<?= $this->get_field_name( 'button_title' ); ?>" value="<?= $instance['button_title']; ?>" style="margin-top:5px;" />
		 <label for="<?= $this->get_field_id( 'link_url' ); ?>"><?php _e( 'Button Link' , 'santella' ) ?></label>
     <input type="btn-link" class="widefat <?= $this->id ?>_link" name="<?= $this->get_field_name( 'link_url' ); ?>" value="<?= $instance['link_url']; ?>" style="margin-top:5px;" />

    </p>

<?php
    }
}
