<?php

class Sheet
{

    private $file;
    private $delimiter = ";";

    function __construct( string $file )
    {   
        $this->file = $file;
    }

    public function setDelimiter($delimiter)
    {  
        $this->delimiter = $delimiter;
    }

    public function readFile()
    {
        $this->file = fopen($this->file, 'r');
        if ( $this->file ) {
            $header = fgetcsv($this->file, 0, $this->delimiter);
            while(!feof($this->file)){
                $row = fgetcsv($this->file, 0, $this->delimiter);
                if (!$row) {
                    continue;
                }
                $register = array_combine($header, $row);
                echo $register['nome']." - ".$register['numero'].PHP_EOL;
            }
            fclose($this->file);
        }
    }
    
}
