<?php
session_start();

$palavras = [
    "banana",
    "computador",
    "internet",
    "programacao",
    "php",
    "teclado",
    "mouse",
    "servidor",
    "browser",
    "arquivo",
    "janela",
    "variavel",
    "sistema",
    "codigo",
    "algoritmo",
    "estrutura",
    "dados",
    "funcoes",
    "desenvolvimento",
    "terminal"
];

if (!isset($_SESSION['palavra'])) {
    $_SESSION['palavra'] = $palavras[array_rand($palavras)];
    $_SESSION['letras'] = [];
    $_SESSION['erros'] = 0;
    $_SESSION['mensagem'] = '';
}

if (isset($_POST['reiniciar'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

if (isset($_POST['letra'])) {
    $letra = strtolower(trim($_POST['letra']));

    if (strlen($letra) !== 1 || !ctype_alpha($letra)) {
        $_SESSION['mensagem'] = 'Digite apenas uma letra.';
    } elseif (!in_array($letra, $_SESSION['letras'])) {
        $_SESSION['letras'][] = $letra;
        if (strpos($_SESSION['palavra'], $letra) === false) {
            $_SESSION['erros']++;
            $_SESSION['mensagem'] = 'Letra errada.';
        } else {
            $_SESSION['mensagem'] = 'Letra certa.';
        }
    } else {
        $_SESSION['mensagem'] = 'Você já tentou essa letra.';
    }
}

$exibicao = "";
$venceu = true;

foreach (str_split($_SESSION['palavra']) as $c) {
    if (in_array($c, $_SESSION['letras'])) {
        $exibicao .= $c . " ";
    } else {
        $exibicao .= "_ ";
        $venceu = false;
    }
}

$perdeu = $_SESSION['erros'] >= 6;
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Jogo da Forca PHP</title></head>
<body>
<h1>Jogo da Forca (PHP)</h1>
<p><strong><?php echo $exibicao; ?></strong></p>
<p>Erros: <?php echo $_SESSION['erros']; ?>/6</p>
<p>Letras tentadas: <?php echo implode(', ', $_SESSION['letras']); ?></p>
<?php if (!empty($_SESSION['mensagem'])): ?>
<p><?php echo $_SESSION['mensagem']; ?></p>
<?php endif; ?>

<?php if (!$venceu && !$perdeu): ?>
<form method="post">
    <input type="text" name="letra" maxlength="1" required>
    <button type="submit">Tentar</button>
</form>
<?php endif; ?>

<?php if ($venceu): ?>
<h2>Você venceu!</h2>
<?php endif; ?>

<?php if ($perdeu): ?>
<h2>Você perdeu! Palavra: <?php echo $_SESSION['palavra']; ?></h2>
<?php endif; ?>

<form method="post">
    <button name="reiniciar">Reiniciar</button>
</form>
</body>
</html>
