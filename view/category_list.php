<?php
require('../model/database.php');
require('../model/item_db.php');
require('../model/category_db.php');

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
    $products = get_items_by_category($category_id);
    include('item_list.php');
}