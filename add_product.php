<?php
require('database.php');

$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$category_id = filter_input(INPUT_POST, "category_id", FILTER_VALIDATE_INT);

if ($title) {
    $query = 'INSERT INTO todoitems
                (categoryID, Title, Description)
                VALUES
                (:category_id, :title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}

$updated = true;

include('index.php');