<?php
class ImageModel extends Model
{
	public $title;
	public $like;
	public $dislike;
	public $comment;
	public $album_id;

	public function status($action, $add, $image_id)
	{
		$sth = DBcon::prepare("UPDATE image as i SET i.$action = i.$action + :add WHERE id= :image_id");
		$sth->execute(compact('add', 'image_id'));
	}

	public function create($data)
	{
		$sth = DBcon::prepare("INSERT INTO $this->table_name (name, title, description, album_id) 
							values (:name, :title, :description, :album_id)");
		$sth->execute($data);
	}
}
