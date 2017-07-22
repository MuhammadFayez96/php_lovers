<?php include './includes/header.php';?> 
<?php

$db = new Database();

$query1 = 'SELECT * FROM posts ORDER BY id DESC';
$posts = $db->select($query1);

$query2 = 'SELECT * FROM category';
$categories = $db->select($query2);

?>

<?php if($posts): ?>
<?php foreach ($posts as $value): ?>
<div class="blog-post">
    <h2 class="blog-post-title"><?php echo $value['title']; ?></h2>
    <p class="blog-post-meta"><?php echo format_date($value['date']); ?> by <a href="#"><?php echo $value['auther'] ?></a></p>
    <p class="lead the-post"><?php echo shorten_text($value['body']); ?></p>
    <a class="read-more" href="post.php?id=<?php echo urlencode($value['id']); ?>">Read More...</a>
</div>
<?php endforeach; ?>

<?php else: ?>
<p>The are no posts to display</p>
<?php endif; ?>

<?php include './includes/footer.php';?>     
