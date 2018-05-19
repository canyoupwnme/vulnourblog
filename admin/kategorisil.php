<?php
  if(isset($_POST["sil"])){
     $silinecek = $_POST["sil"];
     deleteCategory($silinecek);
   }
 ?>
<h2 class="header">KATEGORİ SİL</h2>
  <div class="monitor">
    <div class="clearfix">
      <ul class="content">
        <li>KATEGORİLER</li>
        <?php
          foreach (categories() as $category) {
            echo '<li class="posts"><span class="count">'.$category["category_id"].'</span><a href="">'.$category["category_name"].'</a></li>';
          }
        ?>
      </ul>
     <ul class="discussions">
       <li>İŞLEM</li>
       <form action="" method="post">
         <?php
            foreach (categories() as $category) {
              echo '<button type="submit" name="sil" value="'.$category["category_id"].'">X</button><br>';
            }
          ?>
        </form>
    </ul>
   </div>
 </div>
