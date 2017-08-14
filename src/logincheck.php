<?php 
	$dsn = 'mysql:host=localhost;dbname=ps3gbook;charset=utf8;';
		$user = 'root';
		$password = '';
		$id=$_POST['userid'];
		$loginPass=$_POST['pass'];

		try {
			//インスタンスを起動し、データベースハンドラに代入
			$dbh=new PDO($dsn,$user,$password);
			//エラーの場合Exceptionをだす
			$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);



			//SQL実行
			$stmt=$dbh->prepare("select * from user where id = ? AND password = ?");
			
			//bind時
			$stmt->bindParam(1,$id,PDO::PARAM_INT);
			$stmt->bindParam(2,$loginPass,PDO::PARAM_STR);
			$stmt->execute();
			$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($user as $value) {
				if ($value['id']==$id && $value['password']==$loginPass ) {
					# code...
					header('Location:index.php');
					exit();
				}
			}

			echo "エラー";
		} catch (Exception $e) {
			//例外発生時
			echo 'Connection failed:'.$e->getMessage();
			$dbh->rollback();
			exit();
		}











 ?>