<?
    $users = [
        ['nome' => 'Lucas','idade' => 20],
        ['nome' => 'Gabriel','idade' => 29]
    ];
?>

<? foreach ($users as $key => $value) {?>
    <? foreach($value as $keys => $values) { ?>
        <p><? echo $keys. '-' .$values ?></p>
    <? } ?>
<? } ?>

