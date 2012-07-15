# Readme

## Pastas

### v1.0

Versão estavel procedural do boletoPHP. Mantida aqui apenas para consulta e acesso rápido. Antes de integrar isto ao projeto ela deve removida.

### imagens

Copiada do v1.0, terá que ser revista se ficará dentro de library e remover imagens não utilizadas e alterar a qualidade das mesmas.

### library

Versão em desenvolvimento.

### tests

Onde ficam os testes.

### samples

Exemplo do uso do BoletoPHP já com orientação a objeto. Como é um exemplo real, o sample criado aqui deve ter a mesma saida do criado no v1. Exemplo:

        samples/caixa_economica_federal.php         => boleto_cef
        samples/caixa_economica_federal_sigcb.php   => boleto_cef_sigcb.php

Por isso ele deve receber os mesmos parametros do seu equivalente na v1. Aqui seria além dos testes automatizados vermos uma versão real do projeto rodando.

Esta pasta provavelmente será removida, e criada um novo repositório para ela ou a manteremos aqui mesmo. Pensar depois sobre isto.

## Rodando os testes

Basta acessar o diretório de testes e rodar o phpunit.

        $ cd /my/BoletoPHP/tests
        $ phpunit .