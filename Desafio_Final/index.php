<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulário</title>
</head>

<body>
    <div class="formulario">
        <form method="post">
            <input type="text" required placeholder="Insira seu nome" name="nome">
            <input type="number" placeholder="Insira sua idade" name="idade">

            <label>Insira o tipo de Ingresso</label>
            <select name="selecao" id="selecao">
                <option value="vip">VIP</option>
                <option value="cadeira">Regular</option>
                <option value="pista">Básico</option>
            </select>

            <button type="submit">Consultar</button>
        </form>
    </div>

    <div class="mensagem">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recupera os valores do formulário
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $selecao = $_POST['selecao'];
            echo "<p>Bem-vindo, $nome!</p>";
            // Verifica se o usuário é menor de idade
            if ($idade < 18) {
                echo "<p>Menor de idade não pode comprar este ingresso.</p>";
            } else {
                // Define o tipo de ingresso e valor com base na seleção
                $ingresso = "";
                $valor = 0.0;
                switch ($selecao) {
                    case 'vip':
                        $ingresso = "VIP";
                        $valor = 100.00;
                        break;
                    case 'cadeira':
                        $ingresso = "Regular";
                        $valor = 50.00;
                        break;
                    case 'pista':
                        $ingresso = "Básico";
                        $valor = 30.00;
                        break;
                    default:
                        echo "<p>Seleção de ingresso inválida.</p>";
                        exit;
                }
                // Exibe as informações do ingresso
                echo "<p>Tipo de Ingresso: $ingresso</p>";
                echo "<p>Valor: R$ " . number_format($valor, 2, ',', '.') . "</p>";
            }
        }
        ?>
    </div>
</body>

</html>