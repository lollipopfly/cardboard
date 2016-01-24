<?php

/*
  Plugin Name: Upload Multiple Image
  Plugin URI: http://suhasrathod.wordpress.com/2014/01/29/upload-multiple-image-1/
  Description: This plugin provide multiple image upload options for posts and pages.
  Author: Suhas Rathod
  Version: 1.0
  Author URI: http://suhasrathod.wordpress.com/
 */

if (is_admin())
{
    add_action('load-post.php', 'upload_multi_image');
    add_action('load-post-new.php', 'upload_multi_image');
}

function upload_multi_image()
{
    new Image_Uploader_SR();
}

class Image_Uploader_SR
{
    var $post_types = array();
    /**
     * Initialize Image_Uploader_SR
     */
    public function __construct()
    {
        $this->post_types = get_post_types();     //meta box for post and page
        add_action('add_meta_boxes', array($this, 'add_image_box'));
        add_action('save_post', array($this, 'save_images'));
        add_action('admin_enqueue_scripts', array($this, 'add_script'));
    }

    /**
     * Adds the meta box for image.
     */
    public function add_image_box($post_type)
    {
        if (in_array($post_type, $this->post_types))
        {
            add_meta_box(
                    'upload_multi_image_meta_box'
                    , __('Upload Multiple Images', 'sr_textdomain')
                    , array($this, 'render_meta_box')
                    , $post_type
                    , 'advanced'
                    , 'high'
            );
        }
    }

    /**
     * Save the images when the post is saved.
     * $post_id The ID of the post being saved.
     */
    public function save_images($post_id)
    {
		// Check the user's permissions.
        if ('page' == $_POST['post_type'])
        {
            if (!current_user_can('edit_page', $post_id))
                return $post_id;
        } else
        {
            if (!current_user_can('edit_post', $post_id))
                return $post_id;
        }

        // Check if our nonce is set.
        if (!isset($_POST['sr_multi_upload_nonce']))
            return $post_id;

        $nonce = $_POST['sr_multi_upload_nonce'];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, 'sr_multi_upload'))
            return $post_id;

        // Validate user input.
        $image_to_save = $_POST['sr_multi_images'];
        $sr_multi_images = array();
        foreach ($image_to_save as $image_url)
        {
            if(!empty ($image_url))
                $sr_multi_images[] = esc_url_raw($image_url); //return cleaned url
        }

        // Update the sr_multi_images meta field.
        update_post_meta($post_id, 'sr_multi_images', serialize($sr_multi_images));
    }

    /**
	 *
     * Render Meta Box content.
     *
     */
    public function render_meta_box($post)
    {
        // Add an nonce field so we can track post.
        wp_nonce_field('sr_multi_upload', 'sr_multi_upload_nonce');

        // Use get_post_meta to retrieve an existing value from the database.
        $value = get_post_meta($post->ID, 'sr_multi_images', true);

        $image_content = '<div id="sr_multi_images"></div>
						  <div style="clear:both;">
						  <input class="button button-primary button-large" type="button" onClick="addNewRow()" value="Add Image" style="margin-top:5px">
						 </div>';
        echo $image_content;

        $images = unserialize($value);

		$JS = "<script>totalItems= 0;var plugin_dir = '".plugin_dir_url(__FILE__)."';";
						if (!empty($images))
						{
							foreach ($images as $image)
							{
								$JS.="addNewRow('{$image}');";
							}
						}
						$JS .="</script>";
        echo $JS;
    }

    function add_script($hook)
    {
        if ('post.php' != $hook && 'post-edit.php' != $hook && 'post-new.php' != $hook)return;
        wp_enqueue_script('sr_image_upload_script', plugin_dir_url(__FILE__) . 'js/sr_image_upload_script.js', array('jquery'));
    }
}

/**
 *
 * Get images attached to post or page using get_multiple_image
 *
 */
function get_multiple_image($post_id)
{
    $value = get_post_meta($post_id, 'sr_multi_images', true);
    $images = unserialize($value);
    $result = array();
    if (!empty($images))
    {
        foreach ($images as $image)
        {
            $result[] = $image;
        }
    }
    return $result;
}