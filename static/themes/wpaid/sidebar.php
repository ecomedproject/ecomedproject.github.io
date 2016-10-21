<div id="rightSidebar" class="sidebar">
<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Widgets') ) : endif; ?>
</ul>
</div><!--end sidebar-->

<div id="leftSidebar" class="sidebar">
<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Widgets') ) : endif; ?>
<?php echo show_olimometer(1);?>
</ul>
</div><!--end sidebar-->