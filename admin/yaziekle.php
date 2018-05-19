<h2 class="header">YAZI EKLE</h2>
 <div class="quick-press">
   <form action="" method="post" enctype="multipart/form-data">
     <input type="text" name="title" placeholder="Başlık giriniz"/>
     <textarea name="content" rows="8" cols="40" placeholder="Açıklama giriniz"></textarea>
     <br>
     <input type="file" name="fileToUpload" accept=".png,.jpg,.gif,.jpeg"/>
     <br>
     <br>
     <select class="" name="kategori">
       <?php
         foreach (categoryList() as $category) {
           echo '<option value="'.$category["category_id"].'">'.$category["category_name"].'</option>';
         }
        ?>
     </select>
     <button type="submit" class="submit" name="submit">KAYDET</button>
   </form>
 </div>

 <?php
  if(isset($_POST["title"])){

    $title = $_POST["title"];
    $content = $_POST["content"];
    $kategori = $_POST["kategori"];

    $uploadOk = 1;
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if ($imageFileType == 'php' || $imageFileType == 'php3' || $imageFileType == 'php4' || $imageFileType == 'php5') {
      echo "Dosya resim değil.";
      $uploadOk = 0;
    } else {
      $uploadOk = 1;
    }

    if(empty($title) || empty($content) || empty($kategori)){
      echo "Başık içerik ve kategori boş geçilemez. <br>";
    } else {
      if (file_exists($target_file)) {
          echo "Dosya mevcut.<br>";
          $uploadOk = 0;
      }
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Dosya çok büyük.<br>";
          $uploadOk = 0;
      }
      if ($uploadOk == 0) {
          echo "Dosya yüklenemedi ve yazı oluşturulamadı.";
      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              echo "Dosya ". basename( $_FILES["fileToUpload"]["name"]). " başarıyla yüklendi.";
              addPost($title,$content,basename($_FILES["fileToUpload"]["name"]),$kategori);
          } else {
              echo "Dosya yüklenirken hata oluştu.";
          }
      }
    }
  }
?>
