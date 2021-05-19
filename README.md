# Sistema Harmonizado (SH) e Nomenclatura Comum do Mercosul (NCM)

Este é um micro buscador em PHP utilizando Jquery que realiza a busca em uma tabela em MySQL e apresenta o resultado tabelado.

As tabelas utilizadam são as disponibilizadas pelo [Comex Stat](http://comexstat.mdic.gov.br/pt/home) do Ministério da Economia do Brasil. São elas:
* [NCM (csv)](https://balanca.economia.gov.br/balanca/bd/tabelas/NCM.csv)
* [SH - Sistema Harmonizado (csv)](https://balanca.economia.gov.br/balanca/bd/tabelas/NCM_SH.csv)

Entenda como funciona a [Nomenclatura Comum do Mercosul](https://receita.economia.gov.br/orientacao/aduaneira/classificacao-fiscal-de-mercadorias/ncm) ou o [Harmonized System](http://www.wcoomd.org/en/topics/nomenclature/overview/what-is-the-harmonized-system.aspx).

## Instalação
* Configurar o arquivo "connect.php" com os dados do seu servidor MySQL
* Criar sua tabela mySQL (não coloquei aqui, vai ter de ser por sua própria conta com base no arquivo abaixo)
* Utilizar o arquivo "lista_cheia_header.csv" e alimentar sua tabela mySQL
* Fazer as alterações estéticas que deseja nos arquivos PHP
* Subir os 3 arquivos PHP
