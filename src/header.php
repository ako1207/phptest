<link rel="stylesheet" type="text/css" href="css/style.css">
<h1>
<a href="index.php" class="title">書籍管理アプリ</a>
</h1>	
<form action="index.php" method="get">
書籍名
 <input type="text" name="bookname"　value="<?php 
 if(isset($_SERVER['REQUEST_METHOD'])){
 	echo $_GET['bookname'];
 	} 
 ?>">
 <input type="submit" value="検索">
</form>
<hr>

