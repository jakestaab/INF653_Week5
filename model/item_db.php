<?php

function get_items_by_category($category_id) {
    global $db;
    if ($category_id == NULL || $category_id == FALSE) {
    $query = 'SELECT * FROM todoitems
                    LEFT JOIN categories
                    USING (categoryID)
                    ORDER BY categoryID DESC';
    } else {
    $query = 'SELECT * FROM todoitems
                    INNER JOIN categories
                    ON todoitems.categoryID = categories.categoryID
                    WHERE todoitems.categoryID = :category_id
                    ORDER BY ItemNum ASC';
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function get_item($itemnum) {
    global $db;
    $query = 'SELECT * FROM todoitems
                    WHERE ItemNum = :itemnum';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemnum', $itemnum);
    $statement->execute();
    $item = $statement->fetch();
    $statement->closeCursor();
    return $item;
}

function delete_item($itemnum) {
    global $db;
    $query = 'DELETE FROM todoitems
                WHERE ItemNum = :itemnum';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemnum', $itemnum);
    $item = $statement->execute();
    $statement->closeCursor();
}

function add_item($category_id, $title, $description) {
    global $db;
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

?>