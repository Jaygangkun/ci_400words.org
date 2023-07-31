<?php 
namespace App\Models;
use CodeIgniter\Model;

class UpvoteModel extends Model
{
    protected $table = 'upvotes';
    protected $primaryKey = 'id';

	protected $returnType = 'array';

	protected $allowedFields = ['user_ip', 'user_browser', 'story_id'];

    protected $db;

}