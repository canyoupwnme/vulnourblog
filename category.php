<?php
include ("header.php");

if ($_GET["id"]) {

  $id = $_GET["id"];

  $query = $db-> prepare("SELECT category_name FROM categories where category_id = ? ");
  $query -> execute(array($id));
  $query -> setFetchMode(PDO::FETCH_CLASS, 'categories');
  $category_name = $query -> fetchAll();
  $category_name = $category_name[0]["category_name"];

?>
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                <?= $category_name; ?>
                <!-- <small>Secondary Text</small> -->
            </h1>

            <!--  Blog Posts -->
              <?php categoryListDom($id); //sql inj?>

            <!-- Pager -->
            <!-- <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul> -->

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <?php include ("right_bar.php"); ?>

        </div>

    </div>
    <!-- /.row -->

    <hr>
<?php
}else {
  echo "Hata";
}

include ("footer.php");

?>
