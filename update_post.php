<?php
require_once "config.php";
	try {
	    $post_id = $_POST['post_id'];
		$header = trim($_POST['header']);
		$theme = trim($_POST['theme']);
		$body = trim($_POST['body']);





		$stmt1 = $conn->prepare("UPDATE posts SET header = ?, theme = ?, body = ? WHERE id = ?");

		$stmt1->execute([$header, $theme, $body, $post_id]);

		$data1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        echo "Сообщение отредактировано." ;
        header("Location: single_post.php?post_id=".$post_id);
        exit;










	} catch (PDOException $e) {

    		echo "Error: " . $e->getMessage();

	}
?>
