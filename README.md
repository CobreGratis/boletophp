# BoletoPHP

Projeto Código-Aberto de Sistema de Boletos bancários em PHP

---

## O projeto de boleto bancário open-source

### Qual o principal motivo deste projeto?

Este projeto foi criado por Elizeu Alcantara desde Maio/2006 e teve origem do Projeto BBBoletoFree que tiveram colaborações de Daniel William Schultz e Leandro Maniezo que por sua vez foi derivado do PHPBoleto de João Prado Maia e Pablo Martins F. Costa.

Criar um sistema de geração de Boletos que seja mais simples do que o PhpBoleto e que se estenda ao desenvolvimento de boletos dos bancos mais usados no mercado, além do Banco do Brasil do projeto BBBoletoFree. Este sistema é de Código Aberto e de Livre Distribuição conforme Licença GPL.

Este projeto visa atender **exclusivamente** aos profissionais e desenvolvedores na área técnica de programação PHP dos boletos, portanto se faz necessário conhecimento desejado e estudo do mesmo para a perfeita configuração do boleto a ser usado, sendo de inteira responsabilidade do profissional a instalação, funcionamento, testes e compensação do mesmo em conta bancária, pois **não damos suporte técnico**, portanto mensagens enviadas a nós com dúvidas gerais, técnicas ou solicitações de Suporte não serão respondidas.

O projeto BoletoPhp não tem foco na questão administrativa, comercial ou jurídica, pois isto compete exclusivamente aos bancos devido as suas particularidades existentes de cada carteira de cada boleto. Maiores informações sobre o conceito de Boleto de Cobrança, você pode acessar aqui o site da [Wikipédia](http://pt.wikipedia.org/wiki/Boleto_de_cobrança)

### Qual a principal idéia deste projeto?

Padronizar um formato simples de geração de boletos de cada banco baseado em um padrão composto somente de 3 arquivos php

Tomamos como exemplo o Boleto do Caixa Econômica, onde temos:

- **boleto_cef.php** : Aqui ficam os DADOS usados para a geração do boleto
- **layout_cef.php** : Aqui fica a estrutura HTML para a geração do boleto
- **funcoes_cef.php** : Aqui ficam as FUNÇÕES usadas para a geração do boleto

### Este conceito do BoletoPHP facilita a criação de boletos de outros bancos?

Sim, pois facilita para um desenvolvedor para que seja dado continuidade no Projeto BoletoPHP para o desenvolvimento dos demais bancos, pois o principal trabalho para criar o boleto de um novo banco é criar o arquivo php de funções (no caso acima o funcoes_cef.php), onde estão as regras de cada banco para a geração das 2 principais informações do boleto que são a Linha Digitável e o Código de Barras, já que no layout_xxxx.php muda apenas a logo do banco e no arquivo boleto_xxxx.php acrescenta poucas variáveis específicas de cada banco.

### Como eu acompanho o desenvolvimento deste projeto?

Atualmente o BoletoPHP está na **Versão 0.17**, cuja as 2 casas decimais significam a quantidade de boletos desenvolvidos dentro do sistema. Desta forma fica simples saber qual a versão mais nova disponível para Download e quantos bancos já compõe determinada versão e assim por diante.

### Faça parte desta revolução e colabore com este projeto.

Todos os voluntários estarão com o seu nome publicados na área de Créditos do site e do sistema, para valorizar os profissionais que sabem a importância de ter uma ferramenta com Código Aberto como esta em suas mãos e para os seus negócios e para os seus clientes, pois da mesma forma que você foi ajudado, você também pode estar retribuindo com 30 minutos do seu tempo e assim ajudando outros, e como num ciclo, sendo ajudado logo adiante com boleto de um outro banco que você pode precisar ;-)

---

## Boletos/Bancos Desenvolvidos

