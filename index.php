<!DOCTYPE html>
<html lang="en">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "xilakicks";
$conn = NEW mysqli($servername, $username, $password, $database);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

  
<div class="card">
<?php
$qry = mysqli_query($conn,"SELECT * FROM images");
while ($row = mysqli_fetch_array($qry))
{
    echo "<img src=".$row['image_url']." />";
}
?>  
  <h1>Tailored Jeans</h1>
  <p class="price">$19.99</p>
  <p>Some text about the jeans..</p>
</div>



</body>
</html>