<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Empresa</th>
            <th scope="col">Nome</th>
            <th scope="col">Cpf</th>
            <th scope="col">Cnpj</th>
            <th scope="col">Telefone</th>
            <th scope="col">Email</th>
            <th scope="col">Opçoes</th>
        </tr>
    </thead>
    <tbody>

        <?php
require_once("../model/empresa.php");
class ListarEmpresaController{

    public function __construct()
    {
        $this->empresa = new Empresa();
        $this->getValues();
    }

    public function getValues(){
    $companies = json_decode($this->empresa->getCompanyList(), true);

        if (is_array($companies)) {
            foreach ($companies as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $subkey => $subvalue) {
                        if (is_array($subvalue)) {
                            $auxPhone = $subvalue['PHONE'];
                            $auxEmail = $subvalue['EMAIL'];
                            echo "<tr>";
                            echo "<th scope=\"row\">" . $subvalue["ID"] . "</th>";
                            echo "<td>" . $subvalue["TITLE"] . "</td>";
                            echo "<td>" . $subvalue["UF_CRM_1581870336"] . "</td>";
                            echo "<td>" . $subvalue["UF_CRM_1581869935"] . "</td>";
                            echo "<td>" . $subvalue["UF_CRM_1581869951"] . "</td>";
                            echo "<td>" . $auxPhone[0]['VALUE'] . "</td>";
                            echo "<td>" . $auxEmail[0]['VALUE'] . "</td>";
                            echo "<td><div class='btn-group' role='group'><a href='../view/editar-empresa.php?id=" . $subvalue["ID"] . "'><button type='button' class='btn btn-outline-warning btn-sm m-1'>Atualizar</button></a> <a href='../controller/deletar-empresa.php?id=" . $subvalue["ID"] . "'><button type='button' class='btn btn-outline-danger btn-sm m-1'>Excluir</button></a></div></td>";
                            echo "</tr>";
                        }
                    }
                }
            }
        }
?>
    </tbody>
</table>
<?php
}
}
new ListarEmpresaController();
?>