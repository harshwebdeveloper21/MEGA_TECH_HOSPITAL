<?php
$file = 'application/views/layout/sidebar.php';
$content = file_get_contents($file);
$content = str_replace("<span><?php echo $this->lang->line('pathology'); ?></span>", "<span>Clinical Laboratory</span>", $content);
$content = str_replace("<i class=\"fas fa-angle-right\"></i> <?php echo $this->lang->line(\"pathology\"); ?></a></li>", "<i class=\"fas fa-angle-right\"></i> Clinical Laboratory</a></li>", $content);
$content = str_replace("<i class=\"fas fa-angle-right\"></i> <?php echo $this->lang->line('pathology'); ?></a></li>", "<i class=\"fas fa-angle-right\"></i> Clinical Laboratory</a></li>", $content);
file_put_contents($file, $content);

$file2 = 'application/views/layout/patient/sidebar.php';
if(file_exists($file2)) {
    $content2 = file_get_contents($file2);
    $content2 = str_replace("<span><?php echo $this->lang->line('pathology'); ?></span>", "<span>Clinical Laboratory</span>", $content2);
    file_put_contents($file2, $content2);
}
echo 'Replaced in sidebars.';
?>
