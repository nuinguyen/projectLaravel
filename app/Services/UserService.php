<?php 

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService
{
    protected $userRepository;
    
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    // Lấy tất cả users
    public function getAllUsers()
    {
        return $this->userRepository->all();
    }
    
    // Tạo user mới
    public function createUser(array $data)
    {
        // Xử lý business logic
        $data['password'] = bcrypt($data['password']);
        $user = $this->userRepository->create($data);
        
        return $user;
    }
    
    // Lấy thông tin user
    public function getUser($id)
    {
        return $this->userRepository->find($id);
    }
    
    // Cập nhật user
    public function updateUser($id, array $data)
    {
        return $this->userRepository->update($id, $data);
    }
    
    // Xóa user
    public function deleteUser($id)
    {
        return $this->userRepository->delete($id);
    }
}