<?php include './includes/header.php';?>   
<?php
$id = $_GET['id'];

$db = new Database();

$query1 = 'SELECT * FROM posts WHERE id = '.$id;
$post = $db->select($query1)->fetch(PDO::FETCH_ASSOC);

$query2 = 'SELECT * FROM category';
$categories = $db->select($query2);
?>
<div class="blog-post">
    <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
    <p class="blog-post-meta"><?php echo format_date($post['date']); ?> by <a href="#"><?php echo $post['auther'] ?></a></p>
    <p class="lead the-post"><?php echo $post['body']; ?></p>
</div>
<?php include './includes/footer.php';?>  
