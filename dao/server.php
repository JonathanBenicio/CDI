<?php
include '../conexaoBD.php';

function cadastrarInvestimento($dataAplic, $valorAplic, $rent, $dataVenci, $total, $diaUtil, $diaTotal){
    $bancoDeDados = conectar();

    try {
        
        $consulta = "INSERT INTO `cdi` (`dataAplicacao`, `valorAplicado`, `rentabilidade`, `dataVencimento`, `valoFinal`, `diasUteis`, `diaTotal`) 
        VALUES ('{$dataAplic}', '{$valorAplic}', '{$rent}', '{$dataVenci}', '{$total}', '{$diaUtil}', '{$diaTotal}')";
        
        $bancoDeDados->query($consulta);

        return 1;
        
        
    } catch (Exception $e){
        echo  "Erro cadastrarInvestimento: " .$e->getMessage();
    }
}

function consultarInvestimentos(){
    $bancoDeDados = conectar();

    try {
        
        $consulta = "SELECT * FROM `cdi`";
        
        return $bancoDeDados->query($consulta);
        
        
    } catch (Exception $e){
        echo  "Erro consulta_Cliente: " .$e->getMessage();
    }
}


function excluirInvestimentos($ID){
    $bancoDeDados = conectar();

    try {
        
        $consulta = "DELETE FROM `cdi` WHERE `cdi`.`ID` = $ID";
        
        return $bancoDeDados->query($consulta);
        
        
    } catch (Exception $e){
        echo  "Erro consulta_Cliente: " .$e->getMessage();
    }

}

?>