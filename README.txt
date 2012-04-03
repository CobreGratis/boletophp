@package Boletophp

TOPICOS
  1. Visão Geral
  2. Testando a biblioteca
  3. Reportando Bugs, Pedindo Ajuda e Fazendo Sugestões
  4. Implementando novos Bancos ou Contribuindo com Código em Geral

1. VISÃO GERAL

   O que mudou nesta nova versão 2.x do projeto Boletophp?

   - O código foi totalmente re-escrito usando o conceito de OOP;

   - Ficou muito mais fácil de integrar a qualquer aplicação externa
     utilizando-se do conceito de API. Assim o usuário desenvolvedor não precisa
     mexer nas bibliotecas do pacote, o que facilita ainda as atualizações;

   - Ficou mais simples de se implementar novos bancos bem como novas carteiras,
     pois a classe abstrata principal (Boleto.class) faz todo o trabalho pesado.

2. TESTANDO A BIBLIOTECA
   2.1 Vá até a pasta pública do seu servidor e baixe a biblioteca com o
       seguinte comando:
       git clone --branch refactoring
       https://github.com/BielSystems/boletophp.git boletophp
   
   2.2 No seu navegador acesse chame os testes que estão dentro da pasta
       boletophp/test. Por exemplo:
       http://localhost/boletophp/test/caixa_economica.test.php
       
   2.3 Cada banco implementado possui um script de test dentro da pasta
       boletophp/test. Use os arquivos de test do(s) banco(s) que você queira
       integrar à sua aplicação como exemplo.

3. REPORTANDO BUGS, PEDINDO AJUDA E FAZENDO SUGESTÕES

   Acesse https://github.com/BielSystems/boletophp/issues

4. IMPLEMENTANDO NOVOS BANCOS ou CONTRIBUINDO COM CÓDIGO EM GERAL

   4.1 Acesse https://github.com/BielSystems/boletophp e clique e "Fork".
   4.2 Baixe a sua cópia fork-eada com o seguinte comando:
       git clone --branch refactoring
       git@github.com:USUARIO/boletophp.git boletophp
   
       Onde USUARIO deverá ser substituido pelo seu usuario no Github.
   
   4.3 Dentro da pasta boletophp/bancos crie uma subpasta e a nomeia com o
       código do banco que você irá implementar. Por exemplo:
       boletophp/bancos/237
   
   4.4 Crie os seguintes arquivos dentro da subpasta que acabou de criar :
       
       (Obrigatório) Banco_XXX.php - Onde XXX é o código do banco.
       (obrigatório) logo.jpg - Logo marca do banco.
       (obrigatório) README.txt - Instruções sobre a formatação dos campos do
                                  Boleto para este banco.
       (opcional) layout.tpl.php - Se este arquivo existir então o template
                                   padrão será desconsiderado e este template
                                   será usado. Veja a implementação do Banco do
                                   Brasil como exemplo.
       (opcional) style.css - Mesmo caso do layout.tpl.php. Dê uma olhada na
                              implementação do Banco do Brasil como exemplo.
   
   4.5 No arquivo Banco_XXX.php você deverá criar uma classe chamada Banco_XXX
       que extends Boleto.
       Por exemplo:
       class Banco_237 extends Boleto{
          // Meu código.
       }

   4.6 Na classe Banco_XXX que acabara de criar você precisa implementar os
       seguintes métodos:
       (opcional) - setUp()
       (Obrigatório) - febraban_20to44()
       (opcional) - custom()
       (opcional) - outputValues()
       
       Dê uma olhada nas implementações já existentes na pasta boletophp/bancos
       para usar como exemplo.

    4.7 Uma vez que fizer o push dos seus commits, acesse o repositório em
        https://github.com/USUARIO/boletophp, onde USUARIO deverá ser substituido
        pelo seu usuário no Github, o solicite um Pull Request para o branch
        refactoring.