# Readme

## Contribuindo

Este é o modo que venho fazendo, e para o sucesso do projeto, pelo menos neste inicio enquanto estamos em um feature branch algumas coisas feias devem ser feitas =/

### Escolhendo um boleto

Abra a pasta <code>v1.0</code> e selecione um boleto que ainda não foi implementado em <code>library/BoletoPHP/Boletos/</code>.

### Criando o nova implementação do boleto

Crie uma classe em <code>library/BoletoPHP/Boletos/</code> com o nome do boleto sempre em upper CamelCase, assim como o nome do arquivo. Copie o arquivo <code>CaixaEconomicaFederal.php</code> e trabalhe a partir dele.

### Criando o teste

Em <code>tests/library/BoletoPHP/Boletos/</code> crie um arquivo de teste copiando o do <code>CaixaEconomicaFederalTest.php</code> e trabalhe a partir dele

No arquivo de test passe para os parametros os mesmos valores passados pelo boleto do v1.0.

### Alguns padrões

Já vimos como nomear os arquivos e classes.

Métodos nomeados em lower camelCase.

Defina sempre a visibilidade dos métodos e atributos para a mais restrita possivel.

Nada de <code>_</code> ou <code>__</code> para dizer se um método é privado ou protected para isso temos os declaradores de visibilidade.

Agora vem a parte mais feia que falei =/, nos métodos que por um acaso tivermos que copiar do v1.0 como o https://github.com/maurogeorge/boletophp/blob/refactory-oop/library/BoletoPHP/Boletos/Boleto.php#L237 manter a mesma nomenclatura e implementação, por mais feia que seja nos ajudara a encontrar seu equivalente no v1.0 se for necessário. Claro que antes de integrarmos tudo no master, iremos nomear tudo para nomes mais bonitos e de acordo com o padrão, além de refatorar S2.

### Observação

Legal sempre seguirmos a https://github.com/php-fig/fig-standards.

### Mais como faz?

1 Faça um Fork
2 Crie seu feature branch (git checkout -b my-new-feature)
3 Commit suas mudanças (git commit -am 'Added some feature')
4 De push para o seu branch (git push origin my-new-feature)
5 Crie um pull Request

### Pastas

#### v1.0

Versão estavel procedural do boletoPHP. Mantida aqui apenas para consulta e acesso rápido. Antes de integrar isto ao projeto ela deve removida.

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

## Rodando os testes

Basta acessar o diretório de testes e rodar o phpunit.

        $ cd /my/BoletoPHP/tests
        $ phpunit .