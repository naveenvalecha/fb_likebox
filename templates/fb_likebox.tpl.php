<?php

/**
 * @file
 * Facebook Likebox Template.
 */
?>

<iframe
src="//www.facebook.com/plugins/likebox.php?href=<?php print $fb_url; ?>&width=<?php print $fb_width; ?>&colorscheme=<?php print $fb_colorscheme; ?>&show_faces=<?php print $fb_show_faces; ?>&bordercolor&stream=<?php echo $fb_stream; ?>&header=<?php print $fb_header; ?>&height=<?php print $fb_height; ?>"
scrolling="<?php echo $fb_scrolling; ?>"
frameborder="0"
style="border: none; overflow: hidden; width: <?php print $fb_width; ?>px; height: <?php print $fb_height; ?>px;"
allowTransparency="true">
</iframe>
