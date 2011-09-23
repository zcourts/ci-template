<?php

$ci = &get_instance();
$this->load->view($ci->getTheme() . '/includes/header');
?>
<?php

if ($template_parts != NULL) {
	print '<div class="main_content floatL">';
}
$this->load->view($ci->getTheme().'/'.$main_content);
if ($template_parts != NULL) {
	print '</div>';
}
?>
<?php

if ($template_parts != NULL) {
	foreach ($template_parts as $part) {
		$this->load->view($ci->getTheme().'/'.$part);
	}
}
?>
<?php $this->load->view($ci->getTheme() . '/includes/footer'); ?>