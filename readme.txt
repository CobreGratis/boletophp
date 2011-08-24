@author Francisco Luz <franciscoferreiraluz at yahoo dot com dot au>
@package Boleto
@version 1.0 Beta

TOPICOS
  1. Visão Geral
  2. Instalação (integrar o API)
  3. Reportando Bugs, Pedindo Ajuda e Fazendo Sugestões
  4. Propriedades do Objeto
  5. Implementando novos Bancos
  6. Debugging
  7. Publicando a sua Implementação

1. VISÃO GERAL

   O que mudou entre Boletophp 0.17 e Boleto 1.0?

   - O código foi totalmente re-escrito usando o conceito de OOP;

   - Ficou muito mais fácil de integrar a qualquer aplicação externa utilizando-se do conceito de API. Assim
     o usuário desenvolvedor não precisa mexer nas bibliotecas do pacote, o que facilita ainda as atualizações;

   - Ficou mais simples de se implementar novos bancos bem como novas carteiras, pois a classe principal (Boleto)
     faz todo o trabalho pesado.

2. INSTALAÇÃO (Integrar o API)

   Ao descompactar o arquivo do pacote que você baixou, terás uma pasta que conterá, entre outros, um arquivo
   de exemplo (example.php) para integrar o API e uma subpasta chamada boleto-lib.

   Esta subpasta (boleto-lib) é a nossa biblioteca.

   Para fazer uso desta biblioteca em sua aplicação proceda da seguinte forma:

   a) Copie a pasta boleto-lib para um diretorio dentro de sua pasta pública.
      Por exemplo: www/bibliotecas/boleto-lib
 
   b) Acesse https://github.com/drupalista-br/Boleto/wiki/Projeto-Boletophp-API e faça o download dos 
      plugin(s) que implementa(m) o(s) os banco(s) que você trabalha para a emissão de boletos.

   c) Vá até a pasta boleto-lib/bancos e crie uma sub pasta. O nome desta sub-pasta deverá ser o código
      do banco. Seguindo o nosso exemplo, se baixarmos a implementação do Banco do Brasil então ficaria 
      assim:

      www/bibliotecas/boleto-lib/001

   d) Copie os arquivos da implementação para dentro da pasta que você criou na letra "c" acima.
      Novamente seguindo o nosso exemplo do Banco do Brasil, o arquivo da classe que extends Boleto
      ficará localizado em: 

      www/bibliotecas/boleto-lib/001/Banco_001.php

      NOTAS: Se a implementação do banco que queira trabalhar ainda não estiver disponível então
             leia as instruções no item "5. IMPLEMENTANDO NOVOS BANCOS" para desenvolver o seu próprio
             plugin, uma vez que tiver pronto disponibilize o código para que este possa ser
             publicado no projeto.
             
   d) Para integrar o Boleto API a sua aplicação, por exemplo www/gera-boleto.php 
      (http://localhost/gera-boleto.php), proceda da seguinte forma:

      - Dentro de gera-boleto.php crie uma array com os argumentos a serem passados.

        NOTA: Veja o arquivo exemplo.php que acompanha o pacote para uma lista de todos os 
              argumentos possíveis.

        Leia o arquivo readme.txt da implementação de cada banco localizado em
        www/bibliotecas/boleto-lib/bancos/XXX/readme.txt onde XXX é o código do banco,
        para saber mas detalhes no formato e requisitos de validação de campos específicos.

        Para o argumento 'library_location', em nosso exemplo, ficaria 'bibliotecas/boleto-lib'

      - Inclua o arquivo da biblioteca com o seguinde código:
        include_once($argumentos['library_location'].'/Boleto.class.php');

      - Instancie um novo objeto. Por exemplo:
        $boleto = new Boleto($argumentos);

      - Para imprimir as propriedades do objeto faça assim:
        echo '<pre>';
        print_r($boleto);

        visite http://localhost/gera-boleto.php para visualizar as propriedades do objeto que vc
        acabou de instanciar.

      - Você notará que a propriedade output (a última da estrutura) estará vazia. Veja mais detalhes 
        em "4. PROPRIEDADES DO OBJETO" logo abaixo, mas basicamente se você quizer fazer a renderização do html
        chame o método output() assim:

        $boleto->output();

        Pronto, agora ao recarregar o seu navegador em http://localhost/gera-boleto.php será impresso o boleto.

      - Agora se você precisa apenas dos valores da propriedade output para customizar a sua propria renderização,
        basta passar o valor FALSE na chamada do método output(). Assim:

        $boleto->output(FALSE);

        Logo abaixo coloque:
        echo '<pre>';
        print_r($boleto);
     
        recarregue http://localhost/gera-boleto.php e verá que agora a propriedade "output" estará populada pronta
        para ser usada, mas o html não é renderizado desta vez.


3. REPORTANDO BUGS, PEDINDO AJUDA E FAZENDO SUGESTÕES

   A sua pergunta, sugestão ou informação de bug é muitíssimo bem vinda, entretando peço gentilmente que não envie
   emails para mim ou quaisquer outros colaboradores do projeto e sim poste na lista de Issues de cada repositório.

   Digo "cada repositório" porque a biblioteca principal (Boleto) é um repositório assim como as implementações
   de bancos são também, cada um deles, um repositório em separado, justamente para facilitar o desenvolvimento,
   melhoramento e manutenção.

   A razão para se postar na lista de Issues ao invés de enviar emails é muito simples:

     1o. O projeto é uma comunidade onde todos devem participar ajudando da forma que podem, assim a sua dúvida, 
         sugestão, pedido, erro, será de grande valia para outros que também precisam da mesma informação,
         que, uma vez online, ela vai ficar lá ajundando a comunidade por toda a eternidade ;)

     2o. Postando online você poderá ser respondido por qualquer pessoa que estiver disponível, pois, como
         já dito, todos são encorajados a participar da forma que podem.

   Tente ser descritivo no título do seu poste para que as pessoas possam encontra-lo facilmente quando
   estiverem pesquisando nos issues ou mesmo no Google. 

   Por exemplo: 
   "Erro no boleto" não fica muito claro do que se trata, agora
   "Undefined variable $blahblah na linha 8 do arquivo blahblah ao instanciar um novo objeto"
   fica muito mas nitido do que se trata, e assim diminui as duplicações nos Issues.

   CORRIGINDO PROBLEMAS OU MELHORANDO O CÓDIGO

     Não é obrigatório mas facilita muito se ao enviar uma correção para um bug ou melhoria no código você 
     pudesse fazer por meio de um arquivo patch. Informações em http://pt.wikipedia.org/wiki/Patch_(Unix)

     Mas postar o código ou anexar arquivos que não sejam patches nos Issues também são bem vindos.

   PESQUISAR ANTES DE POSTAR

   Outra forma de ajudar é tomando alguns minutos do seu tempo pesquisando na lista de Issues e lendo as
   instruções, tais como este readme, antes de abrir um novo Issue, pois na maioria dos casos a pergunda
   já possui uma resposta disponível.

     
