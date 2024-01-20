<?php
try
{
 $conn = new PDO( 'mysql:host=localhost;dbname=msg_db', 'root', '');

}
catch (PDOException $e){
    echo $e->getMessage();
}

?>
