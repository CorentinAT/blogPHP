<?php
require "config.php";
require "sql.php";

if(isset($_GET['id']) && (get_article($_GET['id'])['id_user']==$_SESSION['id_user'] || get_user_by_id($_SESSION['id_user'])['admin']==1)) {
  delete_article_from_id($_GET['id']);
}
header("Location: /index.php");
exit(0);
?>