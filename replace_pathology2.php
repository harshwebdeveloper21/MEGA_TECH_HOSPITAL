<?php
$files = glob('application/language/*/app_files/system_lang.php');
foreach ($files as $file) {
    $content = file_get_contents($file);
    $lines = explode("\n", $content);
    foreach ($lines as &$line) {
        if (strpos(trim($line), '$lang') === 0) {
            // Find the position of the equals sign
            $eqPos = strpos($line, '=');
            if ($eqPos !== false) {
                $keyPart = substr($line, 0, $eqPos);
                $valPart = substr($line, $eqPos);
                // replace case-insensitive pathology with Clinical Lab in the value part
                $valPart = str_ireplace('pathology', 'Clinical Lab', $valPart);
                $line = $keyPart . $valPart;
            }
        }
    }
    file_put_contents($file, implode("\n", $lines));
}
echo 'Replaced in ' . count($files) . ' files.';
?>
