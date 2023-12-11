<html>
<head>
    <title>Blog PHP</title>
    <link href="/style/output.css" rel="stylesheet">
</head>

<body>
<?php

include_once "core/Router.php";
session_start();
$router = new \core\Router();
$router->goTo($_SERVER['REQUEST_URI']);
include_once "views/footer.php";
?>
</body>
</html>