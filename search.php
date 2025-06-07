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
        <title>Document</title>
    </head>
<body style="margin-left:500px; margin-top:50px;">
        <header><h1>Search Book</h1></header>
        <section>
            <form action="" method="post">
                <label for="isbn">Enter ISBN</label>
                <input type="text" name="isbn" value="" placeholder="Enter ISBN" required><br>
                <button type="submit">Search</button>
            </form>
            <table border="1" style="border-collapse:collapse; ">        
                <?php if($result && $result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                        <td><?= htmlspecialchars($row['isbn'])?></td>
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
    <a href="index.php">Back</a>
            
        </section>
    </body>
    </html>