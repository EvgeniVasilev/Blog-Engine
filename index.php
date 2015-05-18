<?php
	require_once ( './includes/header.php');  
	require_once ( './functions/promoted_article.php');
?>
<div class="window">
	 <?php
    if (isset($_SESSION['flasher']))
    {
        echo $_SESSION['flasher'];
    }
    ?>	
	<div class="page-header">
		<h1>
			<small>Последно публикувана статия</small>
		</h1>
	</div>
	<div  id="articles">
		<?php
			$sql='SELECT * FROM articles ORDER BY article_id DESC limit 1' ;
			prometd_article($sql);
		?>
	</div>	
</div>

<?php
	require_once ( './includes/footer.php');
?>