4. PROPRIEDADES DO OBJETO

   bank_code - Código do banco.

   bank_name - Nome do Banco.

   is_implemented - Informa se existe uma classe que extende a classe principal (Boleto), ou seja, se o banco 
                    está implementado.
                    0 = Não está implementado, 1 = Está implementado. Veja "IMPLEMENTANDO NOVOS BANCOS" logo abaixo.

                    A implementação de cada banco se dá por uma sub classe (child) que extende a classe Boleto (parent).

   warnings - Contém mensagens que podem ajudar a identificar a causa de problemas, tais como inconsistência nos argumentos
              enviados, etc.

   methods - Lista de todos os métodos presentes tanto na classe Boleto (parent) como na classe do banco (child)

   settings - Contém valores de configuração do objeto.

   arguments - Contém todos os valores dos argumentos que foram passados pela aplicação integradora bem como valores
               declarados como padrão que não foram explicitamente passados.

   computed - Contém os valores resultantes de transformações no processo de criação do objeto.

   febraban - Esta propriedade é a chave central para o cálculo da linha digitável e o código de barras. As específicações 
              dos valores seguem esta regra:
         
              Posições 01 a 03 -  Código do banco sem o dígito           (contem  3 dígitos)
              Posição  04      -  Código da Moeda (9-Real)               (contem  1 dígito)
              Posição  05      -  Dígito verificador do código de barras (contem  1 dígito)
              Posição  06 a 09 -  Fator de vencimento                    (contem  4 dígitos)
              Posições 10 a 19 -  Valor Nominal do Título                (contem 10 dígitos)
              Posições 20 a 44 -  Campo Livre para uso dos bancos        (contem 25 dígitos)

              NOTA: As posições 20 a 44, por serem de uso dos bancos, é calculado pela classe (child) que implementa o banco.
                    Veja "IMPLEMENTANDO NOVOS BANCOS" para mais detalhes.

   output - Contém todos os valores que serão impressos nos campos do boleto.

            NOTA: Esta propriedade so é populada quando o método output() é explicitamente chamado. Veja 
                  "INSTALAÇÃO (Integrar o API)" acima.

