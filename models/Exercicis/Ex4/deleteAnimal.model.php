<?php
/**
 * Delete Query
 */
class Ex4DeleteAnimalModel extends Model
{
    public function deleteAnimal($id, $table)
    {

        $sql= <<<QUERY
DELETE FROM $table
WHERE id = $id;
QUERY;

        $this->execute($sql);

    }
}