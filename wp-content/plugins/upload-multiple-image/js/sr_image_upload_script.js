jQuery(document).ready(function(){
	jQuery('.Upload_button').live( "click", function(e) {
		e.preventDefault();
        var id = jQuery(this).attr("id")
        var up_btn = id.split("-");
        up_img_id = up_btn[1];
        formfield = jQuery('#image-'+up_img_id).attr('name');
        tb_show('', 'media-upload.php?type=image&TB_iframe=true');
        return false;
    });

    window.send_to_editor = function(html) {
        imgurl = jQuery('img', html).attr('src');
        jQuery('#image-'+up_img_id).val(imgurl);
		var image_src_live = "<img src='"+imgurl+"' height='150' width='150'>";
		jQuery('#live-image-'+up_img_id).append(image_src_live);
		jQuery('#Upload_button-'+up_img_id).hide();
        tb_remove();
    };

	jQuery( "#sr_multi_images input[type=hidden]" ).each(function( i ) {
		var input_id = this.id;
		var remove_upload = input_id.split("-");
		var input_value_check = jQuery('#'+input_id).val();
		var after_save_img = "<img src='"+input_value_check+"' height='150' width='150'>";
		if (jQuery('#live-'+input_id).length) {
			jQuery('#live-'+input_id).append(after_save_img);
			jQuery('#Upload_button-'+remove_upload[1]).hide();
		}
	});

	jQuery('.sr-umi-remove').live( "click", function(e) {
		e.preventDefault();
		var id = jQuery(this).attr("id")
		var div_id = id.split("-");
		var row_id = div_id[1];
		jQuery("#row-"+row_id ).remove();
	});
});


function addNewRow(image){
	if(typeof(image)==='undefined') image = "";
    totalItems += 1;
    var bulkImages = '<div style="float:left;clear:both;margin-top:15px;" id=row-'+totalItems+'> <div style="float:left;clear:both;" id="live-image-'+totalItems+'"></div><input style=\'width:70%\' id=image-'+totalItems+' type=\'hidden\' name=\'sr_multi_images['+totalItems+']\' value=\''+image+'\' />'
    +'<img src="'+plugin_dir+'img/up.jpg" class="Upload_button" alt="Upload Image" style="float:left;margin-right:30px;margin-top: -14px;cursor:pointer;border-radius:10px" id=\'Upload_button-'+totalItems+'\'/>'
    +'<img src="'+plugin_dir+'img/remove.png" class="sr-umi-remove" alt="Remove Image" style="float:left;margin-left: -17px;margin-top: -14px;cursor:pointer;" id=\'remove-'+totalItems+'\'/></div>';
	//<input class="sr-umi-remove button" style="float:left;" type=\'button\' value=\'Remove\' id=\'remove-'+totalItems+'\' />
	//<input type=\'button\' href=\'#\' class=\'Upload_button button\' id=\'Upload_button-'+totalItems+'\' value=\'Upload\' style=\'float:left;\'>
    jQuery('#sr_multi_images').append(bulkImages);

	
}

