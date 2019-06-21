<?php
// Root directory
define('ROOT', dirname(__FILE__));
// Connect to database
require_once(ROOT . '/components/Db.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/main.css">
    <title>Document</title>
</head>
<body>
<?php
include('Views/head.php');
include('Views/pagination_table.php');
include('Views/analytics.php');

?>
</body>
<script src="./js/common.js" type="text/javascript"></script>
</html>