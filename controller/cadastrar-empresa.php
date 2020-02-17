<?php
require_once("../model/empresa.php");
class cadastroEmpresaController
{

    private $empresa;

    public function __construct()
    {
        $this->empresa = new Empresa();
        $this->cadastrar();
    }

    private function cadastrar(){
        $this->empresa->setNome($_POST['nome']);
        $this->empresa->setEmpresa($_POST['empresa']);
        $this->empresa->setCpf($_POST['cpf']);
        $this->empresa->setTelefone($_POST['telefone']);
        $this->empresa->setEmail($_POST['email']);
        $this->empresa->setCnpj($_POST['cnpj']);
        $result = $this->empresa->incluir();
        if($result){
            echo "<script>alert('Empresa Registrada com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
    
}
new cadastroEmpresaController();

?>