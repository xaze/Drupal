<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
<?php print $head ?>
<title><?php print $head_title ?></title>
<?php print $styles ?><?php print $scripts ?>
<script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
<script type="text/javascript"> 

    $(document).ready(function() { 
        $('ul.sf-menu').superfish({ 
            delay:       1000,                            // one second delay on mouseout 
            animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
            speed:       'fast',                          // faster animation speed 
            autoArrows:  false,                           // disable generation of arrow mark-up 
            dropShadows: false                            // disable drop shadows 
        }); 
    }); 

</script>
</head>
<body>
<?php if (!empty($admin)) print $admin; ?>
<div id="donate"><a href="donation"><img src="<?php print base_path(). $directory; ?>/donate.png"  alt="Support Mt. Ashwabay" /></a></div>
<div class="container_12">
  <div class="grid_3">&nbsp;</div>
  <div class="grid_6" id="logo">
    <?php if ($logo) { ?>
    <a href="<?php print $front_page ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a>
    <?php } ?>
  </div>
  <div class="grid_3" id="tickets"><a href="tickets"><img src="<?php print base_path(). $directory; ?>/buy-tickets.png" width="204" height="48" alt="Buy Tickets Online" /></a>
<?php print $cart ?></div>
  <div class="grid_12 navlist" id="nav">
	<ul class='sf-menu'>
	<?php
	$tree = menu_tree_page_data('primary-links');

	  $output = '';
	  $items = array();

	  // Pull out just the menu items we are going to render so that we
	  // get an accurate count for the first/last classes.
	  foreach ($tree as $data) {
	    if (!$data['link']['hidden']) {
	      $items[] = $data;
	    }
	  }

	  $num_items = count($items);
	  foreach ($items as $i => $data) {
	    $extra_class = NULL;
	    if ($i == 0) {
	      $extra_class = 'first';
	    }
	    if ($i == $num_items - 1) {
	      $extra_class = 'last';
	    }
	    $link = theme('menu_item_link', $data['link']);
	    if ($data['below']) {
	      $output .= theme('menu_item', $link, $data['link']['has_children'], menu_tree_output($data['below']), $data['link']['in_active_trail'], $extra_class);
	    }
	    else {
	      $output .= theme('menu_item', $link, $data['link']['has_children'], '', $data['link']['in_active_trail'], $extra_class);
	    }
	  }

	print $output;
	?>
	</ul>
  </div>
  <div class="grid_12" id="slideshow">
    <h1 class="title"><?php print $title ?></h1>
    <div class="tabs"><?php print $tabs ?></div>
    <?php if (user_is_logged_in() && $show_messages && $messages): print $messages; endif; ?>
    <?php print $help ?> <?php print $content; ?> </div>
  <div class="grid_12"></div>
  <div class="grid_3 bb" id="weather"><?php print $weather ?></div>
  <div class="grid_3 bb" id="conditions"><?php print $conditions ?></div>
  <div class="grid_3 bb" id="events"><?php print $upcoming ?></div>
  <div class="grid_3 bb" id="email"><?php print $newsletter ?></div>
</div>
<div class="container_12">
  <div class="grid_4 foot">©2010 Blue Box Design.<br />
    In development for Mount Ashwabay<br />
	Operated by Ashwabay Outdoor Educational Foundation a 501(c)3 non-profit organization<br/>
    All Rights Reserved. </div>
  <div class="grid_3 foot">

	Mt. Ashwabay Ski &amp; Recreation Area<br />
    Bayfield, WI <br />
    715.779.3227
<br />
<a href="http://www.facebook.com/pages/Bayfield-WI/Mt-Ashwabay-Ski-and-Recreation-Area/247242479063"><img src="<?php print base_path(). $directory; ?>/facebook.png"  alt="Mt. Ashwabay on Facebook" /></a>
<a href="http://www.twitter.com"><img src="<?php print base_path(). $directory; ?>/twitter.png"  alt="Mt. Ashwabay on Twitter"/></a>
</div>
  <div class="grid_3 foot">	<p>
	Wednesdays 10:00 to 8:00<br/>
	Saturdays 9:30 to 4:30<br/>
	Sundays  10:00 to 4:30<br/>
	NASTAR racing on Sundays @ 1pm</p></div>
  <div class="grid_2 foot footlink">
 	<?php if (isset($primary_links)) { ?>
	  <?php print theme('links', $primary_links, array('class' => 'footlink')) ?>
	  <?php } ?>
  </div>
</div>
<?php print $closure ?>
</body>
</html>
