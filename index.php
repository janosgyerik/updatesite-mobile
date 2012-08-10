<?php 
// default configuration
$patterns = array('/apk$/');
$max_recent = 4;

// override default configuration
$config_file = './config.php';
if (file_exists($config_file)) {
    include($config_file);
}

function matches($filename) {
    global $patterns;
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $filename) == 1) {
            return true;
        }
    }
}

$files = array();
if ($handle = opendir('.')) {
    while (false !== ($filename = readdir($handle))) {
        if (is_file($filename) && matches($filename)) {
            $files[filemtime($filename)] = $filename;
        }
    }
    closedir($handle);
}

// sort by timestamp
ksort($files);

if ($files) {
    $tmpl_latest = array_pop($files);
    $files_formatted_list = array();
    $i = 0;
    foreach(array_reverse($files) as $file) {
        if (++$i > $max_recent) break;
        $file_html = '<p><a href="'.$file.'" class="btn btn-large">'.$file.'</a></p>';
        array_push($files_formatted_list, $file_html);
    }
    $tmpl_files = join('', $files_formatted_list);
}

$template_file = 'template.html';
if (!file_exists($template_file)) {
    $template_file = './samples/' . $template_file;
}

$html = file_get_contents($template_file);
echo str_replace(
    array('{{latest}}', '{{files}}'),
    array($tmpl_latest, $tmpl_files),
    $html
);
?>
