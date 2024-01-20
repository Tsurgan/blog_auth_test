<?php
require_once "config.php";
require_once "session.php";
	try {
		$header = trim($_POST['header']);
		$auth_id = $_SESSION['userid'];
		$theme = trim($_POST['theme']);
		$body = trim($_POST['body']);


		$stmt = $conn->prepare("INSERT INTO posts (header,auth_id,theme,body) VALUES (?,?,?,?)");

        $stmt->execute([$header,$auth_id,$theme,$body]);

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        print "Сообщение успешно отправлено.";
        header("Location: messages.php");
        exit;








	} catch (PDOException $e) {

    		echo "Error: " . $e->getMessage();

	}
?>
