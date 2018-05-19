<?php
  if(isset($_POST["sil"])){
    $silinecek = $_POST["sil"];
    deleteComment($silinecek);
  }
?>
<h2 class="header">YORUM SİL</h2>
<div class="monitor">
  <div class="clearfix">
    <ul class="content">
      <li>İÇERİK</li>
        <?php
          foreach (comments() as $comments) {
            echo '<li class="posts"><span class="count">'.$comments["comment_id"].'</span><a href="">'.$comments["comment_text"].'</a></li>';
          }
        ?>
    </ul>
   <ul class="discussions">
     <li>İŞLEM</li>
     <form action="" method="post">
       <?php
         foreach (comments() as $comments) {
           echo '<button type="submit" name="sil" value="'.$comments["comment_id"].'">X</button><br>';
         }
        ?>
      </form>
  </ul>
 </div>
</div>
