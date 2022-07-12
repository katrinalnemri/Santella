<?php

// Register widget
add_action('widgets_init', 'bfd_image_widget');
function bfd_image_widget() {
    register_widget( 'bfd_image' );
}

// Enqueue additional admin scripts
add_action('admin_enqueue_scripts', 'image_widget_uploader');
function image_widget_uploader() {
wp_enqueue_script('ads_script', get_template_directory_uri() . '/js/img-upload.js', false, '1.0.0', true);
}

// Widget
class bfd_image extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'bfd-image');
        parent::__construct('bfd-image-widget', 'BFD Image widget', $widget_ops);
    }

    function widget($args, $instance) {

        			echo $args['before_widget'];
              if(!empty ($instance['text'] )) {?>
             <h2 class='widget-title'><span><?php echo apply_filters('widget_title', $instance['text'] ); ?></span></h2>
             <?php }
              if(!empty ($instance['img_link'] )) {?>
              <a href="<?php echo esc_url($instance['img_link']); ?>">
                <?php }
  if(!empty ($instance['image_uri'] )) {?>
<div class="custom-img">
		<?php
    if ( $instance['image_size'] == 'full' ) {
      echo '<img src="' . $instance['image_uri'] . '"/>';
    } else {
			echo '<div class="cropped-image ' . $instance['image_size'] . '" style="background-image:url(' . $instance['image_uri'] . ')"></div>';
	}	?>
</div>
<?php }
if(!empty ($instance['img_link'] )) {?>
</a>
<?php }
        			echo $args['after_widget'];
}

//update
    function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['text'] = strip_tags( $new_instance['text'] );
		$instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
		$instance['image_size'] = ( ! empty( $new_instance['image_size'] ) ) ? $new_instance['image_size'] : '';
		$instance['img_link'] = strip_tags( $new_instance['img_link'] );
        return $instance;
    }

//form
    function form($instance) {
  $instance = wp_parse_args( (array) $instance, array(
      'image_size' => 'landscape',
      'text'       => '',
      'image_uri'  => '',
      'img_link'   => '',
      ));
?>
 <p>
        <label for="<?php echo $this->get_field_id('text'); ?>">Title</label><br />
        <input type="text" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>" value="<?php echo $instance['text']; ?>" class="widefat" />
    </p>

    <p>
    <label for="<?= $this->get_field_id( 'image_uri' ); ?>">Image</label>
    <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
    <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>" value="<?= $instance['image_uri'] ?? ''; ?>" style="margin-top:5px;" />
    <input type="button" id="<?= $this->id ?>" class="button button-primary upload_media" value="Upload Image" style="margin-top:5px;" />
</p>

<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'image_size' ) ); ?>"><?php esc_html_e( 'Image Size:', 'solstice' ); ?></label>
<select style="width: 100%;" id="<?php echo $this->get_field_id( 'image_size' ); ?>" name="<?php echo $this->get_field_name( 'image_size' ); ?>">
<option <?php if ( 'landscape' == $instance['image_size'] ) echo 'selected="selected"'; ?> value="landscape">Landscape</option>
<option <?php if ( 'square' == $instance['image_size'] ) echo 'selected="selected"'; ?> value="square">Square</option>
<option <?php if ( 'portrait' == $instance['image_size'] ) echo 'selected="selected"'; ?> value="portrait">Portrait</option>
<option <?php if ( 'full' == $instance['image_size'] ) echo 'selected="selected"'; ?> value="full">Full</option>
	<option <?php if ( 'circle' == $instance['image_size'] ) echo 'selected="selected"'; ?> value="circle">Circle</option>
</select>
</p>
    <p>
		<label for="<?= $this->get_field_id( 'img_link' ); ?>">Link</label>
        <input type="link" class="<?php echo $this->get_field_id('img_link'); ?>" name="<?php echo $this->get_field_name( 'img_link' ); ?>" value="<?php echo $instance['img_link']; ?>" style="margin-top:5px;width:100%;"/>
    </p>

<?php
    }

}
