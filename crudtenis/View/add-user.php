<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Usuário</title>
    <style>
        body {
            background: gray;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        form {
            width: 588px;
            margin: 0 auto;
            padding-top: 50px;
        }

        h1 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            color: #ffffff;
        }

        td {
            padding: 5px;
        }

        input[type="text"], input[type="submit"], button[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 3px;
            font-size: 14px;
        }

        input[type="submit"], button[type="submit"] {
            background-color: #4caf50;
            color: #ffffff;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"] {
            background-color: #2196f3;
            margin-left: 10px;
        }

        input[type="submit"]:hover, button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
    include_once '../controller/ControllerUser.php';
    $userController = new ControllerUser();

    if (isset($_POST['submit'])) {
        $userController->addUser();
    }
    ?>

    <form method="post" name="form1" action="">
        <h1>SNEAKERS - INCLUIR REGISTRO</h1>
        <table>
            <tr>
                <td>Marca:</td>
                <td>
                    <input name="marca" type="text" class="formbutton" id="marca" size="52" maxlength="150">
                </td>
            </tr>
            <tr>
                <td>Tamanho:</td>
                <td>
                    <input name="tamanho" type="text" id="tamanho" size="05" maxlength="150" class="formbutton">
                </td>
            </tr>
            <tr>
                <td>Modelo:</td>
                <td>
                    <input name="modelo" type="text" id="modelo" class="formbutton">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Cadastrar">
                    <button type="submit" formaction="../View/view-users.php">Consultar</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
