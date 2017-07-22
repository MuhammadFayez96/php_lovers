<?php include '../config/config.php' ?>           
<?php include '../libraries/database.php' ?>           
<?php include '../helpers/format_helper.php'; ?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PHPLoversBlog Posts</title>
        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="../css/custom.css" rel="stylesheet">

    </head>

    <body>

        <div class="blog-masthead">
            <nav class="blog-nav">
                <div class="container">
                    <a class="blog-nav-item active" href="index.php">Dashboard</a>
                    <a class="blog-nav-item" href="add_post.php">Add Post</a>
                    <a class="blog-nav-item" href="add_category.php">Add Category</a>
                    <a class="blog-nav-item pull-right" href="../index.php">Visit Blog</a>
                </div>
            </nav>
        </div>   


        <div class="container">
            <div class="blog-header">
                <h2 style="border-bottom: 1px solid #333; width: 200px">Admin Area</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <div class="col-sm-12 blog-main">
                    <?php if(isset($_GET['msg'])): ?>
                    <div class="alert alert-success"><?php echo htmlentities($_GET['msg']); ?></div>
                    <?php endif; ?>
