<?php include 'header.php'; ?>
<main>
<?php if(!empty($items)) { ?>
    <section>
        <table>
            <th>
                <td>Item</td>
                <td>Description</td>
                <td>Category</td>
                <td>Delete</td>
            </th>
            <tr><div class="listlabel">ToDo List</div></tr>
            <?php foreach($items as $item) {
                $itemnum = $item['ItemNum'];
                $title = $item['Title'];
                $description = $item['Description'];
                $categoryName = $item['categoryName'];
            ?>
            <tr>
                <td></td>
                <td><?php echo $title; ?></td>
                <td><?php echo $description; ?></td>
                <td><?php echo $categoryName; ?></td>
                <td><form action="." method="POST">
                    <input type="hidden" name="action" value="delete_item">
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

<p><a href="?action=show_add_form">Add Item</a></p>
<p><a href="?action=show_category_form">View/Edit Categories</a></p>
</main>
<?php include 'footer.php'; ?>