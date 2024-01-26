<?php
if (!defined('_INCODE')) die('Access Deined...');

function query($sql, $data = [], $statementStatus = false)
{
    global $conn; // biến $conn lấy từ file connect.php
    $query = false;
    try {
        $statement = $conn->prepare($sql);

        if (empty($data)) {
            $query = $statement->execute();
        } else {
            $query = $statement->execute($data);
        }
    } catch (Exception $exception) {

        require_once 'modules/errors/database.php'; //Import error
        die(); //Dừng hết chương trình
    }

    if ($statementStatus && $query) {
        return $statement;
    }

    return $query;
}

function insert($table, $dataInsert)
{

    $keyArr = array_keys($dataInsert);
    $fieldStr = implode(', ', $keyArr);
    $valueStr = ':' . implode(', :', $keyArr);

    $sql = 'INSERT INTO ' . $table . '(' . $fieldStr . ') VALUES(' . $valueStr . ')';

    return query($sql, $dataInsert);
}
