
<doctype html>
<html>
<head>
</head>

<body>
<form method = "POST">

<label>Volêi</label>    
<input type = "checkbox" name = "sport[]" value = 10>
<br>
<label>Futebol</label>  
<input type = "checkbox" name = "sport[]" value = 20 >
<br>
<label>Natação</label>  
<input type = "checkbox" name = "sport[]" value = 30>
<br>
<button type = "submit" name = "submit">ok</button>
</form>

</body>


</html>


<?php
/* 
#Variavel
$test = "Alonso";
echo $test;
#Titulo
echo "<h1>title</h1>";
#Lista
echo '<ul><li>" test"</li> <li>teste1</li>  </ul>';
*/

if(isset($_POST['submit'])){

    if(isset($_POST['sport'])){
    $sport = $_POST['sport'];
    $cont = 0;
        foreach($sport as $chave => $valor){
         $cont = $valor + $cont;
            }
        echo $cont;
    }  
    else{
        echo $p = "Selecione uma caixa:   ";
        } 
}
else{
        echo $valor = "";
        }
        
        
            


?>
