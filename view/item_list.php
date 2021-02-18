<?php include 'header.php'; ?>
<main>

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
                $category = $item['categoryName'];
            ?>
            <tr>
                <td><?php echo $title; ?></td>
                <td><?php echo $description; ?></td>
                <td><?php echo $category; ?></td>
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