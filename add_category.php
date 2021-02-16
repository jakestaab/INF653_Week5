<?php
require('database.php');

$category_name = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_STRING);;

if ($category_name) {
    $query = 'INSERT INTO categories
                (categoryName)
                VALUES
                (:category_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->execute();
    $statement->closeCursor();
}

$updated = true;

include('index.php');