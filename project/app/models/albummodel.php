<?php
class AlbumModel extends Model
{
    public function create($data)
    {
        $sth = DBcon::prepare("INSERT INTO $this->table_name (name, description) values (:name, :description)");
        $sth->execute($data);
    }
}
