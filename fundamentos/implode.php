<!--
    - O implode é semelhante a função join
-->
<?
    //implode — Junta elementos de uma matriz em uma string
    $array = array('fistname', 'lastname', 'country', 'phone');
    echo implode(" ", $array);
    echo '<br / >';   
    echo join(" ", $array); 
?>
