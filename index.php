<?php
function __autoload($class_name)
{
    require_once 'classes/'.strtolower($class_name).'.php';
}

if(isset($_GET['default'])){
    $default_size = $_GET['default'];
    $generator = new CssGenerator($default_size);
}else{

?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSS Gen</title>
</head>
<body>
    Usage <?php echo $_SERVER['HTTP_HOST'] . '?default=SIZE'?>
</body>
</html>
<?php } ?>
