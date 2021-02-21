<?php include 'header.php'; ?>
<main>
<section>
    <div class="tbl">
        <table>
            <div class="selectCategory">
                <form>
                    <input type="hidden" name="action" value="select_category">
                    <label>Category:</label>
                        <select name="category_id">
                            <option value="">View All</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category['categoryID']; ?>">
                                    <?php echo $category['categoryName']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    <input class="categoryButton" type="submit" value="Submit" />
                </form>
            </div>

            <?php if(!empty($items)) { ?>
                <tr class="tableHeader">
                    <td>Title</td>
                    <td>Description</td>
                    <td>Category</td>
                </tr>
            <?php foreach($items as $item) {
                $itemnum = $item['ItemNum'];
                $title = $item['Title'];
                $description = $item['Description'];
                if ($item['categoryName'] == NULL || $item['categoryName'] == FALSE) {
                    $cg = 'None';
                } else {
                    $cg = $item['categoryName'];
                }
            ?>
            <tr>
                <td><?php echo $title; ?></td>
                <td><?php echo $description; ?></td>
                <td><?php echo $cg; ?></td>
                <td>
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="delete_item">
                        <input type="hidden" name="itemnum" value="<?php echo $itemnum ?>">
                        <button class="delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
</section>
    <?php } else { ?>
        <p>There are no items on the ToDo List.</p>
    <?php } ?><br><br>
</div>

<div class="tbl">  
    <p><a href="?action=show_add_form">Add Item</a></p>
    <p><a href="?action=show_category_form">View/Edit Categories</a></p>
<div>
</main>
<?php include 'footer.php'; ?>