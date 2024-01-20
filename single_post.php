

    <html>
    <a href="messages.php">Назад</a>

    </html>
    <?php
	require_once "config.php";
	require_once "session.php";
	try {

        $post_id = $_GET["post_id"];

        $stmt = $conn->prepare('SELECT p.header, p.theme, p.auth_id, u.name, p.body FROM msg_db.posts AS p INNER JOIN msg_db.users AS u ON p.auth_id = u.id WHERE p.id = ?');
		$stmt->execute([$post_id]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

  		echo '<h2>'.$data['header'].'</h2><b>Краткое содержание: '.$data['theme'].'</b><br>Автор: '.$data['name'].'</b><br>'.$data['body'].'</b><br>';

        if (isset($_SESSION["userid"])) {
           if ($_SESSION["userid"]==$data['auth_id']){
        ?>
        <html>

                  <form action="redact_post.php" method="post">
                  <input type="hidden" name="post_id" value="<?= $post_id ?>" />
                  <input type="submit" value="Редактировать сообщение" />
                  </form>
        </html>
        <?php
        }

        ?>
        <html>
                  <form action="create_comment.php" method="post">
                  <input type="hidden" name="post_id" value="<?= $post_id ?>" />
                  <input type="submit" value="Добавить комментарий" />
                  </form>
        </html>
        <?php

        }

        $stmt1 = $conn->prepare('SELECT c.header, u.name, c.body FROM msg_db.comments AS c INNER JOIN msg_db.users AS u ON c.auth_id = u.id WHERE c.post_id = ?');
		$stmt1->execute([$post_id]);
		$data1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        if ($data1){

        foreach ($data1 as $v){
  		echo '<h2>'.$v['header'].'</h2><br>Автор: '.$v['name'].'</b><br>'.$v['body'].'</b><br>';


		}
		}






	} catch (PDOException $e) {
    		print "Error: " . $e->getMessage();
	}
    ?>
