<?php

require_once "classes/Books.php";
$book = new Books();
$jsAlert = '';
$message = $book->delete($_GET['isbn']);
$jsAlert = "<script>
    alert('".addslashes($message)."');
    window.location.href= 'index.php';
</script>"
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?=$jsAlert?>
</body>
</html>