<?  
// Cria um array contendo variáveis e seus valores

$x = function($a, $b) {
    return $a + $b; 
};

$result = compact("x");

echo "<pre>";
print_r($result);
echo "</pre>";

echo $result["x"](5,3)

?>