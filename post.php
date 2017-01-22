<?php
include ("header.php");


$id = $_GET["id"]; // burada sql inj olabilir :)
$postdata = postData($id);
if ($postdata != 0) {

  if ($_POST["c_username"]!= "" && $_POST["c_email"] !="" && $_POST["c_text"] != "") {
    addComment($_POST["c_username"], $_POST["c_email"], $_POST["c_text"],$id); // burda js ile kontrol yaparıız trafıgın arasına gırıp script bassarlar
    // addComment 1 => başarılı 0 => hata
  }

  $comment_data = commentsData($id);
?>
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1><?= $postdata["title"]; ?></h1>

            <!-- Author -->
            <p class="lead">
                by <a href="about.php"><?= $postdata["username"]  ?></a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $postdata["created_at"] ?></p>

            <hr>

            <!-- Preview Image -->
            <?php
              if ($postdata["photo_path"] != "") {
                echo '<img class="img-responsive" src="uploads/'.$postdata["photo_path"].'" alt="">';
              }
             ?>

            <hr>
            <!-- Post Content -->
            <p><?= $postdata["text"];?></p>
            <hr>
            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" action="" method="POST" id="comment">
                    <div class="form-group">
                        <input class="form-control" type="text" id="username" name="c_username" placeholder="Username" value="">
                        <br>
                        <input class="form-control" type="text" id="email" name="c_email" placeholder="Email" value="">
                        <br>
                        <textarea class="form-control" rows="3" id="text" name="c_text" placeholder="Your comment"></textarea>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>


            <!-- Posted Comments -->
            <?php commentDom($id); ?>
            <!-- Yorumları bas -->

        </div> <!-- end col-lg-8 -->

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <?php include ("right_bar.php"); ?>
        </div>

    </div>
    <!-- /.row -->

    <hr>
    <script src="js/post.js"></script>
    
<?php
} else { // if end
  echo "Sen hayırdır";
}
include ("footer.php");
