<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos_marca.css">
    
    <title>Adicionar Marca</title>
<style>
    <?php include "estilos_marca.css" ?>

    @media screen and (max-width: 600px) 
{
                    .topnav a:not(:first-child), .dropdown .dropbtn {
                        display: none;
                    }
                    .headerrigth a{
                        display: none;
                    }

                    .topnav a.icon {
                        float: right;
                        display: block;
                    }
                   
}

@media screen and (max-width: 600px) 
{
                    .topnav.responsive {position: fixed;}
                    .topnav.responsive .icon {
                        position: absolute;
                        right: 0;
                        top: 0;
                }
                .topnav.responsive a {
                    float: none;
                    display: block;
                    text-align: left;
                }
               
                .topnav.responsive .dropdown {float: none;}
                .topnav.responsive .dropdown-content {position: relative;}
                .topnav.responsive .dropdown .dropbtn {
                    display: block;
                    width: 100%;
                    text-align: left;
                }
               
                .headerrigth{
                    position: relative;
                    display: block;
                    width: 100%;
                    float: none;
                }
               
}

</style>  

</head>

<body>
<div class="row">
    <div class="topnav" id="myTopnav">
    <a href="home.php">XilaKicks</a>
		<a href="input_marca.php">Adicionar Marca</a>
		<a href="input_sneakers.php">Adicionar Sneakers</a>
        <a href="show_sneakers.php">Mostrar Sneakers</a>
        <a href="#vendas">Efetuar Vendas</a>
        <a style="float: right;display:block;" href="reset-password.php">Perfil</a>
        <a style="float: right;display:block;" href="logout.php">Logout</a>
        <!-- Para quando estiver no mobile a navbar ficar responsiva -->
        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="Menu_Mobile()">&#9776;</a>
    </div>
</div>
<br>
<br>

<script>
                function Menu_Mobile() {
                    var x = document.getElementById("myTopnav");
                    if (x.className === "topnav") {
                        x.className += " responsive";
                    } else {
                        x.className = "topnav";
                    }
                }
</script>


<div class="col-12 col-s-12">
    <div style="margin: 20px;border: 20px;">
        <form action="insert_marca.php" method="post">
        <h3 style="font-size: 25px;">Inserir Marca</h3>
        <label for="Marca">Marca:</label>
        <input type="text" placeholder="Nome da Marca..." name="nomemarca" id="nome_marca"> 
        </br><br>
        <input type="submit" value="Inserir Marca" class="submit" name="submit" id="submit">   
        </form>
    </div>
</div>


<?php
//Connection for database
include 'dbconn.php';
$sql = "SELECT * FROM marcas";
$result = $conn->query($sql);
?>

<div class="col-12 col-s-12" style="margin: 20px;border: 20px;">
<h3 style="text-align: center;font-family: 'Courier New', Courier, monospace;">Marcas Existentes</h3>
<table border="1" align="center" style="line-height:25px;font-family: 'Courier New', Courier, monospace;">
<link rel="stylesheet" type="text/css" href="estilos_showsneakers.css">
<tr>
<th width="50%">ID</th>
<th width="50%">Marca</th>
</tr>


<?php
//Fetch Data form database
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		?>
		<tr style="text-align: center;">
        <td style="text-align: center;"><?php echo $row['ID']; ?></td>
        <td style="text-align: center;"><?php echo $row['Marca']; ?></td>
        </tr>
        <?php
	}
}
else
{
	?>
	<tr>
    <th colspan="2">Detalhes não encontrados!!!</th>
    </tr>
    <?php
}
?>
</table>


</div>

<!-- Footer e Info-->
</div>
<hr style="width:90%;">
</div>
<div class="footer">
	<p style="color:black;text-align:center;font-size:1em;">Copyright © 2021 EmpDrive.<br> All rights reserved.</p>
</div>
</body>

</html>