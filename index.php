<?php
    require('database.php');
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_GET, "description", FILTER_SANITIZE_STRING);
    $categoryName = filter_input(INPUT_GET, "categoryName", FILTER_SANITIZE_STRING);

        $query = 'SELECT * FROM todoitems
                    INNER JOIN categories
                    ON todoitems.categoryID = categories.categoryID ';
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();


        $query2 = 'SELECT * FROM categories
                        ORDER BY categoryID';
        $statement2 = $db->prepare($query2);
        $statement2->execute();
        $categories = $statement2->fetchAll();
        $statement2->closeCursor();
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
    <main>

        <?php if(!empty($results)) { ?>
            <section>
                <table>
                    <th>
                        <td>Item</td>
                        <td>Description</td>
                        <td>Category</td>
                        <td>Delete</td>
                    </th>
                    <tr><div class="listlabel">ToDo List</div></tr>
                    <?php foreach($results as $result) {
                        $itemnum = $result['ItemNum'];
                        $title = $result['Title'];
                        $description = $result['Description'];
                        $categoryName = $result['categoryName'];
                    ?>
                    <tr>
                        <td></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $description; ?></td>
                        <td><?php echo $categoryName; ?></td>
                        <td><form action="delete_item.php" method="POST">
                            <input type="hidden" name="itemnum" value="<?php echo $itemnum ?>">
                            <button class="delete">&#10006</button>
                        </form></td>
                    </tr>
                    <?php } ?>
                </table>
            </section>
        <?php } else { ?>
            <p>There are no items on the ToDo List.</p>
        <?php } ?>

        <p><a href="add_item_form.php">Add Item</a></p>
        <p><a href="add_category_form.php">View/Edit Categories</a></p>

    </main>
</body>
</html>