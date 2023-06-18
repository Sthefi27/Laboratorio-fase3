<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE= edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title> Formulario </title>
    </head>
    <body>
        <form method="POST" action="" id="formulario">
            <h1> <em> Escriba sus datos </em> </h1>
        <div id="form-group" class="form-group">
            
            <label for="nombre" class="datos"> Nombre </label>
            <input type="text" id="nombre" name="nombre" class="form-input" required />

            <label for="primerApellido" class="datos"> Primer apellido </label>
            <input type="text" id= "primerApellido" name="primerApellido" class="form-input" required />

            <label for="segundoApellido" class="datos"> Segundo apellido </label>
            <input type="text" id= "segundoApellido" name="segundoApellido" class="form-input" required id="input"/>

            <label for="email" class="datos"> Email </label>
            <input type="email" id="email" name="email" class="form-input" required />

            <label for="login" class="datos"> Login </label>
            <input type="text" id="login" name="login" class="form-input" required />

            <label for="password" class="datos"> Password </label>
            <input type="password" id="password" name="password" class="form-input" required />

            <input type="submit" name="submit" class="boton-form" value="Enviar datos">
        
            <?php
            
            if($_POST){

            //datos
            $nombre = $_POST["nombre"];
            $primerApellido = $_POST["primerApellido"];
            $segundoApellido = $_POST["segundoApellido"];
            $email = $_POST["email"];
            $login = $_POST["login"];
            $password = $_POST["password"];

            //conexion con la base de datos

            $servername = "localhost";
            $username = "root";
            $dbpassword = "";
            $dbname = "registros";

            //Validar datos

            if (empty($nombre) || empty($primerApellido) || empty($segundoApellido) || empty($email) || empty($login) || empty($password)) {
                
                echo "Rellene todos los campos";

            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                echo "El email no es válido";

            } else if (strlen($password) < 4 || strlen ($password) > 8) {

                echo "La contraseña debe tener entre 4 y 8 caracteres";

            } else {
                
                //conexión

                $conn = new  mysqli($servername, $username, $dbpassword, $dbname);
                
                //check conexion 

            if ($conn->connect_error) {
                die("Conexión fallida :" . $conn->connect_error);

            }
          
                //Error de email registrado

                $sql = "SELECT * FROM formulario WHERE Email='$email'";
                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                    echo "El email ya está registrado. Inserte un nuevo email";
                    echo '<a href="index.php" id="regresar"> Volver al formulario </a>';                
                } else {
                    $sql = "INSERT INTO formulario (Nombre , Primer_Apellido , Segundo_Apellido, Email, Login , password) VALUES ('$nombre' , '$primerApellido' , '$segundoApellido' , '$email' , '$login' , '$password')";
                    if($conn->query($sql) === true) {
                        echo "Registro completado con éxito";
                        echo '<a href = "lista.php" id="datos"> Consulta </a>';
                    } else {
                        echo "Error al registrar los datos:" . $conn->error;
                    }
                } 

                $conn->close();
            }   
        }
            ?>
           
        
        </form>
    </div>
    <script src="main.js"></script>
    </body>
</html>