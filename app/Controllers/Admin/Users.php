<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Entities\User;


class Users extends BaseController {

    private $model;

    public function __construct(){
        $this->model = new \App\Models\UserModel;
    }

    public function index(){

        $users = $this->model->orderBy('id')->paginate(5);

        return view('Admin/Users/index', [
            'users' => $users,
            'pager' => $this->model->pager
        ]);
    }

    public function show($id){

        $user = $this->getUserOr404($id);

        return view('Admin/Users/show', ['user' => $user]);
    }

    public function new()
    {
        $user = new User;

        return view("Admin/Users/new", [
            'user' => $user
        ]);
    }

    public function create()
    {
        $user = new User($this->request->getPost());

        // $result = $this->model->insert([
        //     'description' => $this->request->getPost('description')
        // ]);
        
        if (!$this->model->protect(false)->insert($user)){
            return redirect()->back()->with('errors', $this->model->errors())
                            -> with ('warning', 'Invalid Data')
                            ->withInput();
        }
        else{
            return redirect()->to("/admin/users/show/{$this->model->insertID}")
                            -> with ('info', 'User Created Successfully');
        }
    }

    public function edit($id)
    {
        
        $user = $this->getUserOr404($id);

        return view("Admin/users/edit", [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        $user = $this->getUserOr404($id);

        $post = $this->request->getPost();


        // dd($post);
        if(empty($post['password'])){
            $this->model->disablePasswordValidation();
            unset($post['password']);
            unset($post['password_confirmation']);
        }

        $user->fill($post); // this will overwrite the existing data in the task object with the new data from the form request

        if(!$user->hasChanged()){
            return redirect()->back()->with('warning', 'Nothing to update')->withInput();
        }

        if($this->model->protect(false)->save($user)){
            return redirect()->to("/admin/users/show/$id")
            -> with ('info', 'User Updated Successfully');
        }else{
            return redirect()->back()->with('errors', $this->model->errors())
                            -> with ('warning', 'Invalid Data')
                            -> withInput();
        }

        // $result = $model->update($id, [
        //     'description' => $this->request->getPost('description')
        // ]);
    }

    public function delete($id){

        $user = $this->getUserOr404($id);

        if($this->request->getMethod() === 'post'){
            $this->model->delete($id);
            return redirect()->to('/admin/users')->with('info', 'User Deleted Successfully');
        }

        return view('Admin/Users/delete', ['user' => $user]);
    }

    private function getUserOr404($id){

        $user = $this->model->where('id', $id)->first(); // this will return null if the user is not found

        if($user === null){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User with id $id is not found");
        }

        return $user;
    }
}