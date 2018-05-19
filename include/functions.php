<?php

function homePagePostListData() {
  include("settings.php");
  // vuraya erdem bey bır pagınator ayarlar :) hemde oraya belkı sql ı atar :D
  $query = "SELECT * FROM posts";
  $statement = $db -> prepare($query);
  $statement -> execute();
  $statement -> setFetchMode(PDO::FETCH_CLASS, 'posts');
  $posts = $statement -> fetchAll();

  return $posts;
}

function addPost($title,$text,$target_file,$category_id) {
  include("settings.php");

    $post = $db->prepare('INSERT INTO posts (title, text, category_id, user_id, photo_path) values(?,?,?,?,?)');
    $post->execute(array($title, $text, $category_id, 1, $target_file));

  return 1;
}

function postDelete($post_id) {
  include("settings.php");

  $query = $db->prepare("DELETE FROM posts WHERE post_id = ?");
  $delete = $query->execute(array($post_id));
  return 1;
}

function postData($id) {
  include("settings.php");

  $query = "SELECT * FROM posts JOIN users ON users.user_id = posts.user_id where posts.post_id=?";
  $statement = $db -> prepare($query);
  $statement -> execute(array($id));
  $statement -> setFetchMode(PDO::FETCH_CLASS, 'posts');
  $post = $statement -> fetchAll();

  if ($post) {
    return $post[0];
  }else {
    return 0;
  }
}

function homePageDom() {
  include("settings.php");

  $homedata = homePagePostListData();

  foreach ($homedata as $key => $value) {
    ?>
      <div class="post">
        <!-- Blog Post -->
        <h2>
            <a href="post.php?id=<?= $value["post_id"] ?>"><?= $value["title"] ?></a>
        </h2>
        <hr>
        <?php
          if ($value["photo_path"] != "") {
            echo '<img class="img-responsive" src="uploads/'.$value["photo_path"].'" alt="">';
          }
         ?>
        <hr>
        <p><?= substr($value["text"], 0, 250); ?>...</p>
        <a class="btn btn-primary" href="post.php?id=<?= $value["post_id"]?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
      </div>
    <?php
  }
}

function comments() {
  include("settings.php");

  $query = "SELECT * FROM comments";
  $statement = $db -> prepare($query);
  $statement -> execute();
  $statement -> setFetchMode(PDO::FETCH_CLASS, 'comments');
  $posts = $statement -> fetchAll();

  return $posts;
}


function commentsData($post_id) {
  include("settings.php");

  $query = "SELECT * FROM comments where post_id = $post_id";
  $statement = $db -> prepare($query);
  $statement -> execute();
  $statement -> setFetchMode(PDO::FETCH_CLASS, 'comments');
  $posts = $statement -> fetchAll();

  return $posts;
}

function commentDom($post_id) {
  $comment_data = commentsData($post_id);
    foreach ($comment_data as $key => $value) {
  ?>
  <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" width="100" src="uploads/cypwn.png" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?= $value["comment_username"]; ?>
                <small><?= $value["comment_created_at"]; ?></small>
            </h4>
            <?= $value["comment_text"]; ?>
        </div>
    </div>

    <?php
    }
}

function addComment($c_username, $c_email, $c_text, $post_id) {
  include("settings.php");
  // buraya kontrol ekler mıyız bılmıyorum eklıcek olursak buraya eklıcez :D
  $comment = $db->prepare('INSERT INTO comments (comment_username, comment_email, comment_text, post_id) values(?,?,?,?)');
  $comment->execute(array($c_username, $c_email, $c_text, $post_id));
  if ($comment) {
    echo "Yorum eklendi";
    return 1;
  }else {
    echo "Hata oldu :(";
    return 0;
  }
}

function deleteComment($comment_id) {
  include("settings.php");

  $query = $db->prepare("DELETE FROM comments WHERE comment_id = $comment_id"); // sql inj var tüm yorumlar silinebilir :)
  $delete = $query->execute();
  return 1;
}

