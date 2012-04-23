TOPICOS
  1. Como Usar / Testar a biblioteca
  2. Reportando Bugs, Pedindo Ajuda e Fazendo Sugestões
  3. Implementando novos Bancos
  3. Contribuindo com Código em Geral

1. COMO USAR / TESTAR A BIBLIOTECA

   1.1 Vá até a pasta pública do seu servidor e baixe a biblioteca com o
       seguinte comando:
       
       $ git clone --branch 1.x-dev
         https://github.com/drupalista-br/boletophp.git boletophp
       
       ou faça o Download da última versão estável em
          https://github.com/drupalista-br/Boleto/tags
          
   1.2 Instale pelo menos um plugin de um banco com o seguinte comando:
       $ cd boletophp
       $ cd bancos
       $ git clone --branch 1.x-dev
         https://github.com/drupalista-br/Boleto-XXX.git XXX

         Onde XXX deverá ser substituido pelo código do Banco.
       
         ou faça o Download da última versão estável do plugin em
            https://github.com/drupalista-br/Boleto/tree/1.x-dev/bancos
         
         Extraia o arquivo baixado em ../boletophp/bancos
         Renomeie a pasta extraida com código do Banco ao qual o plugin pertence.
         
         Exemplo: ../boletophp/bancos/001 para o Banco do Brasil.
   
   1.2 No seu navegador gere um boleto de teste acessando o arquivo de teste que
       esta dentro da pasta ../boletophp/bancos/XXX/NOME-DO-BANCO.test.php
       Por exemplo:
       http://localhost/boletophp/bancos/001/banco_do_brasil.test.php
       
   1.3 Cada banco implementado possui um script de test dentro da pasta
       boletophp/bancos/XXX. Onde XXX é o código do banco.
       
       Use os arquivos de test do(s) banco(s) que você queira integrar à sua
       aplicação como exemplo.

2. REPORTANDO BUGS, PEDINDO AJUDA E FAZENDO SUGESTÕES

   Acesse https://github.com/drupalista-br/boletophp/issues

3. IMPLEMENTANDO NOVOS BANCOS

   Leia também
               Como Forkear um Repositório e Solicitar Pull Requests no Github
               http://help.github.com/fork-a-repo e
               http://help.github.com/send-pull-requests
               
               Documentação do Código desta Biblioteca
               http://hmcservicos.com.br/pt-br/api/doxygen-documentacao-biblioteca-boleto
               
               Você deverá seguir o padrão Doxygen ao comentar o seu Código
               http://www.stack.nl/~dimitri/doxygen/docblocks.html
        
   3.1 Acesse https://github.com/drupalista-br/boletophp e clique e "Fork".
   3.2 Baixe a sua cópia forkeada com o seguinte comando:

       $ git clone --branch 1.x-dev git@github.com:USUARIO/boletophp.git boletophp
          
       Onde USUARIO deverá ser substituido pelo seu usuario no Github.
   
   3.3 Dentro da pasta boletophp/bancos crie uma subpasta e a nomeia com o
       código do banco que você irá implementar. Por exemplo:
       boletophp/bancos/237
   
   3.4 Crie os seguintes arquivos dentro da subpasta que acabou de criar :
       
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
   
   3.5 No arquivo Banco_XXX.php você deverá criar uma classe chamada Banco_XXX
       que extends Boleto.
       Por exemplo:
       class Banco_237 extends Boleto{
          // Meu código.
       }

   3.6 Na classe Banco_XXX que acabara de criar você precisa implementar os
       seguintes métodos:
       (opcional) - setUp()
       (Obrigatório) - febraban_20to44()
       (opcional) - custom()
       (opcional) - outputValues()
       
       Dê uma olhada nas implementações já existentes na pasta boletophp/bancos
       para usar como exemplo.

   3.7 Uma vez que fizer o push dos seus commits, acesse
       https://github.com/drupalista-br/Boleto/issues e crie um issue
       solicitando a criação de um novo repositório.

4. CONTRIBUINDO COM CÓDIGO EM GERAL

   Leia também
               Como Forkear um Repositório e Solicitar Pull Requests no Github
               http://help.github.com/fork-a-repo e
               http://help.github.com/send-pull-requests
               
               Documentação do Código desta Biblioteca
               http://hmcservicos.com.br/pt-br/api/doxygen-documentacao-biblioteca-boleto
               
               Você deverá seguir o padrão Doxygen ao comentar o seu Código
               http://www.stack.nl/~dimitri/doxygen/docblocks.html

   4.1 Se você ainda não fez então faça os passos 3.1 e 3.2.
   
   4.2 Faça as modificações / correções no código, commit e push para o seu
       repositório Forkeado.
       
   4.3 Acesse o seu reposório forkeado no Github e clique em "Pull Request".
       O Pull Request ira criar automaticamente um issue solicitando que o seu
       código seja mergido.
