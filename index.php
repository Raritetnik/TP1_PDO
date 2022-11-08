<?php
// Header avec le menu
require_once __DIR__.'/view/main-menu.php';
require_once __DIR__.'/library/RenderView.php';
require_once __DIR__.'/connex/Crud.php';

//print_r($_SERVER['PATH_INFO']);
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';
$crud = new Crud;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
    href="<?= (!isset($url[1]) || $url[1] == "") ? "": "../"?>css/style.css">
    <title>Document</title>
</head>
<body>
<?php
if($url == '/'){
    require_once 'class/Class-Home.php';
    $controller = new ClassHome;
    echo $controller->index();
}else{
    $requestURL = $url[0];
    $requestURL = ucfirst($requestURL);
    $controllerPath = __DIR__.'/class/Class'.$requestURL.'.php';

    if(file_exists($controllerPath)){
        require_once($controllerPath);
        $controllerName = 'Class'.$requestURL;
        $controller = new $controllerName($crud);
        if(!isset($url[1]) || $url[1] == "") {
            echo $controller->index();
        } else {
            $requestAction = $url[1];
            echo $controller->$requestAction();
        }
    }else{
        require_once 'class/Class-Home.php';
        $controller = new ClassHome;
        echo $controller->error();
    }
}
?>

</body>
</html>
