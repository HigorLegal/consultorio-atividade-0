<header>

    <a href='./index.php'>voltar</a>

    <h1>Consultario</h1>
 
    

</header>;

<div class='titulo' style='margin-bottom: 20px;margin-top: 12 0px;'>
    <div class='line'>

        <p id='text-titulo'>Formulario</p>
    </div>
</div>
<section id='formulario'>

    <form method='post' action=''>

        <h2>Nome : </h2>
        <input name='nome' id='nome' type='text' placeholder='coloque seu nome' maxlength='100' Required> </input>

        <h2>Ano de Nascimento</h2>
        <input name='dataNasc' id='dataNasc' type='date' placeholder='coloque seu ano de nascimento' Required> </input>

        <h2>Peso :</h2>
        <input id='peso' name='peso' type='number' placeholder='coloque seu peso' Required> </input>

        <h2>Altura</h2>
        <input id='altura' name='altura' type='number' step='0.01' placeholder='coloque sua altura' Required> </input>
        <div>
            <label for="masculino">masculino</label>
            <input type="radio" id="masculino" name="sexo" value="masculino">

            <label for="feminino">feminino</label>
            <input type="radio" id="feminino" name="sexo" value="feminino">
        </div>
        <div style='margin-top:10px'>

            <input type='submit' id='salvar' name='salvar' placeholder='salvar'>
            <input type='reset' id='limpar' name='reset' placeholder='limpar'>
        </div>
    </form>

    <div id='resultados'>
    <?PHP
if (
    isset($_POST["nome"]) && isset($_POST["dataNasc"]) && isset($_POST["peso"]) &&
    isset($_POST["dataNasc"]) && isset($_POST["peso"])
) {

    $nome = ucfirst($_POST["nome"]);

    $dataatual = new DateTime(); 
//var_dump($dataatual);
    
    
    $anoNasc = $_POST["dataNasc"];    
    $data = new DateTime();
    
    $data = new DateTime($anoNasc);

    $idade = $data->diff($dataatual)->y;

    $peso = (float)$_POST["peso"];

    $altura = (float)$_POST["altura"];

    //ve o sexo
    $sexo = ($_POST["sexo"] == "masculino") ?
        "sr"
        :
        "sra";

    //calcula imc
    $imc = $peso / pow($altura,2);

    //acha a categoria
    switch ($imc) {
        case $imc >= 0 && $imc <= 18.5:
            $classe = "abaixo do peso";
            break;
        case $imc > 18.5 && $imc <= 24.9:
            $classe = "peso normal";
            break;
        case $imc > 24.9 && $imc < 29.9:
            $classe = "obesidade |";
            break;
        case  $imc >= 29.9:

            $classe = "obesidade ||";
            break;
        default:
    }
    //resultado
    echo "<p style='color:white;text-align:center;'> $sexo $nome com a idade de $idade
    seu imc e de ".number_format($imc, 2)." sua categaria é de  $classe </p>";
} else {
    echo "<p style='color:white;text-align:center;'>preencha os requisitos</p> ";
}
?>
    </div>
</section>
<div>


</div>;



<style>
    body {
        background-color: rgb(63, 63, 63);
        margin: 0;
    }

    #formulario {
        display: flex;
    }

    #formulario {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
    }

    form div input {
        background-color: #000000;
        color: #adadad;

    }

    form {
        display: flex;
        align-items: center;
        flex-direction: column;
    }


    input {
        text-align: center;
        padding: 10px;
    }

    a {
        justify-content: flex-start;
        font-size: 30px;
        background-color: rgb(100, 100, 100);
        color: aliceblue;
        padding: 5px;
        border-radius: 30px;
        text-decoration: none;
    }

    h2 {
        color: white;
        text-align: center
    }

    h1 {

        text-align: center
    }

    header {
        background-color: rgb(0, 0, 0);
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-evenly;
        color: white
    }

    #text-titulo {

color: white;
        border-radius: 30px;
        margin: 0 auto;
        text-align: center;
        font-size: 18px;
        

    }

    .titulo {
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        flex-direction: column;
        margin-top: 40px;

        color: #010101;
    }

    .line {
        border: 2px solid gray;
        width: 100%;
        height: 25px;
        background: black;

    }
</style>