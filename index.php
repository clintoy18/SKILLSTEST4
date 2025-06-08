<?php

require_once "classes\Books.php";

$book = new Books();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $books = $book->bookByCopyright($_POST['copyright']);
}else{
$books = $book->getAll();
}
$copyrights = $book->uniqueCopyright();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Management</title>
</head>
<body style="margin-left:500px; margin-top:50px;">
<a href="add.php">Add Book</a><br><a href="search.php">Search for a book</a>

<form method="post">
            <label for="copyrights">Select Copyrights</label>
            <select name="copyright" id="">
                <?php while($row = $copyrights->fetch_assoc()): ?>
                <option value="<?= htmlspecialchars($row['copyright'])?>"
                 <?=(isset($_POST['copyright']) && $_POST['copyright'] == $row['copyright']) ? 'selected' :'' ?>>
                    <?= htmlspecialchars($row['copyright'])?>
                </option>
                <?php endwhile; ?>
            </select>
            <button type="submit">Submit</button>
</form>


<table border="1" style="border-collapse:collapse; ">
    <tr>
        <th>ISBN</th>
        <th>Title</th>
        <th>Copyright</th>
        <th>Edition</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>
    <tr><?php while($row = $books->fetch_assoc()): 
        $price = $row['price'];
        $qty = $row['qty'];
        $total = $price * $qty;
        ?>
        <td><?= htmlspecialchars($row['isbn'])?></td>
        <td><?= htmlspecialchars($row['title'])?></td>
        <td><?= htmlspecialchars($row['copyright'])?></td>
        <td><?= htmlspecialchars($row['edition'])?></td>
        <td><?= htmlspecialchars($row['price'])?></td>
        <td><?= htmlspecialchars($row['qty'])?></td>      
        <td><?= number_format($total,2)?></td>      
    </tr>
    <?php endwhile; ?>
</table>
    
</body>
</html>