| Banco / Entidade                            | Carteira                                                           |
| ------------------------------------------- | ------------------------------------------------------------------ |
| Banco do Brasil                             | 18 - Convênio de 6, 7 ou 8 Dígitos                                |
| Unibanco                                    | Especial - Sem Registro                                            |
| Caixa Econômica                             | SR [SICOB, SINCO e SIGCB]                                         |
| Itaú                                        | 175 / 174 / 178 / 104 / 109 - Sem Registro                        |
| Hsbc                                        | CNR - Sem Registro                                                 |
| Bradesco                                    | 06 / 03 - Sem Registro                                             |
| Banestes                                    | 00 - Sem Registro                                                  |
| Real                                        | 57 - Sem Registro                                                  |
| Nossa Caixa                                 | 5 [Cobrança Direta] ou Carteira 1 [Cobrança Simples]              |
| Sudameris (Integrado ao Banco Real)         | 57 [Cobrança Sem registro] ou Carteira 20 [Cobrança Com registro]  |
| Santander-Banespa (Banco 033 - Antigo 353)  | 102 - Sem registro                                                 |
| Santander-Banespa (Banco 033)               | COB - Sem registro                                                 |
| Bancoob                                     | 01 [SICOOB] - Sem registro                                        |
| BESC                                        | 25 - Sem registro                                                  |
| Sicredi                                     | A - Simples                                                        |

---

## Grade de Boletos x Desenvolvedores

A grade tem o objetivo de permitir a todos uma visão dinâmica sobre o desenvolvimento do projeto, tanto dos Boletos concluídos como dos que precisam de Voluntários. Você pode ajudar participando como Desenvolvedor do Boleto de um determinado banco.

Para você iniciar o desenvolvimento de um dos boletos basta fazer o Download dos:
- Layout Bancário (Documentação)
- Código-fonte do BoletoPhp

**Layout Bancário**: Você terá as informações necessárias para gerar os dados do boleto de acordo com o padrão do banco em questão.

**Código-fonte**: Você terá o Boleto da Caixa Econômica do BoletoPhp que servirá de base para a criação de novos bancos para o BoletoPhp. Ele é composto de 3 arquivos php e as imagens que compõe o boleto. A medida que você vá desenvolvendo, você mesmo administra o Status para acompanhamento de todos em tempo real (se está Concluído/Testado ou não, ou colocar porcentagem se preferir sobre o andamento do seu desenvolvimento).

| Banco | Carteira Convênio | Desenvolvedor | Testado |
| --- | --- | --- | --- |
| Unibanco | Especial | Elizeu Alcantara | Sim |
| BB | 18 p/ Convênio de 6 Dig | Leandro Maniezo | Sim |
| BB | 18 p/ Convênio de 7 Dig | Rogerio Dias Pereira | Sim |
| BB | 18 p/ Convênio de 8 Dig | Romeu Medeiros | Sim |
| Caixa | SR (SICOB) | Elizeu Alcantara | Sim |
| Caixa | SIGCB | Davi Camargo / Leandro Vieira Pinho | Sim |
| Caixa | SINCO | Carlos Magno / Reinaldo Silva / Alberto Braschi | Sim |
| Bradesco | 06 / 03 / 09 | Ramon Soares | Sim |
| Hsbc | CNR | Bruno L. Goncalves | Sim |
| Itau | 175 174 178 104 109 157 | Glauber Portella | Sim |
| Santander 033 (Antigo 353) | 102 | Fabio Lenharo | Sim |
| Santander Banespa 033 | COB | Fabio Gabbay | Sim |
| Real | 57 | Juan Basso | Sim |
| Banrisul | - | Felipe / Wallace Belato | Não |
| BESC | 25 | Lucas Ferreira | Sim |
| NossaCaixa | 5 / 1 | Keitty Suelen | Sim |
| Mercantil | 01 - Registro | Marcel Padilha | Aguarda voluntário |
| Banestes | 00 - Sem Registro | Fernando Chagas | Sim |
| Safra | 06 | Fábio Souza | Aguarda voluntário |
| Bancoob | 01 (SICOOB) | Marcelo Souza | Sim |
| Sicredi | A (Simples) | Rafael Azenha Aquini / Marco Antonio Righi / Marcelo Belinato | Sim |

