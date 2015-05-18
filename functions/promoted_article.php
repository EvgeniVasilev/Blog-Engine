<?php function prometd_article($sql)
{
	require_once 'db.php';
	
	$result = $mysqli->query($sql) or die($mysqli->error);
    $row = $result->fetch_array(MYSQLI_ASSOC);
	
    echo "<b>Автор: " . 'Администратор' . "</b>\n" . "</br>\n";
    echo "<b>Заглавие: " . $row["article_header"] . "</b><br/>\n";
    echo "<b>Публикувано на: " . $row["published"] . "</b></br></br>\n";
    echo $row["article_body"];
    echo "<br/>";   

}