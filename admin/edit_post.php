<?php include './includes/header.php'; ?>
<?php
$id = $_GET['id'];

$db = new Database();

$query1 = 'SELECT * FROM posts WHERE id = ' . $id;
$post = $db->select($query1)->fetch(PDO::FETCH_ASSOC);

$query2 = 'SELECT * FROM category';
$categories = $db->select($query2);
?>

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
        $query = "UPDATE posts SET title = '$title', body = '$body', category = $category, auther = '$auther', tags = '$tags' WHERE id = $id";
        $db->updtae($query);
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
if(isset($_POST['delete'])) {
    $query = "DELETE FROM posts WHERE id = $id";
    $db->delete($query);
}
?>


<form role="form" method="POST" action="edit_post.php?id=<?php echo $id; ?>">
    <div class="form-group">
        <label>Post Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Post Title..." value="<?php echo $post['title']; ?>">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea class="form-control" name="body" placeholder="Enter Post Body..." style="height: 250px"><?php echo $post['body'] ?></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category">
            <?php foreach ($categories as $value): ?>
                <?php
                if ($value['id'] == $post['category']) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                
                ?>
            <option value="<?php echo $value['id']; ?>" <?php echo $selected; ?>><?php echo $value['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Auther</label>
        <input type="text" class="form-control" name="auther" placeholder="Enter Post Auther..." value="<?php echo $post['auther']; ?>">
    </div>
    <div class="form-group">
        <label>Tags</label>
        <input type="text" class="form-control" name="tags" placeholder="Enter Post Tags..." value="<?php echo $post['tags']; ?>">
    </div>
    <div>
        <input name = "submit" type="submit" class="btn btn-success" value="save"/>
        <a href="index.php" class="btn btn-info">cancel</a>
        <input name = "delete" type="submit" class="btn btn-danger" value="delete"/>
    </div>
    <br>
</form>

<?php include './includes/footer.php'; ?>
