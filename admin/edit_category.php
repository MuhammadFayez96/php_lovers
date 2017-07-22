<?php include './includes/header.php'; ?>
<?php
$id = $_GET['id'];

$db = new Database();

$query2 = 'SELECT * FROM category WHERE id = ' . $id;
$categories = $db->select($query2)->fetch(PDO::FETCH_ASSOC);;
?>
<?php
if(isset($_POST['submit'])) {
    $db = new Database();
    
    $name = test_input($_POST['name']);
    
    if(empty($name)) {
        $error = 'pleade fill out all required fields!';
    } else {
        $query = "UPDATE category SET name = '$name' where id =". $id;
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
    $query = "DELETE FROM category WHERE id = $id";
    $db->delete($query);
}
?>



<form role="form" method="POST" action="edit_category.php?id=<?php echo $id; ?>">
    <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Category Name..." value="<?php echo $categories['name'] ?>">
    </div>
    
    <div>
        <input name = "submit" type="submit" class="btn btn-success" value="save"/>
        <a href="index.php" class="btn btn-info">cancel</a>
        <input name = "delete" type="submit" class="btn btn-danger" value="delete"/>
    </div>
    <br>
</form>

<?php include './includes/footer.php'; ?>
