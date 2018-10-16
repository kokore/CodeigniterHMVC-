<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show data</title>
</head>
<body>
<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>No</th>
    <th>Username</th>
    <th>Password</th>
    <th>E-mail</th>
  </tr>
  <?php
  $i=1;
  foreach($data as $row)
  {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$row->user_name."</td>";
  echo "<td>".$row->user_password."</td>";
  echo "<td>".$row->user_email."</td>";
  echo "</tr>";
  $i++;
  }
   ?>
</body>
</html>