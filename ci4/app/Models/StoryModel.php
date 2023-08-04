<?php 
namespace App\Models;
use CodeIgniter\Model;

class StoryModel extends Model
{
    protected $table = 'stories';
    protected $primaryKey = 'id';

	protected $returnType = 'array';

	protected $allowedFields = ['title', 'content', 'upvotes', 'views', 'is_best_of', 'is_home', 'words', 'created_at', 'is_show', 'is_publish', 'notes', 'published_at'];

    protected $db;

    public function getNextStory($story, $sort) {

        $id = $story['id'];
        
        if ($sort == getSorts()['popular'] && $story['upvotes'] != 0) {
            $query = $this->db->query('SELECT * FROM stories WHERE is_publish = 1 AND is_show = 1 AND upvotes = (SELECT MAX(upvotes) FROM stories WHERE upvotes < '.$story['upvotes'].')');

        } else if ($sort == getSorts()['popular'] && $story['upvotes'] == 0) {
            $query = $this->db->query('SELECT * FROM stories WHERE is_publish = 1 AND is_show = 1 AND id = (SELECT MIN(id) FROM stories WHERE id > '.$story['id'].')');

        } else if ($sort == getSorts()['newest']) {
            $query = $this->db->query('SELECT * FROM stories WHERE is_publish = 1 AND is_show = 1 AND created_at = (SELECT MAX(created_at) FROM stories WHERE created_at < "'.$story['created_at'].'")');

        } else if ($sort == getSorts()['oldest']) {
            $query = $this->db->query('SELECT * FROM stories WHERE is_publish = 1 AND is_show = 1 AND created_at = (SELECT MAX(created_at) FROM stories WHERE created_at > "'.$id.'")');

        } else {
            $query = $this->db->query('SELECT * FROM stories WHERE is_publish = 1 AND is_show = 1 AND title = (SELECT MAX(title) FROM stories WHERE title < "'.$story['title'].'")');
        }

        $result = $query->getResult();

        if (count($result) > 0) {
            return $result[0];
        }

        return null;
    }

    public function getPreviousStory($story, $sort) {

        $id = $story['id'];

        if ($sort == getSorts()['popular'] && $story['upvotes'] != 0) {
            $query = $this->db->query('SELECT * FROM stories WHERE is_publish = 1 AND is_show = 1 AND upvotes = (SELECT MIN(upvotes) FROM stories WHERE upvotes > '.$story['upvotes'].')');

        } else if ($sort == getSorts()['popular'] && $story['upvotes'] == 0) {
            $query = $this->db->query('SELECT * FROM stories WHERE is_publish = 1 AND is_show = 1 AND id = (SELECT MAX(id) FROM stories WHERE id < '.$story['id'].')');

        } else if ($sort == getSorts()['newest']) {
            $query = $this->db->query('SELECT * FROM stories WHERE is_publish = 1 AND is_show = 1 AND created_at = (SELECT MIN(created_at) FROM stories WHERE created_at > "'.$story['created_at'].'")');

        } else if ($sort == getSorts()['oldest']) {
            $query = $this->db->query('SELECT * FROM stories WHERE is_publish = 1 AND is_show = 1 AND created_at = (SELECT MAX(created_at) FROM stories WHERE created_at < "'.$story['created_at'].'")');

        } else {
            $query = $this->db->query('SELECT * FROM stories WHERE is_publish = 1 AND is_show = 1 AND title = (SELECT MIN(title) FROM stories WHERE title > "'.$story['title'].'")');
        }

        $result = $query->getResult();

        if (count($result) > 0) {
            return $result[0];
        }

        return null;
    }
}