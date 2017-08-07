<?php
require('config.php');//соединение с базой
?>

  <a href="/guest/admin.php">Админ панель</a><br><br>

  <form method="post" action="index.php">
    Ваше имя:<input type="Text" name="name" value="Pablo"><br>
    E-Mail:<input type="Text" name="email" value="Admin@krivyshin.ru"><br>

    Тип сообщения:<br><select name="topic"><br>
          <option selected="selected" value="vopros">Вопрос</option>
          <option value="jaloba">Жалоба</option>
          <option value="offer">Предложение</option>
    </select><br>

    Ваше сообщение:<br>
    <textarea name=comment cols=45 rows=10 wrap="hard">Привет! Это мое первое сообщение</textarea><br>
    <input type="Submit" name="submit" value="Написать">

  </form>



<?php

//добавление сообщения в базу
if (isset($_POST['submit'])) {

  $name=$_POST['name'];
  $topic=$_POST['topic'];
  $email=$_POST['email'];
  $comment=$_POST['comment'];
  $sql = "INSERT INTO guestbook (name,topic,email,comment) VALUES ('$name','$topic','$email','$comment')";

  $result = mysqli_query($success,$sql);

  if ($result = 'true'){
      echo "Информация занесена в базу данных";
  }
  else{
      echo "Информация НЕ занесена в базу данных";
  }

}
//вывод списка сообщений по теме
$mode="vopros1";
switch ($mode) {
    case "vopros":
        $topic = "vopros";
        break;
    case "jaloba":
        $topic = "jaloba";
        break;
    case "offer":
        $topic = "offer";
        break;
    default:
        //$topic = "vopros or jaloba or offer";
        //$topic = "'vopros' OR topic='jaloba' OR topic='jaloba'";
        $topic = "'vopros' OR `topic` = 'jaloba' OR `topic` = 'offer'";
}

echo '<a href="/guest/index.php">Все сообщения</a> |';
echo '<a href="/guest/index.php?top=vopros">Вопросы</a> |';
echo '<a href="/guest/index.php?top=jaloba">Жалобы</a> |';
echo '<a href="/guest/index.php?top=offer">Предложения</a> |<br><br>';


//echo 'Тема: '.$topic;

if (isset($_GET['top'])) {
  //echo '<br> GET: '. $_GET['top'];
}
else {
  $_GET['top'] = "vopros' OR `topic` = 'jaloba' OR `topic` = 'offer";
}

echo "<table border=2>";
    $sql = "SELECT * FROM guestbook WHERE topic='".$_GET['top']."'";

    //echo '<br> SQL: '.$sql;
    $result = mysqli_query($success, $sql);
    while ($myrow = mysqli_fetch_array($result)) {
      echo "
      <tr><td>".$myrow["id"]."
      </td><td>".$myrow["name"]."
      </td><td>".$myrow["email"]."
      </td><td>".$myrow["comment"];
    }
echo "</table>";

?>