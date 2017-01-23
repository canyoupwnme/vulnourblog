<?php

if(isset($_POST["sil"])){

 $silinecek = $_POST["sil"];
 postDelete($silinecek);

}
 ?>

<h2 class="header">YAZİ SİL</h2>
  <div class="monitor">
    <div class="clearfix">

      <ul class="content">
        <li>BAŞLİK</li>
        <?php

          foreach (homePagePostListData() as $value) {

            echo '<li class="posts"><span class="count">'.$value["id"].'</span><a href="">'.$value["title"].'</a></li>';
          }

         ?>
      </ul>
      
     <ul class="discussions">
       <li>İŞLEM</li>

       <form action="" method="post">

           <?php

             foreach (homePagePostListData() as $value) {

               echo '<button type="submit" name="sil" value="'.$value["post_id"].'">X</button><br>';
             }

            ?>
          </form>


    </ul>
   </div>
 </div>
