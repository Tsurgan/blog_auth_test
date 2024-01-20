<?php
try
{
 $conn = new PDO( 'mysql:host=<HOST>;dbname=<DBNAME>', '<USER>', '<PASSWORD>');

}
catch (PDOException $e){
    echo $e->getMessage();
}

?>
