<?php 
namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller 
{
    protected $userService;
    
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    // Lấy danh sách users
    public function index()
    {
        return $this->userService->getAllUsers();
    }
    
    // Tạo user mới
    public function store(UserRequest $request)
    {
        return $this->userService->createUser($request->validated());
    }
    
    // Hiển thị chi tiết user
    public function show($id)
    {
        return $this->userService->getUser($id);
    }
    
    // Cập nhật user
    public function update(UserRequest $request, $id)
    {
        return $this->userService->updateUser($id, $request->validated());
    }
    
    // Xóa user
    public function destroy($id)
    {
        return $this->userService->deleteUser($id);
    }
}