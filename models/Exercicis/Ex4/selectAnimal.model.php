<?php
/**
 * Select Query
 */
class Ex4SelectAnimalModel extends Model
{
    public function ConsultarImatge($offset, $table)
    {

        $sql= <<<QUERY
SELECT * FROM $table
WHERE 1
LIMIT $offset , 3;
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }


    public function SelectAll($table)
    {
        $sql= <<<QUERY
SELECT id, nombre FROM $table
WHERE 1
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