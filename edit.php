<?php

require_once "classes/Books.php";
$jsAlert = '';
$book = new Books();
$data = $book->getById($_GET['isbn'])->fetch_assoc();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $message =  $book->update($_POST['isbn'],$_POST['title'],$_POST['copyright'],$_POST['edition'],$_POST['price'],$_POST['qty']);
    $jsAlert = "<script>
        alert('" . addslashes($message) . "');
        window.location.href = 'index.php';
    </script>";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <header><h1>Add Student</h1></header>         
    <?= $jsAlert ?>

    <section>
        <form action="" method="post">
            <label for="title">Enter title</label>
            <input type="text" value="<?= htmlspecialchars($data['isbn'])?>" name="isbn" placeholder="Enter title" readonly><br>
            <label for="title">Enter title</label>
            <input type="text" value="<?= htmlspecialchars($data['title'])?>" name="title" placeholder="Enter title" required><br>
            <label for="copyright">Enter copyright</label>
            <input type="number" value="<?= htmlspecialchars($data['copyright'])?>" name="copyright" placeholder="Enter copyright" min="1900" max="2025" required  ><br>
            <label for="edition">Enter edition</label>
            <input type="text" value="<?= htmlspecialchars($data['edition'])?>" name="edition" placeholder="Enter edition" require><br>
            <label for="price">Enter price</label>
            <input type="number" value="<?= htmlspecialchars($data['price'])?>"  name="price" placeholder="Enter price" min="1" required><br>
            <label for="qty">Enter qty</label>
            <input type="number"  value="<?= htmlspecialchars($data['qty'])?>" name="qty" placeholder="Enter qty" min="1" max="100" required><br>
            <button type="submit">Update Book</button>
        </form>
        <a href="index.php">Cancel</a>

    </section>
</body>
</html>