<?php
/**
 * Select Query
 */
class Ex3SelectAnimalModel extends Model
{
    public function ConsultarImatge($id, $table)
    {

        $sql= <<<QUERY
SELECT * FROM $table
WHERE id = "$id";
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }

    public function ConsultarMida($table)
    {

        $sql= <<<QUERY
SELECT COUNT(*) FROM $table;
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }
}