<?php
require_once("../model/empresa.php");


class editarEmpresaController {

    private $Empresa;
    private $empresa;
    private $id;
    private $nome;
    private $cpf;
    private $cnpj;
    private $telefone;
    private $email;

    public function __construct($id){
        $this->Empresa = new Empresa();
        $this->criarFormulario($id);
    }
    private function criarFormulario($id){
        $aux = null;
        $row = $this->Empresa->getCompany($id);
        $jsrow = json_decode($row,true);
        if (is_array($jsrow)) {
            foreach ($jsrow as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $subkey => $subvalue) {
                        if (is_array($subvalue)) {
                            $aux = $value;
                        }
                    }
                }
            }
        }
        $auxPhone = $aux['PHONE'];
        $auxEmail = $aux['EMAIL'];
        $this->id         =$aux['ID'];
        $this->empresa         =$aux['TITLE'];
        $this->nome        =$aux['UF_CRM_1581870336'];
        $this->cpf   =$aux['UF_CRM_1581869935'];
        $this->telefone        =$auxPhone[0]['VALUE'];
        $this->email         =$auxEmail[0]['VALUE'];
        $this->cnpj         =$aux['UF_CRM_1581869951'];
    }
    public function editarFormulario($nome,$empresa,$cpf,$telefone,$email,$cnpj,$id){
        if($this->Empresa->updateCompany($nome,$empresa,$cpf,$telefone,$email,$cnpj,$id)){
            echo "<script>alert('Registro editado com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEmpresa(){
        return $this->empresa;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getCnpj(){
        return $this->cnpj;
    }


}
if($_GET) {
    $id = $_GET['id'];
}else{
    $id = $_POST['id'];
}

$Empresa = new editarEmpresaController($id);

if(isset($_POST['id'])){
    $Empresa->editarFormulario($_POST['nome'],$_POST['empresa'],$_POST['cpf'],$_POST['telefone'],$_POST['email'],$_POST['cnpj'],$_POST['id']);
}
?>