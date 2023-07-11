<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editar calçado</title>
    <style>
        body {
            
            font-family: Verdana, Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
        }

        form {
            width: 400px;
            margin: 0 auto;
            margin-top: 50px;
            padding: 20px;
            background-color: gray;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td {
            color: white;
            padding: 5px;
        }

        input[type="text"], input[type="submit"], button[type="submit"] {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            font-size: 14px;
        }

        input[type="submit"], button[type="submit"] {
            background-color: #4caf50;
            color: #ffffff;
            cursor: pointer;
            margin-top: 10px;
        }

        button[type="submit"] {
            background-color: #2196f3;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <?php
    include_once '../Controller/ControllerUser.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $userController = new ControllerUser();
        $user = $userController->getUserById($id);

        if (!$user) {
            echo 'Usuário não encontrado';
            exit;
        }
        if (isset($_POST['submit'])) {
            $marca = $_POST['marca'];
            $size = $_POST['tamanho'];
            $modelo = $_POST['modelo'];

            $userController->updateUser($id, $marca, $size, $modelo);
        }
    } else {
        echo 'ID de usuário não fornecido';
        exit;
    }
    ?>
    <form name="form1" method="post" action="">
        <table>
            <tr>
                <td><strong>Marca</strong></td>
                <td><input type="text" name="marca" value="<?php echo $user['marca']; ?>"></td>
            </tr>
            <tr>    
                <td><strong>Tamanho</strong></td>
                <td><input type="text" name="tamanho" value="<?php echo $user['size']; ?>"></td>
            </tr>
            <tr>
                <td><strong>Modelo</strong></td>
                <td><input type="text" name="modelo" value="<?php echo $user['modelo']; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Atualizar"></td>
                <td><button type="submit" formaction="../View/view-users.php">Voltar</button></td>
            </tr>
        </table>
    </form>
</body>
</html>