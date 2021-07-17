<?php
require_once "conn.php";

// akan execute sql yang dikirimkan.
function execute($sql)
{
    global $conn;
    return $conn->query($sql);
}

// echo getData("tb_admin", "username, password", ""); // username password, update_at, created_at

function getData($table, $select = null, $id = null)
{
    global $conn;
    $sql = "SELECT ";
    if (!empty($select) || !$select == null) $sql .= " $select ";
    else $sql .= " * ";
    $sql .= " FROM $table ";
    $id = $conn->real_escape_string($id);
    if (!empty($id) || !$id == null) $sql .= "WHERE id = '$id'";
    $sql .= ";";

    $result = execute($sql);

    if ($result->num_rows == 0) {
        return [];
    }

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}

// $array = [
//     "username" => "root",
//     "password" => "toor",
// ];
// insertData("tb_admin", $array);

function insertData($table, $array)
{
    global $conn;
    $columns = "";
    $values = "";

    foreach ($array as $key => $value) {
        $columns    .= "$key, ";
        $value      = $conn->real_escape_string($value);
        $values     .= "'$value', ";
    }

    $columns = substr(trim($columns), 0, -1);
    $values = substr(trim($values), 0, -1);

    $columns = "(" . rtrim($columns, ',') . ")";
    $values = "(" . rtrim($values, ',') . ");";

    $sql = "INSERT INTO $table $columns VALUES $values";

    return execute($sql);
}

// $array = [
//     "username" => "root1",
//     "password" => "toor1",
// ];
// updateData("tb_admin", "1", $array);

function updateData($table, $id, $array)
{
    global $conn;
    $setUpdate = "";

    foreach ($array as $key => $value) {
        $value          = $conn->real_escape_string($value);
        $setUpdate      .= "$key='$value', ";
    }

    $setUpdate = substr(trim($setUpdate), 0, -1);
    $sql = "UPDATE $table SET $setUpdate WHERE id = $id;";

    return execute($sql);
}

// deleteData("tb_admin", "1");

function deleteData($table, $id)
{
    global $conn;
    $id = $conn->real_escape_string($id);
    $sql = "DELETE FROM $table WHERE id=$id;";
    return execute($sql);
}

function joinTable($table, $table_join, $condition)
{
    global $conn;
    $sql = "SELECT * FROM $table INNER JOIN $table_join ON $condition";
    $result = execute($sql);

    if ($result->num_rows == 0) {
        return [];
    }

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}

// Login

function login($username, $password)
{
    global $conn;
    $sql = "SELECT * FROM tb_user WHERE username = $username";
    $result = execute($sql);

    if($result->num_rows > 0){
        $row = $result -> fetch_assoc();
        return password_verify($password, $row["password"]);
    }
}



// $coba = "ini coba";
// $coba .= " ini akan nambah";
// echo $coba;
// function getData($table, $select = null, $id = null)
// echo getData("tb_admin", "");
