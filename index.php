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
    delete_item($itemnum);
    header("Location: .?category_id=$category_id");

} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('./view/add_item_form.php');
} else if ($action == 'add_item') {
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
    if ($category_id == NULL || $category_id == FALSE || $title == NULL || $description == NULL) {
        $error = "Invalid item inputs. Check all fields and try again.";
        //include('./errors/error.php');
    } else {
        add_item($category_id, $title, $description);
        header("Location: .?category_id=&category_id");
    }
} else if ($action == 'show_category_form') {
    $categories = get_categories();
    include('./view/category_list.php');
} else if ($action == 'add_category') {
    $category_name = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_STRING);
    if ($category_name == FALSE || $category_name == NULL) {
        $error = "Invalid category name. Please try again.";
        //include('./errors/error.php');
    } else {
        add_category($category_name);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    delete_category($category_id);
    header("Location: .?category_id=$category_id");
}