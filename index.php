<?php

require_once "classes\Books.php";

$book = new Books();
$books = $book->getAll();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Management</title>
</head>
<body style="margin-left:500px; margin-top:50px;">
<a href="add.php">Add Book</a><br><a href="search.php">Search for a book</a>
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