Após a conclusão de um Novo Boleto, abra uma [issue no GitHub](https://github.com/CobreGratis/boletophp/issues) com os arquivos do código desenvolvido do Boleto. Na sequência será realizado testes e agregado ao BoletoPhp e disponibilizado a nova versão para Download. Será colocado o seu nome na área de Créditos do site e do arquivo de Download do BoletoPhp.

---

## Download

- [Download do projeto](https://github.com/CobreGratis/boletophp/zipball/master)
- [Código fonte do projeto](https://github.com/CobreGratis/boletophp)

---

## Pessoas que já doaram e/ou contribuíram com o Projeto BoletoPhp

- Jakson Ribeiro de Santana
- Jomar T. Gontijo
- Daniel Franco Valladão
- Wanderson Lemos Correia
- Leandro Pileggi
- Vinicius Cruz
- Rafael da Costa Rola
- Leandro Calil
- Edmir Este
- Weslei Coutinho da Silveira
- Humberto Beneduzzi
- Luiz A. Konrath
- Wil Lopes
- Bruno Assarisse
- Everaldo Matias
- José Q S Filho
- Antonio Bacelar Jr
- Douglas de Oliveira Tybel
- Ivan G Andrade
- J Iuri S Souza
- Cedilha Comunicação Digital
- Paulo Costa
- Leonildo Agnaldo
- Julião Kaiser
- Ricardo Cesar Oliveira
- Joaquim Batista Ramos
- Lucas Mariano
- Paulo Roberto G. Marangon
- Te.Hospedo.com.br
- Vinicius Borsato Forte
- rTurbo.net
- Flávia Jobstraibizer
- Geordano Dalmédico
- Rodrigo Muller
- R dos Santos Sistemas
- Leonardo Ribeiro
- Tiago Neves
- Márcio Seabra
- Maycon Souza Freitas
- Lucio Flavio F. Motta
- Carlos Eduardo Silveira
- Dalton Said Henriques Júnior
- Luciano Linhares Martins
- Pro Redes - Sistemas Integrados
- Ludy Amano
- Ruy Santiago
- Rael Antônio Carneiro Vaz
- Nataniel Jose Amorim Fiuza
- Paulo Henrique
- Mozart Claret
- Ronaldo Fernandes
- Angelo M. Rodrigues
- Geraldo Lima
- Filipe Ramalho Simões
- Diego Xavier
- Thyago Maciel
- Hendrickson Couto Hoffmann
- Samuel de L. Hantschel
- Wilson Franco Borges Júnior
- Leonardo Filipe
- Direto Da Fabrica Ltda
- Thiago Silva

---

## Suporte? Dúvidas?

A implantação e o uso prático do BoletoPhp dentro da sua programação ou site **é de inteira responsabilidade do programador e/ou desenvolvedor**, pois o mesmo precisa TER um servidor (Linux ou Windows) com o PHP instalado e TER domínio sobre estes 3 pontos:

1. Domínio de Programação PHP
2. Conhecimento das Políticas de Uso de boletos e de que forma é usado administrativamente (mais informações sobre este ponto, entre em contato com o gerente do seu banco).
3. Estudar a programação do projeto BoletoPhp

O Projeto BoletoPhp (como qualquer outro projeto voluntário) depende exclusivamente da disponibilidade de tempo e conhecimento dos colaboradores voluntários que ajudam a manter e evoluir o desenvolvimento deste projeto Open-Source.

Naturalmente, considerando isto, NÃO damos Suporte e também NÃO respondemos emails com relação ao uso ou questões/dúvidas relacionados aos 3 pontos acima, pois o objetivo do Projeto BoletoPhp é DAR a solução na geração de boletos dentro da sua programação PHP, que é um dos maiores desafios hoje em dia quando se necessita deste tipo de solução.

Em resposta as várias perguntas que recebemos sobre o uso do BoletoPhp, informamos que o programador/desenvolvedor que utiliza o BoletoPhp:

1. Deve ter, no mínimo, os conhecimentos fundamentais e básicos sobre os 3 pontos acima para que seja usado de forma correta o BoletoPhp dentro do seu projeto ou aplicação web de geração de boletos e administração dos mesmos.
2. É de inteira responsabilidade do profissional/programador a instalação e funcionamento do BoletoPhp em seus aplicativos.
3. É de inteira responsabilidade do profissional/programador os testes de pagamentos e compensação do mesmo em conta bancária, para que seja integrado e ajustado de forma responsável no desenvolvimento dos seus negócios e/ou aplicações web ANTES de que seja colocado em produção para emissão dos seus boletos junto aos seus clientes.

**As mensagens que são enviadas a nós com dúvidas gerais, técnicas ou solicitações de Suporte não serão respondidas**. Para notificações de bugs, abra uma [issue no GitHub](https://github.com/CobreGratis/boletophp/issues).

---

## Créditos / Colaboradores

| Foto | Colaborador | Contribuição |
| :---: | --- | --- |
| <img src="img/creditos/foto_elizeu_alcantara.jpg" width="80"> | **Elizeu Alcantara** | Mantenedor e Coordenador do Projeto BoletoPhp / Boletos Unibanco e Caixa Econômica |
| <img src="img/creditos/foto_joao_prado.jpg" width="80"> | **João Prado Maia e Pablo Martins F. Costa** | PhpBoleto |
| <img src="img/creditos/foto_leandro_maniezo.jpg" width="80"> | **Daniel William Schultz / Leandro Maniezo / Rodrigo Dias Pereira** | BBBoletoFree e Boleto Banco do Brasil |
| <img src="img/creditos/foto_glauber_portella.jpg" width="80"> | **Glauber Portella** | Boleto Itaú |
| <img src="img/creditos/foto_bruno_leonardo.jpg" width="80"> | **Bruno Leonardo Gonçalves** | Boleto Hsbc |
| <img src="img/creditos/foto_sem_imagem.gif" width="80"> | **Ramon Soares** | Boleto Bradesco |
| <img src="img/creditos/foto_fernando_chagas.jpg" width="80"> | **Fernando José de Oliveira Chagas** | Boleto Banestes |
| <img src="img/creditos/foto_juan_basso.jpg" width="80"> | **Juan Basso** | Boleto Real |
| <img src="img/creditos/foto_sem_imagem.gif" width="80"> | **Keitty Suélen** | Boleto NossaCaixa |
| <img src="img/creditos/foto_sem_imagem.gif" width="80"> | **Flávio Yutaka Nakamura** | Boleto Sudameris |
| <img src="img/creditos/foto_sem_imagem.gif" width="80"> | **Fábio Rogério Lenharo** | Boleto Santander-Banespa 353 |
| <img src="img/creditos/foto_fabio_gabbay.jpg" width="80"> | **Fábio Gabbay** | Boleto Santander-Banespa 033 |
| <img src="img/creditos/foto_sem_imagem.gif" width="80"> | **Carlos Magno / Reinaldo Silva / Alberto Braschi / Alan Camilo** | Boleto Caixa - Padrão SINCO |
| <img src="img/creditos/foto_sem_imagem.gif" width="80"> | **Davi Camargo / Leandro Vieira Pinho** | Boleto Caixa - Padrão SIGCB |
| <img src="img/creditos/foto_sem_imagem.gif" width="80"> | **Marcelo Souza** | Boleto Bancoob |
| <img src="img/creditos/foto_lucas_ferreira.jpg" width="80"> | **Lucas Ferreira** | Boleto Besc |
| <img src="img/creditos/foto_sem_imagem.gif" width="80"> | **Rafael Azenha Aquini / Marco Antonio Righi / Marcelo Belinato** | Boleto Sicredi |

---

## Licença

Projeto disponível sob a Licença [GPL](http://pt.wikipedia.org/wiki/GNU_General_Public_License).

---

Notificações de bugs ou sugestões: abra uma [issue no GitHub](https://github.com/CobreGratis/boletophp/issues). Mensagens com dúvidas gerais, técnicas ou solicitações de Suporte não serão respondidas.
