<?php 

include '../dao/server.php';
if(isset($_POST['ok'])){
    $dataAplic = ( $_POST['dataAplic'] );
    $dataVenci = ( $_POST['dataVenci'] );
    $valorAplic = $_POST["valorAplic"];
    $rent = $_POST["rent"];
    $cdi = $_POST["cdi"];

   

    
    $url = "https://elekto.com.br/api/Calendars/br-BC/Delta?initialDate=$dataAplic&finalDate=$dataVenci";
   

    $json = json_decode(file_get_contents($url));
    
    $diaUtil = (int) $json->WorkDays;

    $diaTotal = (int) $json->ActualDays;

    $rentDia = ((($cdi/100)*$rent)/252)*$diaUtil;
   
    $total = $valorAplic;

    for ($i=0; $i < $diaUtil; $i++) { 
        $total = (($total*$rentDia)/100)+$total;
    }

    $respostaServer = cadastrarInvestimento($dataAplic, (int)$valorAplic, $rent, $dataVenci, (int)$total, $diaUtil, $diaTotal);

    if($respostaServer == 1){
        header("Location: ../main/home_page.php");
    }else{
        echo "ERRO";
    }
}




?>


<html lang="pt_br"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerson</title>
</head>
<body>
    <form action="" method="post">
        <h1>Informação de Investimento</h1>
        <a href="../index.php">Voltar</a>

        <fieldset>
            <legend>Dados</legend>

            <div>
                <label for="dataAplic">Data Aplicação</label>
                <input type="date" name="dataAplic" id="" required>
            </div>
            <div>
                <label for="dataVenci">Data Vencimento</label>
                <input type="date" name="dataVenci" id="" required>
            </div>
            <div>
                <label for="valorAplic">Valor Aplicado</label>
                <input type="number" step="0.01" name="valorAplic" id="" required>
            </div>
            <div>
                <label for="rent">Rentabilidade</label>
                <input type="number" step="0.01" name="rent" id="" required>
            </div>
            <div>
                <label for="cdi">CDI</label>
                <input type="number" step="0.01" name="cdi" id="" required>
            </div>
           
            

        </fieldset>

        <button type="submit" name="ok">Cadastrar</button>
    </form>

   

 </body></html>