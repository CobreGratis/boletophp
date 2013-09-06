boletophp
=========

Projeto Código-Aberto de Sistema de Boletos bancários em PHP

## Qual o principal motivo deste projeto?
Este projeto foi criado por Elizeu Alcantara desde Maio/2006 e teve origem do Projeto BBBoletoFree que tiveram colaborações de Daniel William Schultz e Leandro Maniezo que por sua vez foi derivado do PHPBoleto de João Prado Maia e Pablo Martins F. Costa.

Criar um sistema de geração de Boletos que seja mais simples do que o PhpBoleto e que se estenda ao desenvolvimento de boletos dos bancos mais usados no mercado, além do Banco do Brasil do projeto BBBoletoFree. Este sistema é de Código Aberto e de Livre Distribuição conforme Licença GPL.

Este projeto visa atender exclusivamente aos profissionais e desenvolvedores na área técnica de programação PHP dos boletos, portanto se faz necessário conhecimento desejado e estudo do mesmo para a perfeita configuração do boleto a ser usado, sendo de inteira responsabilidade do profissional a instalação, funcionamento, testes e compensação do mesmo em conta bancária, pois não damos suporte técnico, portanto mensagens enviadas a nós com dúvidas gerais, técnicas ou solicitações de Suporte não serão respondidas.

O projeto BoletoPhp não tem foco na questão administrativa, comercial ou jurídica, pois isto compete exclusivamente aos bancos devido as suas particularidades existentes de cada carteira de cada boleto. Maiores informações sobre o conceito de Boleto de Cobrança, você pode acessar aqui o site da Wikipédia

## Qual a principal idéia deste projeto?
Padronizar um formato simples de geração de boletos de cada banco baseado em um padrão composto somente de 3 arquivos php

Tomamos como exemplo o Boleto do Caixa Econômica, onde temos:

- boleto_cef.php : Aqui ficam os DADOS usados para a geração do boleto
- layout_cef.php : Aqui fica a estrutura HTML para a geração do boleto
- funcoes_cef.php : Aqui ficam as FUNÇOES usadas para a geração do boleto 

## Este conceito do BoletoPHP facilita a criação de boletos de outros bancos?
Sim, pois facilita para um desenvolvedor para que seja dado continuidade no Projeto BoletoPHP para o desenvolvimento dos demais bancos, pois o principal trabalho para criar o boleto de um novo banco é criar o arquivo php de funções ( no caso acima o funcoes_cef.php) , onde estão as regras de cada banco para a geração das 2 principais informações do boleto que são a Linha Digitável e o Código de Barras, já que no layout_xxxx.php muda apenas a logo do banco e no arquivo boleto_xxxx.php acrescenta poucas variáveis específicas de cada banco.

## Boletos/Bancos Desenvolvidos
| Banco / Entidade                            | Carteira                                                           |
| ------------------------------------------- | ------------------------------------------------------------------ |
| Banco do Brasil	                            | 18 - Convênio de 6 , 7 ou 8 Dígitos                                |
| Unibanco	                                  | Especial - Sem Registro                                            |
| Caixa Econômica	                            | SR [SICOB, SINCO e SIGCB]                                          |
| Itaú	                                      | 175 / 174 / 178 / 104 / 109 - Sem Registro                         |
| Hsbc	                                      | CNR - Sem Registro                                                 |
| Bradesco	                                  | 06 / 03 - Sem Registro                                             |
| Banestes	                                  | 00 - Sem Registro                                                  |
| Real	                                      | 57 - Sem Registro                                                  |
| Nossa Caixa	                                | 5 [Cobrança Direta] ou Carteira 1 [Cobrança Simples]               |
| Sudameris (Integrado ao Banco Real)	        | 57 [Cobrança Sem registro] ou Carteira 20 [Cobrança Com registro]  |
| Santander-Banespa (Banco 033 - Antigo 353)  | 102 - Sem registro                                                 |
| Santander-Banespa (Banco 033)	              | COB - Sem registro                                                 |
| Bancoob	                                    | 01 [SICOOB] - Sem registro                                         |
| BESC	                                      | 25 - Sem registro                                                  |
| Sicredi	                                    | A - Simples                                                        |
