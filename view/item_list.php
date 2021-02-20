<?php include 'header.php'; ?>
<main>
    <form>
        <input type="hidden" name="action" value="select_category">
        <label>Category:</label>
            <select name="category_id">
                <option value="">None</option>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php } ?>
            </select>
        <input class ="add" type="submit" value="Submit" />
    </form>

<?php if(!empty($items)) { ?>
    <section>
        <table>
            <tr><div class="listlabel">ToDo List</div></tr>
            <tr>
                <td>Title</td>
                <td>Description</td>
                <td>Category</td>
                <td>Delete</td>
            </tr>
            <?php foreach($items as $item) {
                $itemnum = $item['ItemNum'];
                $title = $item['Title'];
                $description = $item['Description'];
                //$cg = $item['categoryID'];
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

                <td><form action="." method="POST">
                    <input type="hidden" name="action" value="delete_item">
                    <input type="hidden" name="itemnum" value="<?php echo $itemnum ?>">
                    <button>Delete</button>
                </form></td>
            </tr>
            <?php } ?>
        </table>
    </section>
<?php } else { ?>
    <p>There are no items on the ToDo List.</p>
<?php } ?>
<p><a href="?action=show_add_form">Add Item</a></p>
<p><a href="?action=show_category_form">View/Edit Categories</a></p>
</main>
<?php include 'footer.php'; ?>