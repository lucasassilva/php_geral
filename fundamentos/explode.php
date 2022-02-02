<!--
    Semelhante a função str_split porém o explode possui 
    um delimitador para a divisão da string
-->

<?
    // explode — Divide uma string em um array.

    $str = 'Hello|World';

    $result = explode('|', $str);
    
    $result_2 = str_split($str);

    print_r($result);
    print_r($result_2);

?>