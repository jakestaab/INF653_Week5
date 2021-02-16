<?php
    require('database.php');

    $category_name = filter_input(INPUT_GET, "category_name", FILTER_SANITIZE_STRING);
    $category_id = filter_input(INPUT_POST, "category_id", FILTER_VALIDATE_INT);

        $query = 'SELECT * FROM categories
                        ORDER BY categoryID';
        $statement = $db->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        $statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo LIst</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <header><h1>My ToDo List</h1></header>
    <main>

        <section>
            <table>
                <tr><div class="listlabel">Categories</div></tr>
                <?php foreach($categories as $category) {
                    $category_id = $category['categoryID'];
                ?>
                <tr>
                    <td></td>
                    <td><?php echo $category['categoryName']; ?></td>
                    <td><form action="delete_category.php" method="POST">
                        <input type="hidden" name="category_id" value="<?php echo $category_id ?>">
                        <button class="delete">&#10006</button>
                    </form></td>
                </tr>
                <?php } ?>
            </table>
        </section>

        <h1>Add Category</h1>
        <section>
            <div class="additem">
            <form action="add_category.php" method="POST">
                <label><div class="addlabel">Name</div></label>
                <input type="text" id="category" name="category_name" required><br>
                <button class="add">Add Category</button>
            </form>
            </div>
        </section>
        
        <p><a href="index.php">View ToDo List</a></p>
    </main>
</body>
</html>