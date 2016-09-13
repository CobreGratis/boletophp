# BoletoPHP [![Build Status](https://travis-ci.org/brenodouglas/boletophp.svg?branch=2.x-dev)](https://travis-ci.org/brenodouglas/boletophp)

## O projeto

O BoletoPHP � um projeto open source para a gera��o de boletos em PHP. No entanto, como estava com um c�digo que n�o era mais mantido e bastante de desatualizado, foi decidido atualizar o mesmo, para incluir tudo o que h� de melhor no PHP.

O Objetivo deste branch � portar toda a base de c�digo antigo para o que h� de melhor no PHP, para em seguida integrarmos no master e assim podermos lan�ar uma vers�o nova do BoletoPHP.


## Instala��o

Apenas fazer download do projeto e colocar no diret�rio de sua prefer�ncia.

Os boletos criados possuem exemplos que podem ser encontrados em **/samples**

### Utilizando docker
1. J� tendo docker e docker-compose instalado em sua m�quina, esteja na ra�z deste projeto e utilize o seguinte comando:
```
  docker-compose up -d
```
2. Acesse http://localhost:8080/samples/caixa_economica_federal_sigcb.php
3. Para parar o container s� rodar:
```
  docker-compose stop
```
## Onde obter ajuda

Para obter ajuda voc� pode procurar o pessoal na lista do [PHP Rio](http://groups.google.com/group/phprio-org).

## Contribuindo

### Resumo da �pera

1. Fa�a um Fork
2. Crie seu feature branch (<code>git checkout -b my-new-feature</code>)
3. Fa�a commit de suas mudan�as (<code>git commit -am 'Added some feature'</code>)
4. De push para o seu branch (<code>git push origin my-new-feature</code>)
5. Crie um pull Request

### Um pouco de contexto

Este � o modo que venho fazendo, e para o sucesso do projeto, pelo menos neste inicio enquanto estamos em um feature branch algumas coisas feias devem ser feitas =/

### Diret�rios

Vamos entender como venho organizando os diret�rios neste primeito momento.

#### v1.0

Vers�o estavel procedural do boletoPHP. Mantida aqui apenas para consulta e acesso r�pido. **Antes de integrar isto ao projeto ela deve removida**.

#### imagens

Copiada do v1.0, ter� que ser revista se ficar� dentro de library e remover imagens n�o utilizadas e alterar a qualidade das mesmas.

#### library

Vers�o em desenvolvimento.

#### tests

Onde ficam os testes.

#### samples

Exemplo do uso do BoletoPHP j� com orienta��o a objeto. Como � um exemplo real, o sample criado aqui deve ter a mesma saida do criado no v1. Exemplo:

        samples/caixa_economica_federal.php         => boleto_cef
        samples/caixa_economica_federal_sigcb.php   => boleto_cef_sigcb.php

Por isso ele deve receber os mesmos parametros do seu equivalente na v1. Aqui seria al�m dos testes automatizados vermos uma vers�o real do projeto rodando.

Esta pasta provavelmente ser� removida, e criada um novo reposit�rio para ela ou a manteremos aqui mesmo. Pensar depois sobre isto.

### Escolhendo um boleto

Abra a pasta <code>v1.0</code> e selecione um boleto que ainda n�o foi implementado em <code>library/BoletoPHP/Boletos/</code>.

### Criando o nova implementa��o do boleto

Crie uma classe em <code>library/BoletoPHP/Boletos/</code> com o nome do boleto sempre em upper CamelCase, assim como o nome do arquivo, nome sempre bem descritivo. Exemplo: <code>CaixaEconomicaFederalSINCO</code> e <code>CaixaEconomicaFederalSIGCB</code> e **n�o** <code>CaixaSINCO</code>, <code>CaixaSINCO.class</code>, <code>caixa_sinco</code>.

Copie o arquivo <code>CaixaEconomicaFederal.php</code> e trabalhe a partir dele.

### Criando o teste

Em <code>tests/library/BoletoPHP/Boletos/</code> crie um arquivo de teste copiando o do <code>CaixaEconomicaFederalTest.php</code> e trabalhe a partir dele;

No arquivo de test passe para os parametros os mesmos valores passados pelo boleto do v1.0.

### Criando a fixture do c�digo de barras

Para testar o boleto � necess�rio testar tamb�m o c�digo de barras gerado. Para isso, abrir o boleto do <code>v1.0</code> equivalente e copiar o seu c�digo de barras, substituindo apenas o <code>imagens/</code> por <code>../imagens/</code>.

### Criando a view do boleto

Em <code>library/BoletoPHP/views/</code> ficam armazenadas as views dos boletos. Para criar a mesma copie sua equivalente do <code>v1.0/layout\_meu\_boleto.php</code> para a pasta <code>library/BoletoPHP/views/**MeuBoleto.php**</code>, e altere as variaveis para exibir de acordo com as geradas pelo boleto.

Mesmo sabendo que � repetido, depois poderemos refatorar para apenas uma view se for possivel. No entanto neste primeiro momento uma view por boleto.

### Arquivos necess�rios para gerar um boleto

### Criando o exemplo

Para gerar um boleto, os seguintes arquivos devem ter sido criados:

* <code>library/BoletoPHP/Boletos/**MeuBoleto.php**</code>
* <code>tests/library/BoletoPHP/Boletos/**MeuBoleto.php**</code>
* <code>tests/fixtures/codigo\_de\_barras\_**meu_boleto**</code>
* <code>library/BoletoPHP/views/**MeuBoleto.php**</code>
* <code>samples/**meu_boleto.php**</code>


### Algumas conven��es

J� vimos como nomear os arquivos e classes. Veremos mais alguns padr�es, **que devem ser seguidos para seu c�digo ser aceito**, isto tudo pois queremos manter a qualidade do projeto.

* M�todos nomeados em lower camelCase.

* Tudo em portugu�s, variaveis, nomes de arquivos, m�todos, commits etc. Sei que tem algumas coias que est�o em ingles, ou foram copiadas do outro ou criado por mim, mais no refactory ir� tudo para portugu�s. Por isso c�digo novo seguindo isto.

* Defina sempre a visibilidade dos m�todos e atributos para a mais restrita possivel.

* Nada de <code>\_</code> ou <code>\_\_</code> para dizer se um m�todo � privado ou protected para isso temos os declaradores de visibilidade.

* Agora vem a parte mais feia que falei =/, nos m�todos que por um acaso tivermos que copiar do <code>v1.0</code> [como o](https://github.com/maurogeorge/boletophp/blob/refactory-oop/library/BoletoPHP/Boletos/Boleto.php#L259) manter a mesma nomenclatura e implementa��o, por mais feia que seja nos ajudara a encontrar seu equivalente no v1.0 se for necess�rio. Claro que antes de integrarmos tudo no master, iremos nomear tudo para nomes mais bonitos e de acordo com o padr�o, al�m de refatorar S2.

* Sempre seguirmos a [PSR](https://github.com/php-fig/fig-standards). Pode usar, recomendo, o [PHP Coding Standards Fixer](http://cs.sensiolabs.org/) para deixar o c�digo de acordo com a PSR-2.

* C�digo sem teste n�o ser� aceito. Realize os testes com o [PHPUnit](https://github.com/sebastianbergmann/phpunit/).

* Siga a defini��o de [namespace](http://br2.php.net/manual/en/language.namespaces.php).

* Todo �ltimo item de um array deve conter a virgula. Baseado na proposta da [PEP8](https://dev.launchpad.net/PythonStyleGuide#Multiline_braces).

Ps.: Caso observe alguma conven��o quebrada, sinta-se livre para corrigir ou reportar, para consertarmos e mantermos o projeto sempre melhor.

### Dicas

* Sempre pode olhar os arquivos de c�digo em <code>library/BoletoPHP/Boletos/</code> e seus testes em <code>tests/library/BoletoPHP/Boletos/</code> caso tenha alguma d�vida.
* Nos testes � gerado uma variavel <code>$time</code> no <code>setUp</code>, ela � usada para definir a data atual, em que voc� est� escrevendo o boleto, altere-a de acordo com o time do dia e hora em que estiver trabalhando.
* Acho legal abrir um boleto do <code>v1.0</code> em uma janela, e pegar os valores dele e colocar como o esperado no seu teste. Pois s�o os valores que estamos esperando no teste um boleto v�lido.
* Recomendo se possivel, iniciar e terminar um boleto no mesmo dia. Isso por que devido a ter testes sensiveis a data, ao abrir o boleto do <code>v1.0</code> para ver qual o valor que deve ser o experado no teste, no dia seguinte ele tera mudado e seus testes quebraram. Tomei uma porrada por isso =/

### Rodando os testes

Basta acessar o diret�rio de testes e rodar o phpunit.

        $ cd /my/BoletoPHP/tests
        $ phpunit .

## Alternativas

1. [Boleto Library PHP](https://github.com/drupalista-br/Boleto) - Outra implementa��o em PHP
2. [pyboleto](https://github.com/eduardocereto/pyboleto) - Implementa��o em Python

## Sobre o readme

Dever� ser revisto, antes de integrar no master para representar o estado real do projeto e as novas informa��es.

## Para o futuro

* Definir licen�a
* Usar o [Travis CI](http://travis-ci.org/)
