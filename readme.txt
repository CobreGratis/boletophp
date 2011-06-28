@author Francisco Luz <franciscoferreiraluz at yahoo dot com dot au>
@package Boleto
@version 1.0 Beta

TOPICOS
  1. Visao Geral
  2. Instalacao (integrar o API)
  3. Reportando Bugs, Pedindo Ajuda e Fazendo Sugestoes
  4. Propriedades do Objeto
  5. Implementando novos Bancos
  6. Debugging
  7. Publicando a sua Implementacao

1. VISAO GERAL

   O que mudou entre Boletophp 0.17 e Boleto 1.0?

   - O codigo foi totalmente re-escrito usando o conceito de OOP;

   - Ficou muito mais facil de integrar a qualquer aplicacao externa utilizando-se do conceito de API. Assim
     o usuario desenvolvedor nao precisa mexer nas bibliotecas do pacote, facilitando ainda atualizacoes;

   - Ficou mais simples de se implementar novos bancos bem como novas carteiras, pois a classe principal (Boleto)
     faz todo o trabalho pesado.

2. INSTALACAO (Integrar o API)

   Ao descompactar o arquivo do pacote que voce baixou, voce tera uma pasta que contera, entre outros, um arquivo
   de exemplo (example.php) para integrar o API e uma subpasta chamada boleto-lib.

   Esta subpasta (boleto-lib) e' a nossa biblioteca.

   Para fazer uso desta biblioteca em sua aplicacao proceda da seguinte forma:

   a) Copie a pasta boleto-lib para um diretorio dentro de sua pasta publica.
      Por exemplo: www/bibliotecas/boleto-lib
 
   b) Acesse https://github.com/drupalista-br/Boleto/wiki/Projeto-Boletophp-API e faca o download dos 
      pacote(s) que implementa(m) o(s) os banco(s) que voce trabalha para a emissao de boletos.

   c) Va ate a pasta boleto-lib/bancos e crie uma sub pasta. O nome desta sub-pasta devera ser o codigo
      do banco. Seguindo o nosso exemplo, se baixarmos a implementacao do Banco do Brasil entao ficaria 
      assim:

      www/bibliotecas/boleto-lib/001

   d) Copie os arquivos da implementacao para dentro da pasta que voce criou na letra "c" acima.
      Novamente seguindo o nosso exemplo do Banco do Brasil, o arquivo da classe que extends Boleto
      ficara localizado em: 

      www/bibliotecas/boleto-lib/001/Banco_001.php

      NOTAS: Se a implementacao do banco que queira trabalhar ainda nao estiver disponivel entao
             leia as instrucoes no item "5. IMPLEMENTANDO NOVOS BANCOS" abaixo e disponibilize o
             codigo para que este possa ser publicado no projeto.
             

   d) Para integrar o Boleto API a sua aplicacao, por exemplo www/gera-boleto.php 
      (http://localhost/gera-boleto.php), proceda da seguinte forma:

      - Dentro de gera-boleto.php crie uma array com os argumentos a serem passados.

        NOTA: Veja o arquivo exemplo.php que acompanha o pacote para uma lista de todos os 
              argumentos possiveis.

        Leia o arquivo readme.txt da implementacao de cada banco localizado em
        www/bibliotecas/boleto/boleto-lib/bancos/XXX/readme.txt onde XXX e' o codigo do banco,
        para saber mas detalhes no formato e requisitos de validacao de campos especificos.

        Para o argumento 'library_location', em nosso exemplo, ficaria 'bibliotecas/boleto/boleto-lib'

      - Inclua o arquivo da biblioteca com o seguinde codigo:
        include_once($argumentos['library_location'].'/Boleto.class.php');

      - Instancie um novo objeto. Por exemplo:
        $boleto = new Boleto($argumentos);

      - Para imprimir as propriedades do objeto faca assim:
        echo '<pre>';
        print_r($boleto);

        visite http://localhost/gera-boleto.php para visualizar as propriedades do objeto que vc
        acabou de instanciar.

      - Voce notara que a propriedade output (a ultima da estrutura) estara vazia. Veja mais detalhes 
        em "4. PROPRIEDADES DO OBJETO" logo abaixo, mas basicamente se voce quizer fazer a renderizacao do html
        chame o metodo output() assim:

        $boleto->output();

        Pronto, agora ao recarregar o seu navegador em http://localhost/gera-boleto.php sera impresso o boleto.

      - Agora se voce precisa apenas dos valores da propriedade output para customizar a sua propria renderizacao,
        basta passar o valor FALSE na chamada do metodo output(). Assim:

        $boleto->output(FALSE);

        Logo abaixo coloque:
        echo '<pre>';
        print_r($boleto);
     
        recarregue http://localhost/gera-boleto.php e vera que agora a propriedade "output" estara populada pronta
        para ser usada, mas o html nao e' renderizado desta vez.


3. REPORTANDO BUGS, PEDINDO AJUDA E FAZENDO SUGESTOES

   A sua pergunta, sugestao ou informacao de bug e' muitissimo bem vinda, entretando peco gentilmente que nao envie
   emails para mim ou quaisquer outros colaboradores do projeto e sim poste na lista de Issues de cada repositorio.

   Digo "cada repositorio" porque a biblioteca principal (Boleto) e' um repositorio assim como as implementacoes
   de bancos sao tambem, cada um deles, um repositorio em separado, justamente para facilitar o desenvolvimento,
   melhoramento e manutencao.

   A razao para se postar na lista de Issues ao inves de enviar emails e' muito simples:

     1o. O projeto e' uma comunidade onde todos devem participam ajudando da forma que podem, assim a sua duvida, 
         sugestao, pedido, erro, sera de grande valia para outros que tambem precisam da mesma informacao,
         que, uma vez online, ela vai ficar la ajundando a comunidade por toda a eternidade ;)

     2o. Postando online voce podera ser respondido por qualquer pessoa que estiver disponivel, pois, como
         ja dito, todos sao encorajados a participarem da forma que podem.

   Tente ser descritivo no titulo do seu poste para que quando as pessoas possam encontra-lo facilmente quando
   estiverem pesquisando por ajuda. 

   Por exemplo: 
   "Erro no boleto" nao fica muito claro do que se trata, agora
   "Undefined variable $blahblah na linha 8 do arquivo blahblah ao instanciar um novo objeto"
   fica muito mas nitido do que se trata, e assim diminui as duplicacoes nos Issues.

   CORRIGINDO PROBLEMAS OU MELHORANDO O CODIGO

     Nao e' obrigatorio mas facilita muito se ao enviar uma correcao para um bug ou melhoria no codigo voce 
     pudesse fazer por meio de um arquivo patch. Informacoes em http://pt.wikipedia.org/wiki/Patch_(Unix)

     Mas postar o codigo ou anexar arquivos que nao sejam patches nos Issues tambem sao bem vindos.

   PESQUISAR ANTES DE POSTAR

   Outra forma de ajudar e' tomando alguns minutos do seu tempo pesquisando na lista de Issues e lendo as
   instrucoes, tais como este readme, antes de abrir um novo Issue, pois na maioria dos casos a pergunda
   ja possui uma resposta disponivel.

     
