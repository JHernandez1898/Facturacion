<?php 
require_once("ModeloProductos.php");
include("conexion.php");
$metodo = $_POST["funcion"];
$idCone = conectar();
switch($metodo){
        case "MostrarProductos": 
            $lstProductos = new ListaProductos();
            $Arreglo = $lstProductos ->MostrarProductos();
            echo json_encode($Arreglo);
        break;
        case "AgregarProducto":
            if(isset($_POST["codigo"]))$codigo = $_POST["codigo"];
            if(isset($_POST["cant"])){$cantidad = $_POST["cant"]; }
            else{$cantidad =  0;}
            if(isset($_POST["precio"]))$precio =$_POST["precio"];
            if(isset($_POST["tipo"]))$tipo = $_POST["tipo"];
            if(isset($_POST["descripcion"]))$descripcion = $_POST["descripcion"];
           $sql = "INSERT INTO PRODUCTOSERVICIO (CODIGO,CANTIDAD,PRECIO,TIPO,DESCRIPCION) VALUES ('$codigo','$cantidad','$precio','$tipo','$descripcion')";
            $consulta = mysqli_query($idCone,$sql);
        if($consulta){
            echo "Se registro el producto con éxito";
            
        }else{
            echo mysqli_error($idCone) . $tipo;
        }
        
        break;
    case "EliminarProducto":
        $id = $_POST["id"];
        $lstProductos = new ListaProductos();
        $respuesta = $lstProductos ->EliminarProducto($id);
        echo $respuesta;
        break;
    case "BuscarProducto":
        $id = $_POST["id"];
        $lstClientes = new ListaProductos();
        $Arreglo = $lstClientes ->BuscarProducto($id);
        echo json_encode($Arreglo);
        break;
    case "ModificarProducto":
            $id = $_POST["idS"];
            if(isset($_POST["codigo"]))$codigo = $_POST["codigo"];
            if(isset($_POST["cant"])){$cantidad = $_POST["cant"]; }
            else{$cantidad =  0;}
            if(isset($_POST["precio"]))$precio =$_POST["precio"];
            if(isset($_POST["tipo"]))$tipo = $_POST["tipo"];
            if(isset($_POST["descripcion"]))$descripcion = $_POST["descripcion"];
           $sql = "UPDATE PRODUCTOSERVICIO SET CODIGO='$codigo',CANTIDAD='$cantidad',PRECIO='$precio',TIPO='$tipo',DESCRIPCION='$descripcion' WHERE  IDPRODUCTOSERVICIO = '$id'";
            $consulta = mysqli_query($idCone,$sql);
        if($consulta){
            echo "Se modifico el producto con éxito";
            
        }else{
            echo mysqli_error($idCone) . $tipo;
        }
        
}
?>