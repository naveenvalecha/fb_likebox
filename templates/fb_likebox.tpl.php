<?php

/**
 * @file
 * Facebook Likebox Template.
 */
?>

<iframe
src="http://www.facebook.com/plugins/likebox.php?href=<?php echo $fb_url; ?>&width=<?php echo $fb_width; ?>&colorscheme=<?php echo $fb_colorscheme; ?>&show_faces=<?php echo $fb_show_faces; ?>&bordercolor&stream=<?php echo $fb_stream; ?>&header=<?php echo $fb_header; ?>&height=<?php echo $fb_height; ?>"
scrolling="<?php echo $fb_scrolling; ?>"
frameborder="0"
style="border: none; overflow: hidden; width: <?php echo $fb_width; ?>px; height: <?php echo $fb_height; ?>px;"
allowTransparency="true">
</iframe>
