    <?php

/* Para volta do Banco de Dados */
function voltaData($data) {
    $dt = strtotime($data); //converte a data eam time;
    $date = date('d-m-Y', $dt); //nessta string 'd/m/Y' você coloca o que precisa sair.
    return $date;
}

/* Para inserção do Banco de Dados */
function inserirData($data) {
    $dt = strtotime($data); 
    $date = date('Y-m-d', $dt); 
    return $date;
    
}

function idade($data){
    $ret = voltaData($data);
    $ano = date('Y',strtotime($ret));
    
    $agora = time();
    $idade = date('Y',$agora);
    
    $res = $idade - $ano;
    
    return $res;
        
}

?>
