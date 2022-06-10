<!DOCTYPE HTML>
<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);

if (!class_exists('lessc')) {
	$dir_block = dirname($_SERVER['SCRIPT_FILENAME']);
	require_once($dir_block . '/libs/lessc.inc.php');
}

$less = new lessc;
$less->compileFile('./less/style-02.less', 'css/style-02.css');
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>02</title>
	<meta charset="utf-8" />
	<link href="<?php echo $url_path ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $url_path ?>/css/style-02.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

</head>

<body>
	<?php include $dir_block . '/02-content.php'; ?>
	<script src="<?php echo $url_path ?>/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo $url_path ?>/js/script-02.js"></script>
</body>

</html>