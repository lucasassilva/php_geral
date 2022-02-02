<?  

    /*
     Pega um array associativo e declara variáveis, tendo como nome as chaves, e o conteúdo da variável, 
     o valor do array referente a chave.  
    */ 

    $arr = [
        ['nome' => 'Rodrigo Silveira', 'idade' => 18],
        ['nome' => 'Gabriel Soarez','idade' => 27]
    ];

    extract($arr[0]);

    echo '<pre>';
        echo "$nome tem $idade anos de idade";
    echo '</pre>';
    
?>


