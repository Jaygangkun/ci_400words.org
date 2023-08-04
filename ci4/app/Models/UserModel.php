<?php 
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

	protected $returnType = 'array';

	protected $allowedFields = ['user_name', 'password', 'role'];

    protected $db;
}