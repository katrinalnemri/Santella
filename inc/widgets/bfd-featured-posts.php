<?php
/**
 * Category_Posts widget class
 *
 * Displays posts from a selected category
 *
 * @since 1.0.0
*/

function featured_excerpt($limit) {
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

class Category_Posts extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'bfd_featured_posts',
            _x( 'BFD Featured Posts', 'santella' ),
             ['description' => __( 'Display a list of posts from a selected category.' )]
        );
        $this->alt_option_name = 'bfd_featured_posts';

        add_action( 'save_post', [$this, 'flush_widget_cache'] );
        add_action( 'deleted_post', [$this, 'flush_widget_cache'] );
        add_action( 'switch_theme', [$this, 'flush_widget_cache'] );
    }

    public function widget( $args, $instance )
    {
        $cache = [];
        if ( ! $this->is_preview() ) {
            $cache = wp_cache_get( 'widget_cat_posts', 'widget' );
        }

        if ( ! is_array( $cache ) ) {
            $cache = [];
        }

        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();

        $title          = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( '' );
        /** This filter is documented in wp-includes/default-widgets.php */
      //  $title          = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number         = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
        if ( ! $number ) {
            $number = 3;
        }
        $cat_id         = $instance['cat_id'];
        $random         = $instance['rand'] ? true : false;
        $cat_btn        = $instance['cat_btn'] ? true : false;
        $thumbnail      = $instance['thumbnail'] ? true : false;
        $image_size     = $instance['image_size'];
        $btn_text          = ( ! empty( $instance['btn_text'] ) ) ? $instance['btn_text'] : __( 'more from this category' );
        $instance['featured_excerpt_length'] = ( !empty( $instance['featured_excerpt_length'] ) ) ? $instance['featured_excerpt_length'] : '30';
		
        /**
         * Filter the arguments for the Category Posts widget.
         *
         * @since 1.0.0
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args An array of arguments used to retrieve the category posts.
         */
        if( true === $random ) {

            $query_args = [
                'posts_per_page'    => $number,
                'cat'               => $cat_id,
                'orderby'           => 'rand'
            ];

        }else{

            $query_args = [
                'posts_per_page'    => $number,
                'cat'               => $cat_id,
            ];

        }
        $q = new WP_Query( apply_filters( 'category_posts_args', $query_args ) );

        if( $q->have_posts() ) {
if($number === 1){
  $count = 'one';
}else if($number % 2 === 0 && $number % 3 !== 0){
  $count = 'even';
}else if($number % 3 === 0 || ($number % 3 === 0 && $number % 2 === 0)){
  $count = 'three';
}else{
  $count = 'odd';
}
            echo $args['before_widget']; ?>
            <div class="bfd-featured-posts">
        <?php    if ( $title || true === $cat_btn ) { ?>
              <h2 class='widget-title'>
				  <?php } 
				  if ( $title ){
				  ?>
				  <span><?php echo apply_filters('widget_title', $instance['title'] ); if ( true === $cat_btn ) { ?> <b>"<?php echo get_cat_name($cat_id); ?>"</b> <?php } ?> </span>
				  <?php } 
 if ( true === $cat_btn ) {  ?>
              <div class="featured-btn">
                <a href="<?php echo get_category_link( $cat_id ); ?>"><?php _e($btn_text, 'santella')?><i class="fa fa-long-arrow-alt-right" style="margin-left:3px;"></i></a>
              </div>
              <?php
            } ?>
				<?php    if ( $title || true === $cat_btn ) { ?>
				</h2>
          <?php } //  echo $args['before_title'] . $title . $args['after_title']; ?>
			<div class="featured-posts-container <?php echo $count ?>">
                  <?php     while( $q->have_posts() ) {
                $q->the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <?php
                    if ( has_post_thumbnail() && true === $thumbnail ) { ?>
                        <div class="post-thumbnail">
                        <?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
                          the_post_thumbnail( $image_size );
                        echo '</a>'; ?>
                        </div>
                      <?php } ?>
                        <header class="entry-header">
                            <?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
                        </header>
                    <?php
						   
						   if ( '1' == $instance['featured_excerpt_length'] ) {} else {
					echo '<div class="entry-summary"><p>' . excerpt($instance['featured_excerpt_length']) . '</p></div>';
				}
                    ?>
                </article>
                <?php
            }
?>
</div>
</div>
        <?php    wp_reset_postdata();
        }

echo $args['after_widget'];

        if ( ! $this->is_preview() ) {
            $cache[ $args['widget_id'] ] = ob_get_flush();
            wp_cache_set( 'widget_cat_posts', $cache, 'widget' );
        } else {
            ob_end_flush();
        }
    }

    public function update( $new_instance, $old_instance )
    {
        $instance                   = $old_instance;
        $instance['title']          = strip_tags( $new_instance['title'] );
        $instance['btn_text']       = strip_tags( $new_instance['btn_text'] );
        $instance['number']         = (int) $new_instance['number'];
        $instance['cat_id']         = (int) $new_instance['cat_id'];
        $instance['rand']           = $new_instance['rand'];
        $instance['cat_btn']        = $new_instance['cat_btn'];
        $instance['thumbnail']      = $new_instance['thumbnail'];
        $instance['image_size'] = ( ! empty( $new_instance['image_size'] ) ) ? $new_instance['image_size'] : '';
		$instance['featured_excerpt_length'] = ( !empty( $new_instance['featured_excerpt_length'] ) ) ? $new_instance['featured_excerpt_length'] : '30';
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['bfd_featured_posts']) )
            delete_option('bfd_featured_posts');

        return $instance;
    }

    public function flush_widget_cache()
    {
        wp_cache_delete('widget_cat_posts', 'widget');
    }

    public function form( $instance )
    {
		$instance = wp_parse_args( (array) $instance, array(
'featured_excerpt_length' => '30',
			));
        $title      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $btn_text   = isset( $instance['btn_text'] ) ? esc_attr( $instance['btn_text'] ) : 'more from this category';
        $number     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
        $cat_id     = isset( $instance['cat_id'] ) ? absint( $instance['cat_id'] ) : 1;
        $random     = isset( $instance['rand'] ) ? $instance['rand'] : false;
        $cat_btn    = isset( $instance['cat_btn'] ) ? $instance['cat_btn'] : false;
        $thumbnail  = isset( $instance['thumbnail'] ) ? $instance['thumbnail'] : false;
        $image_size = isset( $instance['image_size'] ) ? $instance['image_size'] : '';
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show (<i>For best results insert number 3, 6 or 9</i>)' ); ?></label>
            <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('cat_id'); ?>"><?php _e( 'Category Name:' )?></label>
            <select id="<?php echo $this->get_field_id('cat_id'); ?>" name="<?php echo $this->get_field_name('cat_id'); ?>">
                <?php
                $this->categories = get_categories();
                foreach ( $this->categories as $cat ) {
                    $selected = ( $cat->term_id == esc_attr( $cat_id ) ) ? ' selected = "selected" ' : '';
                    $option = '<option '.$selected .'value="' . $cat->term_id;
                    $option = $option .'">';
                    $option = $option .$cat->name;
                    $option = $option .'</option>';
                    echo $option;
                }
                ?>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('rand'); ?>"><?php _e( 'Show random posts' ); ?></label>
            <?php $checked = ( $random ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'rand' ); ?>" name="<?php echo $this->get_field_name( 'rand' ); ?>" value="true" <?php echo $checked; ?> />
        </p>

<p><label style="padding-right: 5px;" for="<?php echo esc_attr( $this->get_field_id( 'featured_excerpt_length' ) ); ?>"><?php echo esc_html__( 'Excerpt Length:', 'bfd' ); ?></label>
<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'featured_excerpt_length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'featured_excerpt_length' ) ); ?>" value="<?php echo $instance['featured_excerpt_length'] ; ?>" size="2"/>
<span style="display: block; font-size: 12px; font-style: italic;">1 for no excerpt.</span></p>

        <p>
            <label for="<?php echo $this->get_field_id('thumbnail'); ?>"><?php _e( 'Show post thumbnail' ); ?></label>
            <?php $checked = ( $thumbnail ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" id="<?php echo $this->get_field_id( 'thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail' ); ?>" value="true" <?php echo $checked; ?> />
        </p>

        <p>
        	<label for="<?php echo esc_attr( $this->get_field_id( 'image_size' ) ); ?>"><?php esc_html_e( 'Image Size:', 'santella' ); ?></label>
        <select style="width: 100%;" id="<?php echo $this->get_field_id( 'image_size' ); ?>" name="<?php echo $this->get_field_name( 'image_size' ); ?>">
        <option <?php if ( 'landscape' === $image_size ) echo 'selected="selected"'; ?> value="landscape">Landscape</option>
        <option <?php if ( 'square' === $image_size ) echo 'selected="selected"'; ?> value="square">Square</option>
        <option <?php if ( 'portrait' === $image_size ) echo 'selected="selected"'; ?> value="portrait">Portrait</option>
        <option <?php if ( 'original' === $image_size ) echo 'selected="selected"'; ?> value="original">Full</option>
        </select>
        </p>

        <p>
            <label style="display:block; margin-bottom:5px;" for="<?php echo $this->get_field_id('cat_btn'); ?>"><?php _e( 'Show button (<i>If checked the name of the chosen category appears next to the widget title and a link to the category is shown.</i>)' ); ?></label>
            <?php $checked = ( $cat_btn ) ? ' checked=\"checked\" ' : ''; ?>
            <input type="checkbox" class="cat-btn" id="<?php echo $this->get_field_id( 'cat_btn' ); ?>" name="<?php echo $this->get_field_name( 'cat_btn' ); ?>" value="true" <?php echo $checked; ?> />
        </p>

        <p>
            <label style="display:block; margin-bottom:5px;" for="<?php echo $this->get_field_id( 'btn_text' ); ?>"><?php _e( 'Link text (<i>The link shows only if the "Show button" above option is checked.</i>)' ); ?></label>
            <input class="btn-text" id="<?php echo $this->get_field_id( 'btn_text' ); ?> btn_text" name="<?php echo $this->get_field_name( 'btn_text' ); ?> btn_text" type="text" value="<?php echo $btn_text; ?>" />
        </p>
            <?php
    }
}

add_action( 'widgets_init', function ()
{
    register_widget( 'Category_Posts' );
});
