<?php
/**
 * Insert Query
 */
class Ex2InserirModel extends Model
{
    public function Inserir($nom, $url)
    {

$sql= <<<QUERY
INSERT INTO ImagenesMonos (nombre,url)
VALUES ("$nom","$url");
QUERY;

        $this->execute($sql);
    }
}
