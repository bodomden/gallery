<?php
abstract class Model
{
    public $id;
    public $name;
    public $description;
    public $class_name;
    public $table_name;

    public function __construct()
    {
        $this->class_name = get_class($this);
        $this->table_name = strtolower(substr($this->class_name, 0, 5));
    }

    public function get_all()
    {
        return DBcon::query("SELECT * FROM $this->table_name")->fetchAll(PDO::FETCH_CLASS, $this->class_name);
    }

    public function find($id)
    {
        $sth = DBcon::prepare("SELECT * FROM $this->table_name WHERE id=?");
        $sth->setFetchMode(PDO::FETCH_CLASS, $this->class_name);
        $sth->execute([$id]);
        return $sth->fetch();
    }

    abstract function create($data);

    public function hasMany($many, $id)
    {
        $model_file = $many . 'model' . '.php';
        $model_class = ucfirst($many) . 'Model';
        include "app/models/" . $model_file;
        $sth = DBcon::prepare("SELECT b.*  FROM $many as b JOIN $this->table_name as a ON a.id = b.album_id WHERE a.id = ?");
        $sth->execute([$id]);

        return $sth->fetchAll(PDO::FETCH_CLASS, $model_class);
    }

    public function update($data)
    {
        $sth = DBcon::prepare("UPDATE $this->table_name SET name= :name, description= :description WHERE id= :id");
        $sth->execute($data);
    }
}