// category name category id
function addCategory($category_name) {
  include("settings.php");

  $category = $db->prepare('INSERT INTO categories Set category_name = ?');
  $category -> execute(array($category_name));

  if ($category) {
    echo "Kategori eklendi";
    return 1;
  }else {
    echo "Hata oldu :(";
    return 0;
  }
}

function deleteCategory($category_id) {
  include("settings.php");

  $query = $db->prepare("DELETE FROM categories WHERE category_id = ?");
  $delete = $query->execute(array($category_id));
  return 1;
}



function categoryList() {
  include("settings.php");

  $query = "SELECT * FROM categories";
  $statement = $db -> prepare($query);
  $statement -> execute();
  $statement -> setFetchMode(PDO::FETCH_CLASS, 'comments');
  $posts = $statement -> fetchAll();

  return $posts;
}



// verilen kategori adına göre o kategoride ki post datasını dödürecek
function categories() {
  include("settings.php");

  // getten name alırsak burayı açınca çalışacak hazırladım.
  // // find category id
  // $category_id = $db-> prepare("SELECT category_id FROM categories where category_name = ? ");
  // $id = $category_id -> execute(array($category_name));

  $query = $db->prepare("SELECT * FROM categories"); // sql inj payload = > 1 or 1=1 tırnak falan yok
  $query -> execute();
  $query -> setFetchMode(PDO::FETCH_CLASS, 'categories');
  $category = $query -> fetchAll();

  return $category;
}

// verilen kategori adına göre o kategoride ki post datasını dödürecek
function categoryData($id) {
  include("settings.php");

  // getten name alırsak burayı açınca çalışacak hazırladım.
  // // find category id
  // $category_id = $db-> prepare("SELECT category_id FROM categories where category_name = ? ");
  // $id = $category_id -> execute(array($category_name));

  $query = $db->prepare("SELECT * FROM posts where category_id = $id"); // sql inj payload = > 1 or 1=1 tırnak falan yok
  $query -> execute();
  $query -> setFetchMode(PDO::FETCH_CLASS, 'posts');
  $posts = $query -> fetchAll();

  return $posts;
}

// list for category page
function categoryListDom($id) {
  include("settings.php");

  $catdata = categoryData($id);

  foreach ($catdata as $key => $value) {
    ?>
      <div class="post">
        <!-- Blog Post -->
        <h2>
            <a href="post.php?id=<?= $value["post_id"] ?>"><?= $value["title"] ?></a>
        </h2>
        <hr>
        <?php
          if ($value["photo_path"] != "") {
            echo '<img class="img-responsive" src="uploads/'.$value["photo_path"].'" alt="">';
          }
         ?>

        <hr>
        <p><?= substr($value["text"], 0, 250); ?>...</p>
        <a class="btn btn-primary" href="post.php?id=<?= $value["post_id"]?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
      </div>
    <?php
  }
}


function search($key) {
  include("settings.php");
  // arama yapıcak

  $engelle = array('alert','prompt','img','div','script','textarea','svg','iframe');
  $temizle = str_replace($engelle, '', $key);
  $key = $temizle;
  echo "\n<br>ARAMA SONUCU  : ".$key;

  $query = "SELECT * FROM posts WHERE title LIKE '%".$key."%' ";
  $statement = $db -> prepare($query);
  $statement -> execute();
  $statement -> setFetchMode(PDO::FETCH_CLASS, 'posts');
  $posts = $statement -> fetchAll();

  return $posts;
}


function searchPageDom($key) {
  include("settings.php");

  $homedata = search($key);

  foreach ($homedata as $key => $value) {
    ?>
      <div class="post">
        <!-- Blog Post -->
        <h2>
            <a href="post.php?id=<?= $value["post_id"] ?>"><?= $value["title"] ?></a>
        </h2>
        <hr>
        <img class="img-responsive" src="900x300.png" alt="">
        <hr>
        <p><?= substr($value["text"], 0, 250); ?>...</p>
        <a class="btn btn-primary" href="post.php?id=<?= $value["post_id"]?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
      </div>
    <?php
  }
}

function login($username, $password) {
  include("settings.php");

  $query = $db->prepare("SELECT * FROM users WHERE username= ? && password=?");
  $query->execute(array($username, $password));

  return $query->rowCount();
}


?>
