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
                $sql  ="INSERT INTO cliente (RAZONSOCIAL,CALLE,NUMINT, NUMEXT,COLONIA,CP,CIUDAD,NUMTELEFONO,RUTABANCO,NUMEROCUENTA,EMAIL,TAXID,NSEGURO) VALUES ('$razonsocial','$calle','$numint','$numext','$colonia','$cp','$ciudad','$telefono','$ruta','$cuenta','$correoelectronico','$taxid','$segurosocial')";
    
                $query = mysqli_query($idCone,$sql);
                if($query){
                    echo "Se agrego al cliente correctamente";
                }else{
                    echo mysqli_error($idCone)." ".$sql;
                }
            }
        break;
        case "Eliminar":
            $idcli = $_POST["id"];
            echo $idcli;
            $sql = "DELETE FROM CLIENTE WHERE IDCLIENTE ='".$idcli."'";
            $query = mysqli_query($idCone,$sql);
        if($query){
            echo"Se elimino al cliente correctamente";}
        else{
            echo mysqli_error($idCone);
        }
        break;
}
?>