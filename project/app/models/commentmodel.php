<?php
class CommentModel extends Model
{
    public $comment;
    public $Image_id;

    public function create($data)
    {
        $sth = DBcon::prepare("INSERT INTO $this->table_name (comment, image_id) values (:comment, :image_id)");
        $sth->execute($data);
    }
    
}
