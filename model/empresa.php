<?php
require("../helper/helper.php");
class Empresa {

    private $empresa;
    private $nome;
    private $cpf;
    private $cnpj;
    private $telefone;
    private $email;

    public function setNome($string){
        $this->nome = $string;
    }
    public function setEmpresa($string){
        $this->empresa = $string;
    }
    public function setCpf($string){
        $this->cpf = $string;
    }
    public function setCnpj($string){
        $this->cnpj = $string;
    }
    public function setEmail($string){
        $this->email = $string;
    }
    public function settelefone($string){
        $this->telefone = $string;
    }

    public function getNome(){
        return $this->nome;
    }
    public function getEmpresa(){
        return $this->empresa;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getCnpj(){
        return $this->cnpj;
    }

    public function incluir()
    {
        $queryUrl = baseUrl() . '/crm.company.add.json';
        $queryData = http_build_query(array(
            'fields' => array(
                "TITLE" => $this->getEmpresa(),
                "UF_CRM_1581870336" => $this->getNome(),
                "UF_CRM_1581869935" => $this->getCpf(),
                "UF_CRM_1581869951" => $this->getCnpj(),
                "PHONE" => array(
                    array(
                        "VALUE" => $this->getTelefone(),
                        "VALUE_TYPE" => "WORK"
                    )
                ) ,
                "EMAIL" => array(
                    array(
                        "VALUE" => $this->getEmail(),
                        "VALUE_TYPE" => "WORK"
                    )
                ) ,
            )
        ));
        return doRequest($queryUrl, $queryData);

    }

    public function getCompany($id){

        $queryUrl = baseUrl() . '/crm.company.get.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));

        return doRequest($queryUrl, $queryData);

    }

    public function getCompanyList(){
        $queryUrl = baseUrl() . '/crm.company.list.json';
        $queryData = http_build_query(array(
                'order' => array("DATE_CREATE" => "ASC"),
                'select' => array("ID", "TITLE", "UF_CRM_1581870336", "UF_CRM_1581869935","UF_CRM_1581869951", "PHONE", "EMAIL"),
            )
        );

        return doRequest($queryUrl, $queryData);
    }

    public function deleteCompany($id){
        $queryUrl = baseUrl() . '/crm.company.delete.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));

        return doRequest($queryUrl, $queryData);

    }

    public function updateCompany($nome,$empresa,$cpf,$telefone,$email,$cnpj,$id){
        $queryUrl = baseUrl() .'/crm.company.update.json';
        $queryData = http_build_query(array(
            'ID' => $id,
            'fields' => array(
                "TITLE" => $empresa,
                "UF_CRM_1581870336" => $nome,
                "UF_CRM_1581869935" => $cpf,
                "UF_CRM_1581869951" => $cnpj,
                "PHONE" => array(array("VALUE" => $telefone, "VALUE_TYPE" => "WORK" )),
                "EMAIL" => array(array("VALUE" => $email, "VALUE_TYPE" => "WORK" )),
            )
        ));

        return doRequest($queryUrl, $queryData);
    }

    
   
}
?>