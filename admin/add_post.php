<?php include './includes/header.php'; ?>
<?php
if(isset($_POST['submit'])) {
    $db = new Database();
    
    $title = test_input($_POST['title']);
    $body = test_input($_POST['body']);
    $category = test_input($_POST['category']);
    $auther = test_input($_POST['auther']);
    $tags = test_input($_POST['tags']);
    
    if(empty($title) || empty($body) || empty($category) || empty($auther) || empty($tags)) {
        $error = 'pleade fill out all required fields!';
    } else {
        $query = "INSERT INTO posts (title, body, category, auther, tags) VALUES ('$title', '$body', '$category', '$auther', '$tags')";
        $db->insert($query);
    }
}


function test_input($d) {
$data = trim($d);
$data = htmlspecialchars($d);
$data = stripslashes($d);

return $data;
}
?>
<?php
$db = new Database();

$query2 = 'SELECT * FROM category';
$categories = $db->select($query2);
?>


<form role="form" method="POST" action="add_post.php">
    <div class="form-group">
        <label>Post Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Post Title...">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea class="form-control" name="body" placeholder="Enter Post Body..." style="height: 250px"></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category">
            <?php foreach ($categories as $value): ?>
            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Auther</label>
        <input type="text" class="form-control" name="auther" placeholder="Enter Post Auther...">
    </div>
    <div class="form-group">
        <label>Tags</label>
        <input type="text" class="form-control" name="tags" placeholder="Enter Post Tags...">
    </div>
    <div>
        <input name = "submit" type="submit" class="btn btn-success" value="add"/>
        <a href="index.php" class="btn btn-danger">cancel</a>
    </div>
    <br>
</form>

<?php include './includes/footer.php'; ?>
