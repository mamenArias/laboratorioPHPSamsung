<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica PHP Formulario</title>
    <link href='style.css' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class='group'>
        <form method='POST' action=''> <!--Se queda vacío porque todo se va a realizar dentro de esta misma clase de php-->
            <h2>Formulario de registro:</h2>
            <label for='nombre'>Nombre <span><em>(Requerido)</em></span></label><br/>
            <input id='nombre' type='text' name='nombre' class='form-input' required/><br/>

            <label for='apellido'>Apellido <span><em>(Requerido)</em></span></label><br/>
            <input id='apellido' type='text' name='apellido' class='form-input' required/><br/>

            <label for='email'>Email <span><em>(Requerido)</em></span></label><br/>
            <input id='email' type='email' name='email' class='form-input' required/><br/>

            <input class='form-btn' name='submit' type='submit' value='Suscribirse'/><br/>

            <?php
                if ($_POST){
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $email = $_POST['email'];

                    $servername = 'localhost';
                    $username = 'root';
                    $password = '';
                    $dbname = 'laboratoriosql';

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error){
                        die('Connection failed: ' . $conn->connect_error);
                    }

                    $sql = "INSERT INTO usuario (nombre, apellido, email) VALUES ('$nombre', '$apellido', '$email')";

                    if ($conn->query($sql) === TRUE) {
                        echo 'New record created successfully';
                    } else {
                        echo 'Error: ' . $sql . '<br>' . $conn->error;
                    }

                    $conn->close();
                }
            ?>
        </form>
    </div>
</body>
</html>