5. IMPLEMENTANDO NOVOS BANCOS

   A classe principal desta biblioteca chama-se Boleto localizada em ../boleto-lib/Boleto.class.php e é a responsavel pelo
   gerenciamento da sub classe (child) que implementa o banco e também responsavel pelos cálculos que geram os valores
   prontos a serem impressos no boleto.

   As classes children que implementam caracteristicas específicas de cada banco devem obedecer a este padrão
   de nome e localização:

     ../boleto-lib/XXX/Banco_XXX.php

   Onde XXX é o código do banco com 3 dígitos.

   Na pasta ../boleto-lib/XXX, além do arquivo Banco_XXX.php, deverá conter também:

   (obrigatório) logo.jpg - A logomarca do banco

   (obrigatório) readme.txt - Instruções específica do banco sendo implementado que fogem a regra geral.

   (opcional) layout.tpl.php   - Se este arquivo existir então o API desconsiderara o template padrão, que é 
                                 ../boleto-lib/boleto.tpl.php e usará o layout definido pela implementação do banco.

                                 Dê uma olhada na implementação do Banco do Brasil para ver um exemplo
                                 disto na prática.

   (opcional) style.css  - Mesmo caso do layout.tpl.php. Se este arquivo existir ele será usado ao invés
                           do style padrão, que é ../boleto-lib/style.css. O Banco do Brasil é um bom exemplo.

   Uma vez que você criar o arquivo Banco_XXX.php você deverá proceder da seguinte forma:
   (dê uma olhada nos implementações já existentes para ver na prática)

   <?php

   //O nome da classe child deverá ter o mesmo nome do arquivo.
   //Substitua XXX pelo código do banco

   class Banco_XXX extends Boleto{

   /**IMPORTANTE: Nunca sobrescreva qualquer valor da propriedade $boleto->arguments
                  Ao invés disto salve resultados em $boleto->computed['..nome do campo ..'] */

       //Este método é obrigatório
       function setUp($boleto){

           //Este método "setUp($boleto)" é chamado logo no comeco da criação do objeto.
           //Aqui você tem a chance de configurar informações da biblioteca, como o nome do banco por exemplo.

           ....Seu código vai aqui.....

          //Para imprimir na tela todas as propriedades do objeto disponiveis:
          echo '<pre>';
          print_r($boleto);

       }

       //Este método é obrigatório
       function febraban_20to44($boleto){
      
          //Para imprimir na tela todas as propriedades do objeto disponiveis:
          echo '<pre>';
          print_r($boleto);

          //aqui será onde você deverá construir os 25 dígitos que fazem parte do
          //campo livre de uso do banco
         
          ......Seu código vai aqui ....
       
          //no final salve o seu valor na propriedade febraban, assim:

          $boleto->febraban['20-44'] = $meu_valor_com_25_dígitos;

       }

       //Este método é opcional
       function custom($boleto){

          //Este é o ultimo método chamado pelo construtor e aqui você tem a chance de fazer os retoques finais
          //no objeto caso seja necessário

          ....Seu código vai aqui ....

       }


      //Este método também é opcional e não é chamado pelo construtor, ou seja,
      //ele so é chamado depois que o método output() é explicitamente chamado. Veja "INSTALAÇÃO (Integrar o API)".

      function outputValues($boleto){ 

          //aqui você terá a chance de modificar ou incluir campos na propriedade "output" do objeto.

          ....Seu código vai aqui ....

      }

      //Parabéns você acabou de implementar um novo banco

   }

   ?>

