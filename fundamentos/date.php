<!--
    d - dia 
    D - representação textual curta de um dia
    m - mês
    M - representação textual curta de um mês
    y - ano
    Y - representação textual curta de um ano 
    h - formato 12-horas de uma hora com zero à esquerda
    H - formato 24-horas de uma hora com zero à esquerda
    i - minutos com zero à esquerda		
    s - secundos
-->

<? 
    date_default_timezone_set('America/Sao_Paulo'); // definindo timezone 
?> 

<? 
    $date = date_create("2022-02-20"); // criando uma data 
    echo date_format($date, "d/m/y") ; // formatando uma data
    echo '<br />';
    echo date_default_timezone_get(); // imprimindo o timezone atual
    echo '<br />';
    echo date("y-m-d H:i"); // exibindo a data
    echo '<br />'; 
?>

<?
    $date_set = date_date_set($date, 2024, 12, 02);
    $date_arr = date_format($date_set, "U");
    $date_attr = getdate($date_arr);
    echo $date_attr['year'] . '/' . $date_attr['mon']. '/' . $date_attr['mday'];
?>

<? 
    $date_new = date_create('2021-01-01'); // criando uma data
    date_add($date_new, new DateInterval('P1Y1M5D')); // acrescentando (dias, anos e mesês)
    $date_new_format = date_format($date_new, 'Y-m-d'); // formatando uma data

    echo '<br />';
    echo $date_new_format; // exibindo a data formatada

    $b = date_create(); // criando uma data (sem passar nem parametro retorna a data atual)
    $v = date_date_set($b, 2020, 1, 1); // atribuindo uma nova data
    echo '<br />';
    echo date_format($b, 'Y-m-d'); // formatando a data
?>

