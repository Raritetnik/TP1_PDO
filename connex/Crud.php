<?php
class Crud extends PDO{
    public function __construct() {
        parent::__construct("mysql:host=localhost;dbname=librairie; port=3306; charset=utf8",
        "root", "");

        //parent::__construct("mysql:host=localhost;dbname=e2196106; port=3306; charset=utf8",         "e2196106", "oSj2iBL4A5MFSp0OmlIh");
    }

    public function select($table, $field="id", $order="ASC") {
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();;
    }

    public function selectWith1Table($table1, $table2, $fieldLien,
    $field="id", $order="ASC")
    {
        $sql = "SELECT * FROM $table1 "
            ."INNER JOIN $table2 ON $table1.$fieldLien = $table2.$field "
            ."ORDER BY $fieldLien $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectWith2Tables($table1,
    $table2, $fieldLienTable1, $fieldLienTable2 = 'id',
    $table3, $fieldLienTable3, $fieldLienTable4 = 'id',
    $field="id", $order="ASC")
    {
        $sql = "SELECT * FROM $table1 "
            ."INNER JOIN $table2 ON $table1.$fieldLienTable1 = $table2.$fieldLienTable2 "
            ."INNER JOIN $table3 ON $table1.$fieldLienTable3 = $table3.$fieldLienTable4 "
            ."ORDER BY $table1.$field $order";
        echo($sql);
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectWith3Tables($table1,
    $table2, $fieldLienTable1, $table2_1,  $fieldLienTable2 = 'id',
    $table3, $fieldLienTable3, $table3_1, $fieldLienTable4 = 'id',
    $table4, $fieldLienTable5, $table4_1, $fieldLienTable6 = 'id',
    $field="id", $order="ASC")
    {
        $sql = "SELECT * FROM $table1 "
            ."INNER JOIN $table2 ON $table2.$fieldLienTable1 = $table2_1.$fieldLienTable2 "
            ."INNER JOIN $table3 ON $table3.$fieldLienTable3 = $table3_1.$fieldLienTable4 "
            ."INNER JOIN $table4 ON $table4.$fieldLienTable5 = $table4_1.$fieldLienTable6 "
            ."ORDER BY $table1.$field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectId($table, $valeur, $field='id'){
        $sql = "SELECT * FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $valeur);
        $stmt->execute();

        $count = $stmt->rowCount();
        return ($count == 1) ? $stmt->fetch(): null;
    }

    public function selectIds($table, $valeur1, $field1='id', $valeur2, $field2='id'){
        $sql = "SELECT * FROM $table WHERE $field1 = :$field1 AND $field2 = :$field2";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field1", $valeur1);
        $stmt->bindValue(":$field2", $valeur2);
        $stmt->execute();

        $count = $stmt->rowCount();
        return ($count == 1) ? $stmt->fetch(): null;
    }

    public function selectBy($table, $valeur, $field='id'){
        $sql = "SELECT * FROM $table WHERE $field = $valeur";
        $stmt = $this->query($sql);
        $count = $stmt->rowCount();
        return ($count == 1) ? $stmt->fetch(): $stmt->fetchAll();
    }

    public function insert($table, $data) {
        $nomChamp = implode(", ", array_keys($data));
        $valeurChamp = ":".implode(", :", array_keys($data));

        $sql = "INSERT INTO $table ($nomChamp) VALUES ($valeurChamp)";
        $stmt = $this->prepare($sql);
        foreach($data as $key => $value) {
            $stmt->bindValue(":$key" , $value);
        }
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        } else {
            return $this->lastInsertId();
        }
    }

    public function update($table, $data, $id, $champId = 'id') {
        $champRequete = null;
        foreach($data as $key => $value) {
            $champRequete .= "$key = :$key, ";
        }
        $champRequete = rtrim($champRequete, ", ");
        $sql = "UPDATE $table SET $champRequete WHERE $champId = :$champId";
        echo($sql);
        $stmt = $this->prepare($sql);

        foreach($data as $key => $value) {
            $stmt->bindValue(":".$key, $value);
        }
        $stmt->bindValue(":$champId", $id);
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        } else {
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }

    public function updateIds($table, $data, $id1, $champId1 = 'id', $id2, $champId2 = 'id') {
        $champRequete = null;
        foreach($data as $key => $value) {
            $champRequete .= "$key = :$key, ";
        }
        $champRequete = rtrim($champRequete, ", ");
        $sql = "UPDATE $table SET $champRequete WHERE $champId1 = :$champId1 AND $champId2 = :$champId2";
        echo($sql);
        $stmt = $this->prepare($sql);

        foreach($data as $key => $value) {
            $stmt->bindValue(":".$key, $value);
        }
        $stmt->bindValue(":$champId1", $id1);
        $stmt->bindValue(":$champId2", $id2);
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        } else {
            //header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }

    public function delete($table, $id, $champId = 'id') {
        $sql = "DELETE FROM $table WHERE $champId = :$champId";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$champId", $id);
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        } else {
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }
 }

?>