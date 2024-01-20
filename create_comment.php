<?php
   $post_id = $_POST['post_id'];
?>


<html>

<body>

<form action="add_comment.php" method="post">
    <div>
       <input type="hidden" name="post_id" value="<?= $post_id ?>" />
    </div>
    <div>
        <label for="header">Заголовок:</label>
        <input type="text" name="header" required>
    </div>
    <div>
        <label for="body">Полное содержание:</label>
        <textarea name="body" rows="4" cols="50" required></textarea>
    </div>
    <div>
        <input type="submit" value="Отправить">
    </div>
</form>

</body>
</html>

