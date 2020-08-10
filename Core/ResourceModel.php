<?php
namespace MyApp\Core;

use MyApp\Config\db as Database;
use mysql_xdevapi\Exception;

class ResourceModel implements ResourceModelInterface
{
    private $table;
    private $id;
    private $model;

    public function _init($table, $id , $model){
        $this->table = $table;
        $this->id =$id;
        $this->model = $model;
    }

    public function save($model){
        $arrProperties = $model->getProperties($model);
        if (empty($arrProperties['id'])){
            //Them
            array_shift($arrProperties);
            $arrKey = array_keys($arrProperties);
            $strKeyExSql = implode(',', $arrKey);
            $arrPlaceholder = [];
            foreach ($arrKey as $key => $value){
                $temp = ":".$value;
                array_push($arrPlaceholder, $temp);
            }
            $strPlaceholder = implode(',', $arrPlaceholder);
            $sql = "INSERT INTO " . $this->table . "(" . ($strKeyExSql) . ") VALUES (". $strPlaceholder .")";
            try {
                $req = Database::getBdd()->prepare($sql);
                if ($req->execute($arrProperties)){
                    return true;
                }else{
                    return false;
                }
            }catch (Exception $e){
                echo "an error occured";
            }
        }else {
            //Sua
            foreach ($arrProperties as $key => &$value){
                if (empty($value)){
                    unset($arrProperties[$key]);
                }
            }
            $arrSqlUpdate = [];
            foreach (array_keys($arrProperties) as $key){
                    $key = $key . " = :" . $key;
                    array_push($arrSqlUpdate, $key);
            }
            $strSqlUpdate = implode(',', $arrSqlUpdate);
            $sql = "UPDATE " . $this->table . " SET " . $strSqlUpdate . " WHERE " . $this->id . " = :" . array_keys($arrProperties)[0];
            echo($sql);
            try {
                $req = Database::getBdd()->prepare($sql);
                if ($req->execute($arrProperties)){
                    return true;
                }
                return false;
            }catch (Exception $e){
                echo "An error occured";
            }
        }
    }

    public function delete($id){
        $sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $this->id . ' = ?';
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }

    public function showTask($id)
    {
        $sql = "SELECT * FROM tasks WHERE " . $this->id . " = " . $id ;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function showAllTasks()
    {
        $sql = "SELECT * FROM ". $this->table;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return ($req->fetchAll());
    }
    
}