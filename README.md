# PHP Sheet tools

Conversor de CSV em Array.

### Utilização

```php
$file = "myfile.csv"
$reader = Sheet($file);
$reader->setDelimiter(","); // Por padrão é ";"

$reader->getArray(); // Retorna o CSV convertido em array
Ou
$reader->getSQLInsert("nomeDaTabela"); // Retorna uma query sql

```
Vai retornar um Array com os dados do CSV. 
