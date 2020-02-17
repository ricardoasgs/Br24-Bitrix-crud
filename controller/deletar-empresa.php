<?php
require_once("../model/empresa.php");
class deletaEmpresaController {
    private $empresa;

    public function __construct($id){
        $this->empresa = new Empresa();
        if($this->empresa->deleteCompany($id)== TRUE){
            echo "<script>alert('Registro deletado com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}
new deletaEmpresaController($_GET['id']);
?>