<?php

namespace App\Controllers;

use App\Entities\Task;

class Tasks extends BaseController
{
    private $model;
    private $current_user;

    public function __construct(){
        $this->model = new \App\Models\TaskModel();
        $this->current_user = service('auth')->getCurrentUser();
    }

    public function index()
    {   

        $data = $this->model->paginateTasksByUserId($this->current_user->id);

        return view('Tasks/index', [
            'tasks' => $data,
            'pager' => $this->model->pager
        ]);
        // echo "Hello world";
    }

    public function show($id)
    {
        $task = $this->getTaskOr404($id);
        
        return view("Tasks/show", ['task' => $task]);
    }

    public function new()
    {
        $task = new Task; // create an empty task object to be used in the view 

        return view("Tasks/new", [
            'task' => $task
        ]);
    }

    public function create()
    {
        $task = new Task($this->request->getPost());

        $task->user_id = $this->current_user->id; // this will overwrite the user_id if there is one in the form request

        // $result = $this->model->insert([
        //     'description' => $this->request->getPost('description')
        // ]);
        
        if (!$this->model->insert($task)){
            return redirect()->back()->with('errors', $this->model->errors())
                            -> with ('warning', 'Invalid Data')
                            ->withInput();
        }
        else{
            return redirect()->to("/tasks/show/{$this->model->insertID}")
                            -> with ('info', 'Task Created Successfully');
        }
    }

    public function edit($id)
    {
        
        $task = $this->getTaskOr404($id);

        return view("Tasks/edit", [
            'task' => $task
        ]);
    }

    public function update($id)
    {
        $task = $this->getTaskOr404($id);

        $post = $this->request->getPost();

        unset($post['user_id']); // this will prevent the user_id from being updated

        $task->fill($post); // this will overwrite the existing data in the task object with the new data from the form request

        if(!$task->hasChanged()){
            return redirect()->back()->with('warning', 'Nothing to update')->withInput();
        }

        if($this->model->save($task)){
            return redirect()->to("/tasks/show/$id")
            -> with ('info', 'Task Updated Successfully');
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
        $task = $this->getTaskOr404($id);

        if($this->request->getMethod() === 'post'){
            $this->model->delete($id);
            return redirect()->to('/tasks')->with('info', 'Task Deleted Successfully');
        }

        return view('Tasks/delete', ['task' => $task]);
    }
    private function getTaskOr404($id){

        $task = $this->model->getTaskByUserId($id, $this->current_user->id); // this will return null if the task is not found

        // $task = $this->model->find($id);
        
        // if($task !== null && $task ->user_id !== $user->id){
        //     $task = null;
        // }

        if($task === null){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with id $id is not found");
        }

        return $task;
    }
}
