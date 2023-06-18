<!DOCTYPE html> 
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title id="lista-registros"> Lista de registros </title>
        <link rel="stylesheet" href="datos.css">
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "root";
        $bdpassword = "";
        $dbname = "registros";

        //Conexión

        $conn = new mysqli($servername, $username , $bdpassword , $dbname);

        //Verificar 

        if($conn->connect_error) {
            die("Fallo la conexión:" . $conn->connect_error);
        }
        $sql = "SELECT * FROM formulario";
        $result = $conn->query($sql);
        //Mostrar lista de registros

        if($result->num_rows > 0) {
            echo "<h1> Lista de usuarios registrados </h1>";
            echo "<table>";
            echo "<tr id=campos><th> Nombre </th> <th> Primer apellido </th> <th> Segundo apellido </th> <th> Email </th> <th> Login </th>";


            while ($row = $result->fetch_assoc()) {

                echo "<tr id=datostabla>";
                echo "<td>" . $row['Nombre'] .  "</td>";
                echo "<td>" . $row['Primer_Apellido'] . "</td>";
                echo "<td>" . $row['Segundo_Apellido'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>". $row['Login'] . "</td>";    
                echo "</tr>";
            }
            echo "</table>";
            echo '<a href="index.php" id=back> Volver al formulario </a>';
        } else {
            echo "<h2>No hay usuarios registrados </h2>";
        }

        $conn->close();
        ?>
    </body>
    </html>