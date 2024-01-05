<?php
$connection=mysqli_connect('localhost','root','','my_expense');
if ($connection) {
    if (isset($_GET['action'])) {

        $action = $_GET['action'];

        switch ($action) {
            case 'insert':
             echo "inserted";
             break;
            case 'edit':

            case 'update':

            case 'delete':

        }
    }
}else{
    echo 'Error:'.mysqli_connect_error();
}