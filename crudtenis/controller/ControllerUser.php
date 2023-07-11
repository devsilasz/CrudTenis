<?php
include_once '../Models/Crud.php';
include_once '../Models/Validation.php';

class ControllerUser
{
    private $crud;
    private $validation;

    public function __construct()
    {
        $this->crud = new Crud();
        $this->validation = new Validation();
    }

    public function addUser()
    {
        if (isset($_POST['submit'])) {
            $marca = $this->crud->escape_string($_POST['marca']);
            $size = $this->crud->escape_string($_POST['tamanho']);
            $modelo = $this->crud->escape_string($_POST['modelo']);

            $msg = $this->validation->check_empty($_POST, array('marca', 'tamanho', 'modelo'));
            if (empty($msg)) {
                $query = "CALL AdicionarDados('$marca', '$size', '$modelo')";
                $result = $this->crud->execute($query);

                if (!$result) {
                    // Lidar com erro de inserção
                }

                header("Location: ../view/view-users.php");
                exit();
            }
        }
    }
    
    public function viewUser()
    {
        $query = "SELECT * FROM modelospormarcaview ORDER BY id";
        $result = $this->crud->getData($query);
        return $result;
    }

    public function deleteUser($id)
    {
        $table = 'modelo';
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $this->crud->delete($query);
        if ($result) {
            header("Location: ../View/view-users.php");
            exit();
        }
    }

    public function updateUser($id, $marca, $size, $modelo)
    {
        $id = $this->crud->escape_string($id);
        $marca = $this->crud->escape_string($marca);
        $modelo = $this->crud->escape_string($modelo);
        $size = $this->crud->escape_string($size);
        
        $msg = $this->validation->check_empty($_POST, array('marca', 'tamanho', 'modelo'));
        if (empty($msg)) {
            $query = "UPDATE modelo SET modelo='$modelo' WHERE id=$id";
            $result = $this->crud->execute($query);
    
            $query = "UPDATE marca SET marca='$marca' WHERE id=(SELECT id_marca FROM modelo WHERE id=$id)";
            $result = $this->crud->execute($query);
    
            $query = "UPDATE size SET size='$size' WHERE id=(SELECT id_size FROM modelo WHERE id=$id)";
            $result = $this->crud->execute($query);
    
            if ($result) {
                header("Location: ../View/view-users.php");
                exit();
            }
        }
    }
    
    public function getUserById($id)
    {
        $id = $this->crud->escape_string($id);

        $query = "SELECT * FROM modelo JOIN marca ON modelo.id_marca = marca.id JOIN size ON size.id = modelo.id_size WHERE modelo.id=$id";
        $result = $this->crud->getData($query);

        if (!empty($result)) {
            return $result[0];
        } else {
            return null;
        }
    }

    
}
