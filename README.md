<h1 align="center">Jogo da Forca · PHP</h1>

<p align="center">
  Jogo da forca com a lógica no servidor, feito em <strong>PHP</strong> usando <strong>sessões</strong> para guardar o progresso da partida.
</p>

<p align="center">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white">
  <img alt="HTML5" src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white">
</p>

---

## Sobre o projeto

Diferente da [versão em JavaScript](https://github.com/AnthonyConrado/Forca-js), aqui todo o jogo acontece no servidor. Cada tentativa é enviada por um formulário, o PHP confere a letra e guarda a palavra, as letras tentadas e os erros na sessão do jogador.

## Funcionalidades

- Sorteio entre 20 palavras do mundo da programação
- Validação da entrada: aceita apenas uma letra
- Aviso de letra certa, letra errada ou letra repetida
- Lista das letras já tentadas
- Limite de 6 erros
- Botão para reiniciar a partida, que encerra a sessão

## Como funciona

```
Jogador envia a letra  ->  PHP valida a entrada  ->  atualiza $_SESSION
                                                      (palavra, letras, erros)
                       <-  página mostra a palavra, os erros e a mensagem
```

## Tecnologias

| Tecnologia | Uso |
| --- | --- |
| PHP | Lógica do jogo e validação |
| Sessões PHP | Guardar a partida entre uma tentativa e outra |
| HTML | Formulário e exibição do jogo |

## Como rodar

Pré-requisito: [PHP](https://www.php.net/downloads) 7.4 ou superior.

```bash
git clone https://github.com/AnthonyConrado/forca_php.git
cd forca_php
php -S localhost:8000
```

Acesse `http://localhost:8000`.

## Estrutura

```
forca_php/
└── index.php   # lógica e página do jogo
```

## Próximos passos

- [ ] Estilizar a página
- [ ] Desenhar o boneco da forca a cada erro
- [ ] Separar a lógica da apresentação

## Autor

Feito por **Anthony Gonçalves Conrado**, desenvolvedor full stack júnior em Guarulhos, SP.

[![GitHub](https://img.shields.io/badge/GitHub-AnthonyConrado-181717?style=flat-square&logo=github)](https://github.com/AnthonyConrado)
[![E-mail](https://img.shields.io/badge/E--mail-anthonyns973%40icloud.com-b794f6?style=flat-square&logo=maildotru&logoColor=white)](mailto:anthonyns973@icloud.com)
