<?php

class Sheet
{

    private $file;
    private $delimiter = ";";
    private $CSVArray = [];

    function __construct( string $file )
    {   
        $this->file = $file;
    }

    public function setDelimiter($delimiter)
    {  
        $this->delimiter = $delimiter;
        return $this;
    }

    private function readFile()
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
                
                $newData = [];
                foreach($header as $key) {
                    $newData[$key] = $register[$key];
                }
                $this->CSVArray[] = $newData;
            }
            fclose($this->file);
        }
    }

    public function getArray()
    {
        $this->readFile();
        return $this->CSVArray;
    }

    public function getSQLInsert($table)
    {
        
        if ( count($this->CSVArray)  <= 0) {
            $this->readFile();
        }

        $columns = array_keys($this->CSVArray[0]);
        $columns = "(".implode(", ", $columns).")";
        $values = "";
        foreach($this->CSVArray as $key => $register) {
            $values .= "(\"".implode("\", \"", array_values($register))."\")";
            if ($key < count($this->CSVArray) - 1) {
                $values .= ", ";
            }
        }
        $query = "INSERT INTO {$table} {$columns} VALUES {$values}";
        str_replace("'", "\'", $query);
        return $query;
    }
    
}
