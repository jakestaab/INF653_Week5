<?php
require('./model/database.php');
require('./model/item_db.php');
require('./model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_items';
    }
}

if ($action == 'list_items') {
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $items = get_items_by_category($category_id);
    include('view/item_list.php');
} else if ($action == 'delete_item') {
    $itemnum = filter_input(INPUT_POST, 'itemnum', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'itemnum', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE || $itemnum == NULL || $itemnum == FALSE) {
        $error = "Missing or incorrect item number or category id.";
    } else {
        delete_item($itemnum);
        header("Location: .?category_id=$category_id");
    }
}