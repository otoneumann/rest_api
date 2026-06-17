<?php

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/User.php';

class UserRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function getAll()
    {
        $db = $this->pdo;

        $stmt = $db->query("select * from users");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function getById($id)
    {
        $db = $this->pdo;
        $stmt= $db->prepare('select * from users where id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $email){
        $db = $this->pdo;

        $stmt = $db->prepare('insert into users(name, email) values (?,?)');
        $stmt->execute([$name, $email]);
        return $db->lastInsertId();
    }

    public function update($id, $name, $email){
        $db=$this->pdo;
        $stmt=$db->prepare('update users set name=?, emai=? where id =?');
        return $stmt->execute([$name,$email, $id]);
    }

    public function delete($id){
        $db=$this->pdo;
        $stmt=$db->prepare('delete from users where id = ?');
        return $stmt->execute([$id]);
    }


}