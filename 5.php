
<?php
$link = @mysqli_connect('localhost', 'root', '', 'nevek');

if (isset($_POST['submit'])){
	
	$sql='INSERT INTO `szamok` (`szam`) VALUES ("'.$_POST['szamok'].'")';
	//echo $sql.'<BR>';
	if (mysqli_query($link, $sql)){
		echo 'SIKERES<BR>';
	} else {
		echo 'VALAMI HIBA VAN';
	}
}
if (isset($_GET['del'])){
	$sql='DELETE FROM `szamok` WHERE `szam`="'.$_GET['del'].'"';
//	echo $sql.'<BR>';
	if (mysqli_query($link, $sql)){
		echo 'SIKERES<BR>';
	} else {
		echo 'VALAMI HIBA VAN2';
	}
}


if (isset($_GET['mod'])){
	$query = 'SELECT * FROM `szamok` WHERE `szam` LIKE "'.$_GET['mod'].'"';
	$result = mysqli_query($link, $query);	
	$row=mysqli_fetch_assoc($result);	echo '
<FORM name="form2" action="5.php" method="POST">
Módosítás: <INPUT TYPE="text" name="modosit" value="'.$row['szam'].'"><BR>
<INPUT TYPE="hidden" name="id" value="'.$row['szam'].'"><BR>
<INPUT TYPE="submit" name="mod" value="Módosítás"><BR>
</FORM> ';
}
if (isset($_POST['mod'])){
	$sql='UPDATE `szamok` SET szam="'.$_POST['modosit'].'" WHERE  szam="'.$_POST['id'].'"';
//	echo $sql.'<BR>';
	if (mysqli_query($link, $sql)){
		echo 'SIKERES<BR>';
	} else {
		echo 'VALAMI HIBA VAN2';
	}
}
	$query2 = 'SELECT * FROM `szamok`';
	$result2 = mysqli_query($link, $query2);	
	$row2=mysqli_num_rows($result2);
	echo $row2;
	if ($row2 < 10) {
		echo '<FORM name="form1" action="5.php" method="POST">
Szám: <INPUT TYPE="text" name="szamok"><BR>
<INPUT TYPE="submit" name="submit" value="Elküld"><BR>
</FORM> '; }
if (1>0) {
	$query = 'SELECT * FROM `szamok`';
	$result = mysqli_query($link, $query);
	while ($row=mysqli_fetch_assoc($result)){
		echo $row['szam'].' - <a href="?del='.$row['szam'].'">Törlés</a> <a href="?mod='.$row['szam'].'">Módosítás</a> |';
}}
	$query2 = 'SELECT * FROM `szamok`';
	$result2 = mysqli_query($link, $query2);
	while ($row2=mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
	$asd=implode($row2);
	//echo $asd;
	foreach (count_chars($asd, 1) as $i => $val) {
   echo "<br>", chr($i) ,": $val ";
   }
	}

	
	




	
mysqli_close($link);
?>
