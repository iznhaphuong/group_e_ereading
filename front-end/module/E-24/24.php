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
$less->compileFile('./less/style-24.less', 'css/style-24.css');
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>23</title>
	<meta charset="utf-8" />
	<link href="<?php echo $url_path ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $url_path ?>/css/style-24.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $url_path ?>/css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<?php include $dir_block . '/24-content.php'; ?>
	<script src="<?php echo $url_path ?>/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo $url_path ?>/js/script-24.js"></script>
</body>

</html>