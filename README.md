# BoletoPHP

## O projeto

O BoletoPHP é um projeto open source para a geração de boletos em PHP. No entanto, como estava com um código que não era mais mantido e bastante de desatualizado, foi decidido atualizar o mesmo, para incluir tudo o que há de melhor no PHP.

O Objetivo deste branch é portar toda a base de código antigo para o que há de melhor no PHP, para em seguida integrarmos no master e assim podermos lançar uma versão nova do BoletoPHP.


## Instalação

Apenas fazer download do projeto e colocar no diretório de sua preferência.

Os boletos criados possuem exemplos que podem ser encontrados em **/samples**

## Onde obter ajuda

Para obter ajuda você pode procurar o pessoal na lista do [PHP Rio](http://groups.google.com/group/phprio-org).

## Contribuindo

### Antes de tudo

1. Faça um Fork
2. Crie seu feature branch (<code>git checkout -b my-new-feature</code>)
3. Faça commit de suas mudanças (<code>git commit -am 'Added some feature'</code>)
4. De push para o seu branch (<code>git push origin my-new-feature</code>)
5. Crie um pull Request

### Um pouco de contexto

Este é o modo que venho fazendo, e para o sucesso do projeto, pelo menos neste inicio enquanto estamos em um feature branch algumas coisas feias devem ser feitas =/

### Diretórios

Vamos entender como venho organizando os diretórios neste primeito momento.

#### v1.0

Versão estavel procedural do boletoPHP. Mantida aqui apenas para consulta e acesso rápido. **Antes de integrar isto ao projeto ela deve removida**.

#### imagens

Copiada do v1.0, terá que ser revista se ficará dentro de library e remover imagens não utilizadas e alterar a qualidade das mesmas.

#### library

Versão em desenvolvimento.

#### tests

Onde ficam os testes.

#### samples

Exemplo do uso do BoletoPHP já com orientação a objeto. Como é um exemplo real, o sample criado aqui deve ter a mesma saida do criado no v1. Exemplo:

        samples/caixa_economica_federal.php         => boleto_cef
        samples/caixa_economica_federal_sigcb.php   => boleto_cef_sigcb.php

Por isso ele deve receber os mesmos parametros do seu equivalente na v1. Aqui seria além dos testes automatizados vermos uma versão real do projeto rodando.

Esta pasta provavelmente será removida, e criada um novo repositório para ela ou a manteremos aqui mesmo. Pensar depois sobre isto.

### Escolhendo um boleto

Abra a pasta <code>v1.0</code> e selecione um boleto que ainda não foi implementado em <code>library/BoletoPHP/Boletos/</code>.

### Criando o nova implementação do boleto

Crie uma classe em <code>library/BoletoPHP/Boletos/</code> com o nome do boleto sempre em upper CamelCase, assim como o nome do arquivo, nome sempre bem descritivo. Exemplo: <code>CaixaEconomicaFederalSINCO</code> e <code>CaixaEconomicaFederalSIGCB</code> e **não** <code>CaixaSINCO</code>, <code>CaixaSINCO.class</code>, <code>caixa_sinco</code>.

Copie o arquivo <code>CaixaEconomicaFederal.php</code> e trabalhe a partir dele.

### Criando o teste

Em <code>tests/library/BoletoPHP/Boletos/</code> crie um arquivo de teste copiando o do <code>CaixaEconomicaFederalTest.php</code> e trabalhe a partir dele;

No arquivo de test passe para os parametros os mesmos valores passados pelo boleto do v1.0.

### Criando a fixture do código de barras

Para testar o boleto é necessário testar também o código de barras gerado. Para isso, abrir o boleto do <code>v1.0</code> equivalente e copiar o seu código de barras, substituindo apenas o <code>imagens/</code> por <code>../imagens/</code>.

### Criando a view do boleto

Em <code>library/BoletoPHP/views/</code> ficam armazenadas as views dos boletos. Para criar a mesma copie sua equivalente do <code>v1.0/layout\_meu\_boleto.php</code> para a pasta <code>library/BoletoPHP/views/**MeuBoleto.php**</code>, e altere as variaveis para exibir de acordo com as geradas pelo boleto.

Mesmo sabendo que é repetido, depois poderemos refatorar para apenas uma view se for possivel. No entanto neste primeiro momento uma view por boleto.

### Arquivos necessários para gerar um boleto

### Criando o exemplo

Para gerar um boleto, os seguintes arquivos devem ter sido criados:

* <code>library/BoletoPHP/Boletos/**MeuBoleto.php**</code>
* <code>tests/library/BoletoPHP/Boletos/**MeuBoleto.php**</code>
* <code>tests/fixtures/codigo\_de\_barras\_**meu_boleto**</code>
* <code>library/BoletoPHP/views/**MeuBoleto.php**</code>
* <code>samples/**meu_boleto.php**</code>


### Algumas convenções

Já vimos como nomear os arquivos e classes. Veremos mais alguns padrões, **que devem ser seguidos para seu código ser aceito**, isto tudo pois queremos manter a qualidade do projeto.

* Métodos nomeados em lower camelCase.

* Tudo em português, variaveis, nomes de arquivos, métodos, commits etc. Sei que tem algumas coias que estão em ingles, ou foram copiadas do outro ou criado por mim, mais no refactory irá tudo para português. Por isso código novo seguindo isto.

* Defina sempre a visibilidade dos métodos e atributos para a mais restrita possivel.

* Nada de <code>\_</code> ou <code>\_\_</code> para dizer se um método é privado ou protected para isso temos os declaradores de visibilidade.

* Agora vem a parte mais feia que falei =/, nos métodos que por um acaso tivermos que copiar do <code>v1.0</code> [como o](https://github.com/maurogeorge/boletophp/blob/refactory-oop/library/BoletoPHP/Boletos/Boleto.php#L259) manter a mesma nomenclatura e implementação, por mais feia que seja nos ajudara a encontrar seu equivalente no v1.0 se for necessário. Claro que antes de integrarmos tudo no master, iremos nomear tudo para nomes mais bonitos e de acordo com o padrão, além de refatorar S2.

* Sempre seguirmos a [PSR](https://github.com/php-fig/fig-standards). Pode usar, recomendo, o [PHP Coding Standards Fixer](http://cs.sensiolabs.org/) para deixar o código de acordo com a PSR-2.

* Código sem teste não será aceito. Realize os testes com o [PHPUnit](https://github.com/sebastianbergmann/phpunit/).

* Siga a definição de [namespace](http://br2.php.net/manual/en/language.namespaces.php).

Ps.: Caso observe alguma convenção quebrada, sinta-se livre para corrigir ou reportar, para consertarmos e mantermos o projeto sempre melhor.

### Dicas

* Sempre pode olhar os arquivos de código em <code>library/BoletoPHP/Boletos/</code> e seus testes em <code>tests/library/BoletoPHP/Boletos/</code> caso tenha alguma dúvida.
* Nos testes é gerado uma variavel <code>$time</code> no <code>setUp</code>, ela é usada para definir a data atual, em que você está escrevendo o boleto, altere-a de acordo com o time do dia e hora em que estiver trabalhando.
* Acho legal abrir um boleto do <code>v1.0</code> em uma janela, e pegar os valores dele e colocar como o esperado no seu teste. Pois são os válores que estamos esperando no teste um boleto válido.
* Recomendo se possivel, iniciar e terminar um boleto no mesmo dia. Isso por que devido a ter testes sensiveis a data, ao abrir o boleto do <code>v1.0</code> para ver qual o valor que deve ser o experado no teste, no dia seguinte ele tera mudado e seus testes quebraram. Tomei uma porrada por isso =/

### Rodando os testes

Basta acessar o diretório de testes e rodar o phpunit.

        $ cd /my/BoletoPHP/tests
        $ phpunit .

## Alternativas

1. [Boleto Library PHP](https://github.com/drupalista-br/Boleto) - Outra implementação em PHP
2. [pyboleto](https://github.com/eduardocereto/pyboleto) - Implementação em Python

## Sobre o readme

Deverá ser revisto, antes de integrar no master para representar o estado real do projeto e as novas informações.
