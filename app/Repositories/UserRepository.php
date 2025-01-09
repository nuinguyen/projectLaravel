<?php 

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;
    
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Sử dụng 1 số function thường xuyên lặp lại của BaseRepossitory
     * Có thể viết thêm function khác riêng biệt của model
     */
    public function getUsersByRole($role)
    {
        return $this->model->where('role', $role)->get();
    }
  
}