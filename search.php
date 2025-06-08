    <?php

    require_once "classes/Books.php";

    $book = new Books();
    $result = null;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $result = $book->searchBook($_POST['isbn']);
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
        <header><h1>Search Book</h1></header> 
           <form action="" method="post">
                <label for="isbn">Enter ISBN</label>
                <input type="text" name="isbn" value="" placeholder="Enter ISBN" required><br>
                <button type="submit">Search</button>
            </form>   
        <section class="main-container">
        
            <table border="1">        
                <?php if($result && $result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <th>ISBN</th>
                                <th>Title</th>
                                <th>Copyright</th>
                                <th>Edition</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        <tr>         
                        <td ><?= htmlspecialchars($row['isbn'])?></td>
                        <td><?= htmlspecialchars($row['title'])?></td>
                        <td><?= htmlspecialchars($row['copyright'])?></td>
                        <td><?= htmlspecialchars($row['edition'])?></td>
                        <td><?= htmlspecialchars($row['price'])?></td>
                        <td><?= htmlspecialchars($row['qty'])?></td>      
                        <td>
                            <a href="delete.php?isbn=<?= htmlspecialchars($row['isbn'])?>">Delete</a>
                            <a href="edit.php?isbn=<?= htmlspecialchars($row['isbn'])?>">Edit</a>
                        </td>   
                             
                    </tr>
                     <?php endwhile; ?>
                    <?php else: ?>
                            <td>No books found </td>      
                    <?php endif; ?>
                </table>
        </section>
            <a href="index.php">Back</a>
    </body>
    </html>