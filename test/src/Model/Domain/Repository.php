<?php

class Repository
{
    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * Builds and executes a multi-insert query with the given data
     * (i.e. INSERT INTO `table` (`col_1`, `col_2`) VALUES ('val_1', 'val_2'), ('val_3', 'val_4'), [...];
     *
     * @param array $data
     * @param string $tableName
     * @return bool
     */
    public function multiInsert($data, $tableName)
    {
        if (empty($data)) {
            return false;
        }

        $columnNames = isset($data[0]) ? array_keys($data[0]) : array();
        if (empty($columnNames)) {
            return false;
        }

        // we need two different structures:
        // - one to hold the placeholders for binding our values,
        // - one to hold the actual values
        $placeholders = array();
        $valuesToBind = array();

        foreach ($data as $i => $row) {
            $params = array();

            foreach($row as $column => $value){
                $param = ":" . $column . $i;
                $params[] = $param;
                $valuesToBind[$param] = $value;
            }
            $placeholders[] = "(" . implode(", ", $params) . ")";
        }

        // build and prepare the SQL statement
        $sql = "INSERT INTO `$tableName` (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $placeholders);
        $stmt = $this->connection->prepare($sql);

        // bind the values
        foreach($valuesToBind as $param => $value){
            $stmt->bindValue($param, $value);
        }

        // here we go!
        return $stmt->execute();
    }
}


