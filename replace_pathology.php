<?php
$files = glob('application/language/*/app_files/system_lang.php');
foreach ($files as $file) {
    $content = file_get_contents($file);
    $lines = explode(PHP_EOL, $content);
    foreach ($lines as &$line) {
        if (preg_match('/^(\s*\\\\[[\'"].*?[\'"]\]\s*=\s*[\'"])(.*?)([\'"];\s*)$/i', $line, $matches)) {
            $prefix = $matches[1];
            $value = $matches[2];
            $suffix = $matches[3];
            $newValue = str_ireplace('pathology', 'Clinical Lab', $value);
            $line = $prefix . $newValue . $suffix;
        }
    }
    file_put_contents($file, implode(PHP_EOL, $lines));
}
echo 'Replaced in ' . count($files) . ' files.';
?>
