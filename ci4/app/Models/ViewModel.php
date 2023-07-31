<?php 
namespace App\Models;
use CodeIgniter\Model;

class ViewModel extends Model
{
    protected $table = 'views';
    protected $primaryKey = 'id';

	protected $returnType = 'array';

	protected $allowedFields = ['user_ip', 'user_browser', 'story_id'];

    protected $db;

}