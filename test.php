<?php



function img($test){
return "<img src=../" .$test . '>';
}

$test = ['src'=>'nx.jpg'];
echo  img($test['src']);
?>
