<?php
require_once "config.php";
require_once "session.php";
	try {
        //if isset true then show create else show login register
        if (isset($_SESSION["userid"])) {
        ?>
        <html>
            <a href="createpost.html">Создать сообщение</a>
            <a href="lgout.php">Выйти</a>
        </html>
        <?php
        }
        else{
        ?>
        <html>
        <a href="login.html">Войти</a>
        <a href="registration.html">Зарегистрироваться</a>
        </html>
        <?php
        }




        //count
        $count = $conn->query('SELECT COUNT(id) FROM posts')->fetchColumn();
        $result_per_page = 1;
        $number_of_page = ceil ($count / $result_per_page);
        //set up pages
        //echo $count;

        if (!isset ($_GET['page']) ) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

        $page_first_result = ($page-1) * $result_per_page;


        //echo $page_first_result,$result_per_page;


		$stmt = $conn->prepare('SELECT id, header, theme FROM posts LIMIT :begin,:end');
		$stmt->bindParam('begin',$page_first_result,PDO::PARAM_INT);
		$stmt->bindParam('end',$result_per_page,PDO::PARAM_INT);
		$stmt->execute();
		$data = $stmt->fetchALl(PDO::FETCH_ASSOC);






		foreach ($data as $v){
		    ?>
		    <html>
		        <form action="single_post.php" method="get">

            </html>
            <?php
  			echo '<h2>'.$v['header'].'</h2><b>Краткое содержание: '.$v['theme'].'</b><br>';
		    ?>
		    <html>
                <input type="hidden" name="post_id" value="<?= $v['id'] ?>" />
                <input type="submit" value="Смотреть полностью..." />
                </form>
            </html>
            <?php

		}


         for($page = 1; $page<= $number_of_page; $page++) {
                echo '<a href = "messages.php?page=' . $page . '">' . $page . ' </a>';
            }



	} catch (PDOException $e) {
    		print "Error: " . $e->getMessage();
	}
?>
