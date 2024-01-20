<?php
require_once "config.php";
require_once "session.php";
	try {
		$header = trim($_POST['header']);
		$name = trim($_POST['name']);
        $post_id = $_POST['post_id'];
		$body = trim($_POST['body']);
        $auth_id = $_SESSION['userid'];



		$stmt = $conn->prepare("INSERT INTO comments (header,post_id,auth_id,body) VALUES (?,?,?,?)");

        $stmt->execute([$header,$post_id,$auth_id,$body]);

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        print "Сообщение успешно отправлено.";
        header("Location: single_post.php?post_id=".$post_id);
        exit;







	} catch (PDOException $e) {

    		echo "Error: " . $e->getMessage();

	}
?>
