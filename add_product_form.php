<?php
    require('database.php');
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_GET, "description", FILTER_SANITIZE_STRING);
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
        <h1>Add Item</h1>
        <section>
            <div class="additem">
            <form action="add_product.php" method="POST">

                <label>Category:</label>
                <select name="category_id">
                <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php } ?>
                <label><div class="addlabel">Add Item</div></label>
                <input type="hidden" name="itemnum" value="<?php echo $itemnum ?>">
                <div>
                    <input type="text" id="newitems" name="title" placeholder="Title" required><br>
                    <input type="text" id="newitems" name="description" placeholder="Description" required>
                </div>
                <button class="add">Add Item</button>
            </form>
            </div>
        </section>
        <p><a href="index.php">View ToDo List</a></p>
    </main>
</body>
</html>