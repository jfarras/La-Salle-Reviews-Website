<?php
/**
 * Select Query
 */
class Ex2SelectModel extends Model
{
    public function ConsultarImatge($id)
    {

        $sql= <<<QUERY
SELECT * FROM ImagenesMonos 
WHERE id = "$id";
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }

    public function ConsultarMida()
    {

        $sql= <<<QUERY
SELECT COUNT(*) FROM ImagenesMonos;
QUERY;

        $result = $this->getAll($sql);
        return $result;
    }
}