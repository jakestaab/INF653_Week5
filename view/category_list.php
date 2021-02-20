<?php include 'header.php'; ?>

    <main>
    <section>
        <div class="ctgtbl">
        <table>
            <tr><div class="listlabel">Categories</div></tr>
            <?php foreach($categories as $category) {
                $category_id = $category['categoryID'];
            ?>
            <tr>
                <td><?php echo $category['categoryName']; ?></td>
                <td><form action="." method="POST">
                    <input type="hidden" name="action" value="delete_category">
                    <input type="hidden" name="category_id" value="<?php echo $category_id ?>">
                    <button class="delete">Delete</button>
                </form></td>
            </tr>
            <?php } ?>
        </table>
        </div>
    </section>
    <br><br>
    <div class="tbl">
    <h2>Add Category</h2>
    <section>
        <div class="additem">
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="add_category">

            <label><div class="addlabel">Name</div></label>
            <input type="text" id="category" name="category_name" required><br>
            <button class="add">Add Category</button>
        </form>
        </div>
    </section>
    </div>
    <div class="tbl">
    <p><a href="index.php">View ToDo List</a></p>
    </div>
    </main>

<?php include 'footer.php';