<?php
include '../dao/server.php'
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Investimento</title>
</head>
<body>
    <h3>Investimentoa cadastrados no sistema</h3>
    <a href="../crud/cadastrar.php">Cadastrar</a>
    <section>
        <table border="2" bordercolor="#EEE" >
            <tr>
                <td><strong>Data Aplicação</strong></td>
                <td><strong>Data Vencimento</strong></td>                        
                <td><strong>Valor Aplicado</strong></td>                        
                <td><strong>Rentabilidade</strong></td>                        
                <td><strong>Total Bruto</strong></td>                        
                <td><strong>Dias Úteis</strong></td>                        
                <td><strong>Total Dias</strong></td>                     
                                       
            </tr>
            <?php 
            $consulta = consultarInvestimentos();
            while ($lista = $consulta->fetch(PDO::FETCH_OBJ)){
                $dataAplic=$lista->dataAplicacao."<br>";
                $dataVenci=$lista->dataVencimento."<br>";
                $valorAplic=$lista->valorAplicado."<br>";
                $rent=$lista->rentabilidade."<br>";
                $total=$lista->valoFinal."<br>";
                $diaUtil=$lista->diasUteis."<br>";
                $diaTotal=$lista->diaTotal."<br>";
                                               
            ?>

            
                
                <tr>
                    <td><?=$dataAplic?></td>
                    <td><?=$dataVenci?></td>
                    <td><?=$valorAplic?></td>
                    <td><?=$rent?></td>
                    <td><?=$total?></td>
                    <td><?=$diaUtil?></td>
                    <td><?=$diaTotal?></td>
                   <td><?=  " <a href=\"home_page.php?idParaExcluir=$lista->ID\" > <button type=\"submit\"> Excluir</button>  </a>" ?></td>
                    
                </tr>
                    
            <?php }?>
        </table>
        
    </section>

</body>
</html>