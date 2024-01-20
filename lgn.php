<?php
require_once "config.php";






	try {




		$login = trim($_POST['login']);
		$pass = trim($_POST['pass']);






		$stmt = $conn->prepare("SELECT * FROM users WHERE login = ?");

		$stmt->execute([$login]);

		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (isset($data[0])){
            if (password_verify($pass, $data[0]['password'])) {
                                session_start();
                                $_SESSION["userid"] = $data[0]['id'];
                                $_SESSION["user"] = $data[0]['name'];
                                echo "Добро пожаловать, ", $_SESSION["user"],"!";


                                 header("Location: messages.php");
                                        exit;

            }
            else {
            print "Неверный логин или пароль";
            }
		}
		else{
		print "Пользователь не найден";
	}









	} catch (PDOException $e) {

    		echo "Error: " . $e->getMessage();

	}




	//


?>