4. PROPRIEDADES DO OBJETO

   bank_code - Codigo do banco.

   bank_name - Nome do Banco.

   is_implemented - Informa se existe uma classe que extende a classe principal (Boleto), ou seja, se o banco 
                    esta implementado.
                    0 = Nao esta implementado, 1 = Esta implementado. Veja "IMPLEMENTANDO NOVOS BANCOS" logo abaixo.

                    A implementacao de cada banco se da pela por uma sub classe (child) que extende a classe Boleto (parent).

   warnings - Contem mensagens que podem ajudar a identificar a causa de problemas, tais como inconsistencia nos argumentos
              enviados, etc.

   methods - Lista de todos os metodos presentes tanto na classe Boleto (parent) como na classe do banco (child)

   settings - Contem valores de configuracao do objeto.

   arguments - Contem todos os valores dos argumentos que foram passados pela aplicacao integradora bem como valores
               declarados como padrao que nao foram explicitamente passados.

   computed - Contem os valores resultantes de transformacoes no processo de criacao do objeto.

   febraban - Esta propriedade e' a chave central para o calculo da linha digitavel e o codigo de barras. As especificacoes 
              dos valores seguem esta regra:
         
              Posicoes 01 a 03 -  Código do banco sem o digito           (contem  3 digitos)
              Posicao  04      -  Código da Moeda (9-Real)               (contem  1 digito)
              Posicao  05      -  Dígito verificador do código de barras (contem  1 digito)
              Posicao  06 a 09 -  Fator de vencimento                    (contem  4 digitos)
              Posicoes 10 a 19 -  Valor Nominal do Título                (contem 10 digitos)
              Posicoes 20 a 44 -  Campo Livre para uso dos bancos        (contem 25 digitos)

              NOTA: As posicoes 20 a 44, por serem de uso dos bancos, e' calculado pela classe (child) que implementa o banco.
                    Veja "IMPLEMENTANDO NOVOS BANCOS" para mais detalhes.

   output - Contem todos os valores que serao impressos nos campos do boleto.

            NOTA: Esta propriedade so e' populada quando o metodo output() e' explicitamente chamado. Veja 
                  "INSTALACAO (Integrar o API)" acima.

