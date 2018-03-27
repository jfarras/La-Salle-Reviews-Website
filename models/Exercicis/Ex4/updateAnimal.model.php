<?php
/**
 * Select Query
 */
class Ex4UpdateAnimalModel extends Model
{
    public function update ($name, $url, $table,$id)
    {

        $sql= <<<QUERY
UPDATE  $table
SET nombre="$name", url="$url"
WHERE id = $id;
QUERY;

        $this->execute($sql);
    }
}