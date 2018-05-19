<?php
  if(isset($_POST["title"])){
     $category_name = $_POST["title"];
     addCategory($category_name);
  }
?>

<h2 class="header">KATEGORİ EKLE</h2>
 <div class="quick-press">
   <form action="" method="post">
     <input type="text" name="title" placeholder="kategori adi"/>
     <button type="submit" class="submit" name="submit">EKLE</button>
   </form>
 </div>
