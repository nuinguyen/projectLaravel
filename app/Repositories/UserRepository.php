<?php 

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $model;
    
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    
    // Lấy tất cả records
    public function all()
    {
        return $this->model->all();
    }
    
    // Tạo record mới
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    
    // Tìm record theo id
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
    
    // Cập nhật record
    public function update($id, array $data)
    {
        $record = $this->find($id);
        $record->update($data);
        return $record;
    }
    
    // Xóa record
    public function delete($id)
    {
        return $this->find($id)->delete();
    }
    
    // Tìm kiếm có điều kiện
    public function where($column, $value)
    {
        return $this->model->where($column, $value);
    }
}