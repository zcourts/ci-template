<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title><?php print $title . ' | ' . config_item('title_suffix'); ?> </title>
		<?php
			print $scripts;
			print $styles;
			print $scriptContent;
		?>
    </head>
    <body>