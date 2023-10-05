<?php
require "config.php";
require "sql.php";

if(isset($_GET['id']) && (get_article($_GET['id'])['id_user']==$_SESSION['id_user'] || $_SESSION['is_admin']==1)) {
  delete_article_from_id($_GET['id']);
}
header("Location: /index.php");
exit(0);
?>