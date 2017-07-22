<?php include './includes/header.php'; ?>
<?php
$db = new Database();

$query1 = "SELECT posts.*, category.name FROM posts "
        . "INNER JOIN category ON posts.category = category.id ORDER BY posts.title DESC";
$posts = $db->select($query1);

$query2 = 'SELECT * FROM category ORDER BY id DESC';
$categories = $db->select($query2);
?>
<table class="table table-striped">
    <tr>
        <th>Post ID#</th>
        <th>Post Title</th>
        <th>Category</th>
        <th>Auther</th>
        <th>Date</th>
    </tr>


    <?php foreach ($posts as $value):?>
        <tr style="font-size: 16px">
            <td><?php echo $value['id']; ?></td>
            <td><a href="edit_post.php?id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></td>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['auther']; ?></td>
            <td><?php echo format_date($value['date']); ?></td>
        </tr>
    <?php endforeach; ?>

</table>
<br>
<table class="table table-striped">
    <tr>
        <th>Category ID#</th>
        <th>Category Name</th>
    </tr>

    <?php foreach ($categories as $value): ?>
        <tr style="font-size: 16px">
            <td><?php echo $value['id']; ?></td>
            <td><a href="edit_category.php?id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></td>
        </tr>
    <?php endforeach; ?>
</table>



<?php include './includes/footer.php'; ?>


