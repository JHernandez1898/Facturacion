<?php class ListaProductos{  
    private $conexion;
    
    public function _construct(){
        $this->$conexion = conectar();
    }
    function MostrarProductos(){
        require_once("conexion.php");
        $conexion = conectar();
        $sql =  "SELECT * FROM PRODUCTOSERVICIO";
        mysqli_set_charset($conexion, 'utf8');
        $resultados = mysqli_query($conexion,$sql);
        $arreglo = array();
        while($F = mysqli_fetch_array($resultados)){
            $arreglo[] = $F;
        }
        return $arreglo;
        mysqli_close($conexion);
    }
    
    function EliminarProducto($id){
         require_once("conexion.php");
        $conexion = conectar();
        $sql = "DELETE FROM PRODUCTOSERVICIO WHERE IDPRODUCTOSERVICIO = ".$id;
        $resultado = mysqli_query($conexion,$sql);
        if($resultado){return "Se elimino el producto con exito";}
        else{
            return mysqli_error($conexion);
        }
    }
    
    function BuscarProducto($id){
        require_once("conexion.php");
        $conexion = conectar();
        $sql = "SELECT * FROM PRODUCTOSERVICIO WHERE IDPRODUCTOSERVICIO = ".$id;
        mysqli_set_charset($conexion,'utf8');
        $resultado  =mysqli_query($conexion,$sql);
        $arreglo = array();
        while($F = mysqli_fetch_array($resultado)){
            $arreglo[]=$F;
        }
        return $arreglo;
        mysql_close($id);
    }
    
}
?>