<?php
try
{
 $conn = new PDO( 'mysql:host=<HOST>;dbname=msg_db', '<USER>', '<PASSWORD>');

}
catch (PDOException $e){
    echo $e->getMessage();
}

?>
