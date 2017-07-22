<?php include './includes/header.php'; ?>
<?php
if(isset($_POST['submit'])) {
    $db = new Database();
    
    $name = test_input($_POST['name']);
    
    if(empty($name)) {
        $error = 'pleade fill out all required fields!';
    } else {
        $query = "INSERT INTO category (name) VALUES ('$name')";
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
<form role="form" method="POST" action="add_category.php">
    <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Category Name...">
    </div>
    
    <div>
        <input name = "submit" type="submit" class="btn btn-success" value="add"/>
        <a href="index.php" class="btn btn-danger">cancel</a>
    </div>
    <br>
</form>

<?php include './includes/footer.php'; ?>