5. IMPLEMENTANDO NOVOS BANCOS

   A classe principal desta biblioteca chama-se Boleto localizada em ../boleto-lib/Boleto.class.php e e' a responsavel pelo
   gerenciamento da sub classe (child) que implementa o banco e tambem responsavel pelos calculos que geram os valores
   prontos a serem impressos no boleto.

   As classes children que implementam caracteristicas especificas de cada banco devem obedecer a este padrao
   de nome e localizacao:

     ../boleto-lib/XXX/Banco_XXX.php

   Onde XXX e' o codigo do banco com 3 digitos.

   Na pasta ../boleto-lib/XXX, alem do arquivo Banco_XXX.php, devera conter tambem:

   (obrigatorio) logo.jpg - A logomarca do banco

   (obrigatorio) readme.txt - Instrucoes especifica do banco sendo implementado que fogem a regra geral.

   (opcional) layout.tpl.php   - Se este arquivo existir entao o API desconsiderara o template padrao, que e' 
                                 ../boleto-lib/boleto.tpl.php e usara o layout definido pela implementacao do banco.

                                 De uma olhada na implementacao do Banco do Brasil para ver um exemplo
                                 disto na pratica.

   (opcional) style.css  - Mesmo caso do layout.tpl.php. Se este arquivo existir ele sera usado ao inves
                           do style padrao, que e' ../boleto-lib/style.css. O Banco do Brasil e' um bom exemplo.

   Uma vez que voce criar o arquivo Banco_XXX.php voce devera proceder da seguinte forma:
   (de uma olhada nos implementacoes ja existentes para ver na pratica)

   <?php

   //O nome da classe child devera ter o mesmo nome do arquivo.
   //Substitua XXX pelo codigo do banco

   class Banco_XXX extends Boleto{

   /**IMPORTANTE: Nunca sobrescreva qualquer valor da propriedade $this->arguments
                  Ao inves disto salve resultados em $this->computed['..nome do campo ..'] */

       //Este metodo e' obrigatorio
       function setUp(){

           //Este metodo "setUp()" e' chamado logo no comeco da criacao do objeto.
           //Aqui voce tem a chance de configurar informacoes da biblioteca, como o nome do banco por exemplo.

           ....Seu codigo vai aqui.....

          //Para imprimir na tela todas as propriedades do objeto disponiveis:
          echo '<pre>';
          print_r($this);

       }

       //Este metodo e' obrigatorio
       function febraban_20to44(){
      
          //Para imprimir na tela todas as propriedades do objeto disponiveis:
          echo '<pre>';
          print_r($this);

          //aqui sera onde voce devera construir os 25 digitos que fazem parte do
          //campo livre de uso do banco
         
          ......Seu codigo vai aqui ....
       
          //no final salve o seu valor na propriedade febraban, assim:

          $this->febraban['20-44'] = $meu_valor_com_25_digitos;

       }

       //Este metodo e' opcional
       function custom(){

          //Este e' o ultimo metodo chamado pelo construtor e aqui voce tem a chance de fazer os retoques finais
          //no objeto caso seja necessario

          ....Seu codigo vai aqui ....

       }


      //Este metodo tambem e' opcional e nao e' chamado pelo construtor, ou seja,
      //ele so e' chamado depois que o metodo output() e' explicitamente chamado. Veja "INSTALACAO (Integrar o API)".

      function outputValues(){ 

          //aqui voce tera a chance de modificar ou incluir campos na propriedade "output" do objeto.

          ....Seu codigo vai aqui ....

      }

      //Parabens voce acabou de implementar um novo banco

   }

   ?>

