<?php 
$endsWith = '.apk';
function endsWith($haystack, $needle) {
    $length = strlen($needle);
    $start = $length * -1;
    return (substr($haystack, $start) === $needle);
}
$files = array();
if ($handle = opendir('.')) {
    while (false !== ($file = readdir($handle))) {
        if (endsWith($file, $endsWith)) {
            $files[filemtime($file)] = $file;
        }
    }
    closedir($handle);
}

// sort by timestamp
ksort($files);

if ($files) {
    $tmpl_latest = array_pop($files);
    $files_formatted_list = array();
    foreach(array_reverse($files) as $file) {
        $file_html = '<p><a href="'.$file.'" class="btn btn-large">'.$file.'</a></p>';
        array_push($files_formatted_list, $file_html);
    }
    $tmpl_files = join('', $files_formatted_list);
}

$html = file_get_contents('index.php.html');
echo str_replace(
    array('{{latest}}', '{{files}}'),
    array($tmpl_latest, $tmpl_files),
    $html
);
?>
