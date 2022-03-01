<?php

namespace Logger;
class DBLogger implements IDBLogger
{
    private $db, $table;
    function __construct()
    {
        $this->db = DB::getInstance();
    }
    function log($data, $topic, $error = null)
    {
    }
    function changeCollection($collection)
    {
        $this->table = $collection;
    }
    private function dataToInsert($data)
    {
        $columns = "";
        $values = "";

        foreach ($data as $col => $value) {
            $columns .= "`" . $col . "`, ";

            $dt = gettype($value);

            if ($dt == 'integer' || $dt == 'double') {
                $values .= $value . ", ";
            } else {
                $values .= "'" . $value . "', ";
            }
        }

        $query = "INSERT INTO " . $this->table . " (" . rtrim($columns, ', ') . ") VALUES (" . rtrim($values, ', ') . ")";
    }
}
