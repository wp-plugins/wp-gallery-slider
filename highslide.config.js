/**
*	Site-specific configuration settings for Highslide JS
*/
hs.graphicsDir = '/wp-content/plugins/wpgalleryslider/js/graphics/';
hs.outlineType = 'custom';
hs.captionEval = 'this.a.title';
hs.easing='easeInBack';
hs.easingClose='easeOutBack';
// Add the slideshow controller
hs.addSlideshow({
	slideshowGroup: 'group1',
	interval: 5000,
	repeat: false,
	useControls: true,
	fixedControls: 'fit',
	overlayOptions: {
		className: 'large-dark',
		opacity: 0.75,
		position: 'bottom center',
		offsetX: 0,
		offsetY: -10,
		hideOnMouseOut: true
	}
});
// gallery config object
var config1 = {
	slideshowGroup: 'group1',
	transitions: ['expand', 'crossfade']
};
///====================/
jQuery(document).ready(function($){
/* Here we target the wordpress gallery Elements
as at WP 4.2 the gallery markup is as shown below
<div id='gallery-1' class='gallery galleryid-317 gallery-columns-3 gallery-size-thumbnail'>
<dl class='gallery-item'>
<dt class='gallery-icon landscape'>
<a href='imageUrl'><img width="150" height="150" src="imageThumbUrl" class="attachment-thumbnail" alt="Caption" aria-describedby="gallery-1-338" /></a>
</dt>
<dd class='wp-caption-text gallery-caption' id='gallery-1-338'>
Caption Contents
</dd>
</dl>
*/
var galleryElm = $(document).find("[id*='gallery-'] >dl>dt>a" );
    $(document).find("[id*='gallery-']").sortable();
    $(document).find("[id*='gallery-']").disableSelection();
galleryElm.each(function() {  
// if caption is not define wordpress use the file name as 'alt' attribute
//so we pick it from there to use as caption for highslider
	var title= $(this).find("img").attr("alt");
//Here we change the to highslider configuration	
	$(this).attr("onclick","return hs.expand(this, config1 )");
//hignslider use the 'a[title]'	(attribute value)
	$(this).attr("title",title);
	$(this).attr("rel"," ");

});
//==================All Closed==========  
})($);