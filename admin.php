<html>
<body>
<p>Админ панель гостевой книги</p>
<?php
require('config.php');

if (isset($_GET['del'])) {

    $id=$_GET['del'];
    $sql = "DELETE FROM guestbook WHERE id=$id";	

    $result = mysqli_query($success,$sql);

    echo "Запись удалена! <a href='/'>Вернуться</a>";

} else {

 
echo "<table border=2>";
    $result = mysqli_query($success, "SELECT * FROM guestbook");

    while ($myrow = mysqli_fetch_array($result)) {

      echo "
      <tr><td>".$myrow["id"]."
      </td><td>".$myrow["topic"]."
      </td><td>".$myrow["name"]."
      </td><td>".$myrow["email"]."
      </td><td>".$myrow["comment"]."
      </td><td><a href=admin.php?del=".$myrow['id'].">(Удалить)</a> </td>";



    }
echo "</table>";
}

?>
</body>
</html>