6. DEBUGGING

   Independente se você esta tentando integrar o API à sua aplicação ou desenvolvendo uma implementação para 
   um determinado banco, as vezes as coisas podem não funcionar como o esperado.

   Assim fique sempre de olho na propriedade do objeto chamada "warnings", pois se houver alguma mensagem la
   (que não quer dizer necessáriamente que algo esta errado, por isso chama-se warnings) esta poderá te dar uma
   pista do que esta causando o resultado indesejado.

7. PUBLICANDO A SUA IMPLEMENTAÇÃO

   NOTA: Os releases de implementações precisam ser sob a versão 2 or higher da GNU General Public License

   Uma vez que sua nova implementação estiver pronta, você pode publica-la de duas formas:

   1a Opção: CRIAR SEU PROPRIO REPOSITORIO NO GITHUB.COM OU QUALQUER OUTRO SERVICO DE SUA ESCOLHA
             (Precisa ter conhecimentos em Git http://pt.wikipedia.org/wiki/Git)

     a) Crie uma conta no github.com (ou outro serviço que lhe agrade. Hospedagem é gratuita para projetos
        Open Source), caso já não tenha uma, e crie um repositório chamado  Boleto-Nome do Banco

     b) Faça os commits e pushes necessários para publicar no repositório.

     b) Crie uma Wiki no repositório seguindo o padrão dos bancos já implementados.
        Veja a pagina Wiki da Caixa por exemplo em 
        https://github.com/drupalista-br/Boleto-Caixa/wiki/Projeto-Boletophp-API-|-Caixa-Econômica-Federal

     c) Abra um novo Issue em https://github.com/drupalista-br/Boleto/issues e poste o link da pagina Wiki
        que você criou.

        Após a sua implementação for testada e aprovada, o seu link será adicionada a lista de Implementações
        da pagina da biblioteca principal em
        https://github.com/drupalista-br/Boleto/wiki/Projeto-Boletophp-API.

   2a Opção: USAR A CONTA DO DRUPALISTA-BR NO GITHUB.COM
      
      a) Compacte os arquivos de sua implementação e coloque em qualquer lugar na internet onde possa ser
         baixado.

      c) Abra um novo Issue em https://github.com/drupalista-br/Boleto/issues e poste o link para que
         possa ser baixado e testado.

      d) Uma vez aprovado eu criarei um novo repositório na conta do drupalista-br onde a sua
         implementação será publicada. Sera dado os devidos creditos a sua autoria, mas o release
         tem que ser sob a versão 2 or higher da GNU General Public License.

         NOTA: Caso você deseje, poder de administrador poderá ser dada a você para administrar o
               repositório de sua implementação.

               Entretanto é imprecindivel que você saiba usar a ferramenta git. Informações sobre o git em
               http://pt.wikipedia.org/wiki/Git
 
               Sim, o git pode ser usado no Windows, antes que alguém pergunte. Entretanto peço gentilmente
               que não poste perguntas sobre o git na lista de Issues pois existem varios lugares
               mais apropriados na internet que melhor podem sanar suas dúvidas a respeito do assunto.


