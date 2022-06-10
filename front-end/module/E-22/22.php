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
$less->compileFile('./less/style-22.less', 'css/style-22.css');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>22</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo $url_path ?>/css/bootstrap.min.css ">
    <link rel="stylesheet" href="<?php echo $url_path ?>/css/style-22.css">
</head>
<body>
<?php include $dir_block . '/22-content.php'; ?>

<script src="<?php echo $url_path ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url_path ?>/js/script-22.js"></script>
</body>
</html>