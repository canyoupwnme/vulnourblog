<?php
require_once("header.php");
?>
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- Blog Post -->
            <h2>
                <a href="post.php">Blog Post Title</a>
            </h2>
            <p class="lead">
                by Start Bootstrap
            </p>
            <hr>
            <img class="img-responsive" src="900x300.png" alt="">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <?php require_once("right_bar.php"); ?>
        </div>

    </div>
    <!-- /.row -->

    <hr>
<?php
require_once("footer.php");
?>