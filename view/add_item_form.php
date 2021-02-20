<?php include 'header.php'; ?>

    <main>
        <h1>Add Item</h1>
        <section>
            <div class="additem">
            <form action="index.php" method="POST">
                <input type="hidden" name="action" value="add_item">
                <label>Category:</label>
                <select name="category_id">
                <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php } ?>
                </select>
                <!-- <label><div class="addlabel">Add Item</div></label>
                <input type="hidden" name="itemnum" value="<?php echo $itemnum ?>"> -->
                <div>
                    <input type="text" id="newitems" name="title" placeholder="Title" required /><br>
                    <input type="text" id="newitems" name="description" placeholder="Description" required />
                </div>
                <label>&nbsp;</label>
                <input class ="add" type="submit" value="Add Item" />
            </form>
            </div>
        </section>
        <p><a href="index.php?action=list_items">View ToDo List</a></p>
    </main>
<?php include 'footer.php';