<?php 
/*class cliente{
  
    public function set_RazonSocial($data){
        private var $_razonSocial;
        $this->$_razonSocial
    }
    public function get_RazonSocial(){
        return->$_razonSocial;
    }
}*/
class ListaClientes{  
    private $conexion;
    
    public function _construct(){
        $this->$conexion = conectar();
    }
    function MostrarClientes(){
        require_once("conexion.php");
        $conexion = conectar();
        $sql =  "SELECT IDCLIENTE,RAZONSOCIAL FROM CLIENTE";
        mysqli_set_charset($conexion, 'utf8');
        $resultados = mysqli_query($conexion,$sql);
        $arreglo = array();
        while($F = mysqli_fetch_array($resultados)){
            $arreglo[] = $F;
        }
        return $arreglo;
        mysqli_close($conexion);
    }
    function BuscarCliente($id){
        require_once("conexion.php");
        $conexion = conectar();
        $sql = "SELECT * FROM CLIENTE WHERE IDCLIENTE = ".$id;
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