6. DEBUGGING

   Independente se voce esta tentando integrar o API `a sua aplicacao ou desenvolvendo uma implementacao para 
   um determinado banco, as vezes as coisas podem nao funcionar como o esperado.

   Assim fique sempre de olho na propriedade do objeto chamada "warnings", pois se houver alguma mensagem la
   (que nao quer dizer necessariamente que algo esta errado, por isso chama-se warnings) esta podera te dar uma
   pista do que esta causando o resultado indesejado.

7. PUBLICANDO A SUA IMPLEMENTACAO

   NOTA: Os releases de implementacoes precisam ser sob a versao versao 2 or higher da GNU General Public License

   Uma vez que sua nova implementacao estiver pronta, voce pode publica-la de duas formas:

   1a Opcao: CRIAR SEU PROPRIO REPOSITORIO NO GITHUB.COM OU QUALQUER OUTRO SERVICO DE SUA ESCOLHA
             (Precisa ter conhecimentos em Git http://pt.wikipedia.org/wiki/Git)

     a) Crie uma conta no github.com (ou outro servico que lhe agrade. Hospedagem e' gratuita para projetos
        Open Source), caso ja nao tenha uma, e crie um repositorio chamado  Boleto-Nome do Banco

     b) Faca os commits e pushes necessarios para publicar no repositorio.

     b) Crie uma Wiki no repositorio seguindo o padrao dos bancos ja implementados.
        Veja a pagina Wiki da Caixa por exemplo em 
        https://github.com/drupalista-br/Boleto-Caixa/wiki/Projeto-Boletophp-API-|-Caixa-Econômica-Federal

     c) Abra um novo Issue em https://github.com/drupalista-br/Boleto/issues e poste o link da pagina Wiki
        que voce criou.

        Apos a sua implementacao for testada e aprovada, o seu link sera adicionada a lista de Implementacoes
        da pagina da biblioteca principal em
        https://github.com/drupalista-br/Boleto/wiki/Projeto-Boletophp-API.

   2a Opcao: USAR A CONTA DO DRUPALISTA-BR NO GITHUB.COM
      
      a) Compacte os arquivos de sua implementacao e coloque em qualquer lugar na internet onde possa ser
         baixado.

      c) Abra um novo Issue em https://github.com/drupalista-br/Boleto/issues e poste o link para que
         possa ser baixado e testado.

      d) Uma vez aprovado eu criarei um novo repositorio na conta do drupalista-br onde a sua
         implementacao sera publicada. Sera dado os devidos creditos a sua autoria, mas o release
         tem que ser sob a versao 2 or higher da GNU General Public License.

         NOTA: Caso voce deseje, poder de administrador podera ser dada a voce para administrar o
               repositorio de sua implementacao.

               Entretanto e' imprecindivel que voce saiba usar a ferramenta git. Informacoes sobre o git em
               http://pt.wikipedia.org/wiki/Git
 
               Sim, o git pode ser usado no Windows, antes que voce pergunte. Entretanto peco gentilmente
               que nao poste perguntas sobre o git na lista de Issues pois existem varios lugares
               mais apropriados na internet que melhor podem sanar suas duvidas a respeito do assunto.















