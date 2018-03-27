<?php
/**
 * Insert Query
 */
class Ex3InsertAnimalModel extends Model
{
    public function Inserir($name, $url, $table)
    {

$sql= <<<QUERY
INSERT INTO $table (nombre,url)
VALUES ("$name","$url");
QUERY;

        $this->execute($sql);
    }
}
