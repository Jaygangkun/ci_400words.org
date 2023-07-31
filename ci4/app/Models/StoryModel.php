<?php 
namespace App\Models;
use CodeIgniter\Model;

class StoryModel extends Model
{
    protected $table = 'stories';
    protected $primaryKey = 'id';

	protected $returnType = 'array';

	protected $allowedFields = ['title', 'content', 'upvotes', 'views', 'is_best_of', 'is_home', 'words', 'created_at', 'is_show', 'is_publish', 'notes'];

    protected $db;

    public function getNextStory($id) {
        $query = $this->db->query('SELECT * FROM stories WHERE is_publish = 1 AND id = (SELECT MIN(id) FROM stories WHERE id > '.$id.')');
        $result = $query->getResult();

        if (count($result) > 0) {
            return $result[0];
        }
    }

    public function getPreviousStory($id) {
        $query = $this->db->query('SELECT * FROM stories WHERE is_publish = 1 AND id = (SELECT MAX(id) FROM stories WHERE id < '.$id.')');
        $result = $query->getResult();

        if (count($result) > 0) {
            return $result[0];
        }
    }
}