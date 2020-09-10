# PHP Sheet tools

Conversor de CSV em Array.

### Utilização

```php
$file = "myfile.csv"
$reader = Sheet($file);
$reader->setDelimiter(","); // Por padrão é ";"
$reader->readFile();
```
Vai retornar um Array com os dados do CSV. 
