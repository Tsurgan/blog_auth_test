<?php
require_once "config.php";
	try {
	    $post_id = $_POST["post_id"];






		$stmt1 = $conn->prepare("SELECT header, theme, body FROM posts WHERE id = ?");

		$stmt1->execute([$post_id]);

		$data1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <html>
<form action="update_post.php" method="post">

    <div>
        <input type="hidden" name="post_id" value="<?= $post_id ?>" required>
    </div>
    <div>
        <label for="header">Заголовок:</label>
        <input type="text" name="header" value="<?= $data1[0]['header'] ?>" required>
    </div>
    <div>
        <label for="theme">Краткое содержание:</label>
        <input type="text" name="theme" value="<?= $data1[0]['theme'] ?>" required>
    </div>
    <div>
        <label for="body">Полное содержание:</label>
        <textarea name="body" rows="4" cols="50" required><?= $data1[0]['body'] ?></textarea>
    </div>
    <div>
        <input type="submit" value="Сохранить">
    </div>
</form>


        </html>
        <?php


	} catch (PDOException $e) {

    		echo "Error: " . $e->getMessage();

	}
?>
