<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Mobile_Site_Index</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="static/html5boilerplate/css/style.css">
	<link rel="stylesheet" href="static/bootstrap/css/bootstrap.min.css">

	<script src="static/html5boilerplate/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
<header>

</header>
<div role="main" class="container-fluid">
<h1>Mobile_Site_Index</h1>
<p>First file is the latest, older versions are below.</p>
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

// sort
ksort($files);

if ($files) {
    $file = array_pop($files);
    echo '<p><a href="#" class="btn btn-large btn-primary">'.$file.'</a></p>';
    foreach(array_reverse($files) as $file) {
        echo '<p><a href="#" class="btn btn-large">'.$file.'</a></p>';
    }
}
else {
    echo '<p>No files that end with: '.$endsWith.'</p>';
}
?>
</div>
<footer>

</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="static/html5boilerplate/js/libs/jquery-1.7.2.min.js"><\/script>')</script>

</body>
</html>
