<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>myHomePage</title>
	</head>
	<body>
		<h1>deng mam</h1>
		<table border>
			<tr>
				<?php
				echo '<th></th>';
				foreach ($articles[0] as $key=>$article){
				    if($key!='img'){echo "<th>$key</th>";}
				}
				?>
			</tr>
			<?php 
			foreach ($articles as $article){
			     echo '<tr>';
			     echo '<td><img src="'.$article['img'].'"></td>';
			     foreach ($article as $key=>$field){
			         if($key!='img'&&$key!='description'){echo "<td>$field</td>";};       
			     }
			     if(strlen($article['description'])>50){
			         echo '<td>'.substr($article['description'],0,47).'...</td>';
			     }else{
			         echo '<td>'.$article['description'].'</td>';
			     }
			     echo '</tr>';
			}
			?>
		</table>
	</body>
</html>