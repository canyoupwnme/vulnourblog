<h2 class="header">YAZİ EKLE</h2>
 <div class="quick-press">
   <form action="" method="post" enctype="multipart/form-data">
     <input type="text" name="title" placeholder="Title"/>
     <!-- <input type="text" name="content" placeholder="Content"/> -->
     <textarea name="content" rows="8" cols="40"></textarea>
     <br>
     <input type="file" name="fileToUpload"/>
     <br>
     <br>
     <select class="" name="kategori">

       <?php

       foreach (categoryList() as $category) {

         echo   ' <option value="'.$category["category_id"].'">'.$category["category_name"].'</option>';

       }

        ?>
       
     </select>
     <button type="submit" class="submit" name="submit">KAYIT</button>
   </form>
 </div>

 <?php

    if(isset($_POST["title"])){

      $title = $_POST["title"];
      $content = $_POST["content"];
      $kategori = $_POST["kategori"];

      if(empty($title) || empty($content) || empty($kategori)){
        echo "aga boş bıraktığın bişeyler var bak";
      }
      else {


        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
         $uploadOk = 1;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        addPost($title,$content,basename($_FILES["fileToUpload"]["name"]),$kategori);

      }


    }



  ?>
