<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Visualizar registros</title>
    <style>
           h1 {
        text-align: center;
        color: #ffffff;
        margin-top: 50px;
    }

    table {
        margin: 20px auto;
        border-collapse: collapse;
        width: 80%;
        max-width: 800px;
        background-color: #ffffff;
        color: #333333;
        border-radius: 5px;
    }

    th {
        background-color: #4caf50;
        color: #ffffff;
        font-weight: bold;
        padding: 10px;
    }

    td {
        padding: 10px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    a {
        color: #2196f3;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .add-button {
        display: block;
        width: 150px;
        margin: 20px auto;
        padding: 10px;
        background-color: #4caf50;
        color: #ffffff;
        text-align: center;
        text-decoration: none;
        border-radius: 3px;
        font-size: 16px;
        font-weight: bold;
    }

    .add-button:hover {
        background-color: #45a049;
    }

    .confirm-delete {
        color: #ff0000;
        font-weight: bold;
    }
</style>

</head>
<body>
<?php
    include_once '../Controller/ControllerUser.php';
    $userController = new ControllerUser();
    $users = $userController->viewUser();
    ?>
    <h2 size = "1" style="font-family: Verdana, Arial, Helvetica, sans-serif;"> Adicionar Novo Modelo</h2>
    <button size = "1" style="font-family: Verdana, Arial, Helvetica, sans-serif;" class="styled-button"
    onclick="window,location.href='add-user.php'">Adicionar Novo Tênis</button>
    <br>
    <br>

    <table width='80%' border=0 align='center'>
    <tr bgcolor='#CCCCCC'>
        <td>
            <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Código</strong></font>
        </td>
        <td>
            <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Marca</strong></font>
        </td>
        <td>
            <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Tamanho</strong></font>
        </td>
        <td>
            <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Modelo</strong></font>
        </td>
        <td>
            <font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Ações</strong></font>
        </td>
    </tr>
<?php
foreach ($users as $user) {
    echo "<tr>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $user['id'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $user['marca'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $user['size'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''>" . $user['modelo'] . "</td>";
    echo "<td size='1' style='font-family: Verdana, Arial, Helvetica, sans-serif;''><a href=\"edit-user.php?id={$user['id']}\">Editar</a> | <a href=\"delete-user.php?id={$user['id']}\" onClick=\"return confirm('Tem certeza que deseja excluir?')\">Excluir</a> 
    </a></a></td>"; 
    

}
?>
</table>
</body>
</html>