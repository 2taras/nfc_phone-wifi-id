<?php
define("PASSWORD","password123");
if(isset($_POST['remlog'])){file_put_contents("card_nfc.txt","");}
if(isset($_GET['ajax'])){$pass = file_get_contents("card_nfc.txt");$table = explode(";",$pass);$all = array();if($pass==""){$table=array();}echo "<ul>";foreach(array_reverse($table) as $el => $r){echo "<li>".$r."</li>";}echo "</ul>"; exit;}
if($_COOKIE['passcard'] != hash("sha512",PASSWORD))
{
	if(isset($_POST['wordpass'])){setcookie("passcard", hash("sha512",($_POST['wordpass'])), time()+(60*60*24*7));header("Refresh:0");}?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
  "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Я не знаю пароль...</title>
 </head>
 <body>

 <h1>Вход</h1>
<form action="set_card_id.php" method="post">
 <p>Пароль: <input type="text" name="wordpass" /></p>
 <p><input type="submit" /></p>
</form>

 </body>
</html>
<?php
exit();
}
$pass = file_get_contents("card_id.txt");
$table = explode(";",$pass);
for($i = 0;$i<count($table);$i++){
	if(isset($_POST[$i])){$a = True;}
}
if(isset($_FILES['download'])){move_uploaded_file($_FILES['download']['tmp_name'], 'D:\OpenServer\domains\548b.ru\card_id.txt');header('Refresh:0');}
if(!isset($_POST['add_id']) and !isset($a)){echo '
<head>
<style>
nav ul{height:50%; width:18%;}
nav ul{overflow:hidden; overflow-y:scroll;}
div ul{height:50%; width:18%;}
div ul{overflow:hidden; overflow-y:scroll;}
</style>
</head>';}
function html_table($data = array()){ $rows = array(); foreach ($data as $row) { $cells = array(); foreach ($row as $cell) { $cells[] = "<td>{$cell}</td>"; } $rows[] = "<tr>" . implode('', $cells) . "<tr>"; } return "<table border='1' class='hci-table'>" . implode('', $rows) . "</table>";}
$pass = file_get_contents("card_id.txt"); 
$table = explode(";",$pass);
$all = array();
if(True){
	$pass = file_get_contents("card_id.txt");
	$table = explode(";",$pass);
	for($i = 0;$i<count($table);$i++){
		if(isset($_POST[$i])){array_splice($table, (int)$i, 1);$pass = implode(';',$table);header('Refresh:0');}
	}
	file_put_contents("card_id.txt",$pass);
}
if($pass==""){$table=array();}
foreach($table as $el => $r){
	if(False){$res = array((String)$el => (String)$r, $el+1 => '<p>Admin</p>');goto a;}
	$res = array((String)$el => (String)$r, $el+1 => '<input type="submit" value="Удалить" name="'. $el .'">');
	a:
	$all[$el] = $res;
}
if(isset($_POST['add_id'])){$pass = file_get_contents("card_id.txt"); if($pass!=""){$pass = $pass .';'. $_POST['add_id'];}else{$pass = $pass . $_POST['add_id'];} file_put_contents("card_id.txt",$pass);header("Refresh:0");}
echo '<div id="tab"><form name="ides" method="post" action="set_card_id.php">'.html_table($all).'</form></div>';?>
<p>
<form name="card" method="post" action="set_card_id.php">
Добавить карту id:
<input border="5" type="number" name="add_id">
<input type="submit">
</form>
</p>
<p>
<form enctype="multipart/form-data" action="" method="POST">
    <input name="download" type="file" />
    <input type="submit" value="Импорт(txt)" /> Формат - знач1:знач2:знач3(7878:67676:56565)
</form>
</p>
<p>(Incorrect login)Log:
<p id=axar></p>
<div id="logdiv">
<nav>
<?php
$pass = file_get_contents("card_nfc.txt"); 
$table = explode(";",$pass);
$all = array();
if($pass==""){$table=array();}
echo "<ul>";
foreach(array_reverse($table) as $el => $r){
echo "<li>".$r."</li>";
}
echo "</ul>";
?>
</nav>
</div>
</p>
<form method="POST">
    <input type="submit" name="remlog" value="Очистить лог" />
</form>
<script>
function work(){
document.getElementById("axar").innerHTML = "AJAX: Requesting";
document.getElementById("axar").style.color = "#1A5276";
var xhr = new XMLHttpRequest();

xhr.open('GET', 'set_card_id.php?ajax', false);
xhr.send(); // (1)

// 4. Если код ответа сервера не 200, то это ошибка
if (xhr.status != 200) {
	document.getElementById("axar").innerHTML = "AJAX: Error";
	document.getElementById("axar").style.color = "#7B241C";
  // обработать ошибку
  alert( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
} else {
	document.getElementById("axar").innerHTML = "AJAX: Done";
	document.getElementById("axar").style.color = "#196F3D";
  // вывести результат
  document.getElementById("logdiv").innerHTML = xhr.responseText;
}
 document.getElementById("axar").innerHTML = "AJAX: Wait";
 document.getElementById("axar").style.color = "#8BBF00";
}
let timerId = setInterval(() => work(), 700);
</script>