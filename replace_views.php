<?php
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('application/views'));
$count = 0;
foreach ($files as $file) {
    if ($file->isFile() && $file->getExtension() == 'php') {
        $content = file_get_contents($file->getPathname());
        if (preg_match('/>\s*Pathology\s*</i', $content)) {
            $content = preg_replace('/>(\s*)Pathology(\s*)</i', '> Lab', $content);
            file_put_contents($file->getPathname(), $content);
            $count++;
        }
    }
}
echo 'Replaced in ' . $count . ' view files.';
?>
