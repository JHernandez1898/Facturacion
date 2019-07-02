<?php
require_once("ModeloClientes.php");
include("conexion.php");
$metodo = $_POST["funcion"];
$idCone = conectar();
switch($metodo){
        case "MostrarClientes": 
            $lstClientes = new ListaClientes();
            $Arreglo = $lstClientes ->MostrarClientes();
            echo json_encode($Arreglo);
        break;
        case "AgregarCliente":
            if(isset($_POST["razonsocial"]))$razonsocial = $_POST["razonsocial"];
            if(isset($_POST["taxid"])) $taxid = $_POST["taxid"];
            if(isset($_POST["calle"]))$calle =$_POST["calle"];
            if(isset($_POST["numext"]))$numext = $_POST["numext"];
            if(isset($_POST["numint"]))$numint = $_POST["numint"];
            if(isset($_POST["colonia"])) $colonia = $_POST["colonia"];
            if(isset($_POST["codigop"]))$cp = $_POST["codigop"];
            if(isset($_POST["ciudad"]))$ciudad =$_POST["ciudad"];           
            if(isset($_POST["telefono"]))$telefono = $_POST["telefono"];
            if(isset($_POST["segurosocial"]))$segurosocial = $_POST["segurosocial"];
            if(isset($_POST["correo"])){
                
                $correoelectronico = $_POST["correo"];
             
            }
            if(isset($_POST["ncuenta"]))$cuenta = $_POST["ncuenta"];
            $ruta = $_POST["ruta"];
            $verruta = $_POST["verruta"];
            if($ruta !=$verruta){
                echo "El campo de la ruta bancaria no coincide";
            }else{
                $ar = "@";
                $dot = ".";
                $pos = strpos($correoelectronico,$ar);
                $pos2 = strpos($correoelectronico,$dot);
                if($pos&&$dot){
                     $sql  ="INSERT INTO clientes (RAZONSOCIAL,CALLE,NUMINT, NUMEXT,COLONIA,CP,CIUDAD,NUMTELEFONO,RUTABANCO,NUMEROCUENTA,EMAIL,TAXID,NSEGURO) VALUES ('$razonsocial','$calle','$numint','$numext','$colonia','$cp','$ciudad','$telefono','$ruta','$cuenta','$correoelectronico','$taxid','$segurosocial')";
    
                    $query = mysqli_query($idCone,$sql);
                    if($query){
                        echo "Se agrego al cliente correctamente";
                    }
                    else{
                        echo mysqli_error($idCone)." ".$sql;
                    }
                }
                else{
                    echo "Ingreso un correo electronico invalido";
                }
               
            }
        break;
        case "Eliminar":
            $idcli = $_POST["id"];
            echo $idcli;
            $sql = "DELETE FROM CLIENTES WHERE IDCLIENTE ='".$idcli."'";
            $query = mysqli_query($idCone,$sql);
        if($query){
            echo"Se elimino al cliente correctamente";}
        else{
            echo mysqli_error($idCone);
        }
        break;
    case "BuscarCliente":
           $id = $_POST["id"];
            $lstClientes = new ListaClientes();
            $Arreglo = $lstClientes ->BuscarCliente($id);
            echo json_encode($Arreglo);
        break;
    case "ModificarCliente":
            mysqli_set_charset($idCone,"utf8");
            $id = $_POST["id"];
            $razonsocial = $_POST["razonsocial"];
            $taxid = $_POST["taxid"];
            $calle =$_POST["calle"];
            $numext = $_POST["numext"];
            $numint = $_POST["numint"];
            $colonia = $_POST["colonia"];
            $cp = $_POST["codigop"];
            $ciudad =$_POST["ciudad"];           
            $telefono = $_POST["telefono"];
            $segurosocial = $_POST["segurosocial"];
            $correoelectronico = $_POST["correo"];
            $cuenta = $_POST["ncuenta"];
            $ruta = $_POST["ruta"];
            $verruta = $_POST["verruta"];
            if($ruta !=$verruta){
                echo "El campo de la ruta bancaria no coincide";
            }else{
             
                     $sql  ="UPDATE CLIENTES SET RAZONSOCIAL = '$razonsocial',CALLE = '$calle',NUMINT= '$numint', NUMEXT= '$numext',COLONIA = '$colonia',CP = '$cp',CIUDAD = '$ciudad',NUMTELEFONO= '$telefono',RUTABANCO='$ruta',NUMEROCUENTA='$cuenta',EMAIL='$correoelectronico',TAXID ='$taxid',NSEGURO='$segurosocial' WHERE IDCLIENTE = '$id'";
    
                    $query = mysqli_query($idCone,$sql);
                    if($query){
                        echo "Se modifico al cliente correctamente";
                    }
                    else{
                        echo mysqli_error($idCone)." ".$sql;
                    }
                }
               
               
            
        break;
}
?>