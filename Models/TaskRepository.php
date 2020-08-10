<?php
namespace MyApp\Models;

use MyApp\Models\TaskResourceModel;

class TaskRepository
{
    public function add($model){
        $taskResourceModel = new TaskResourceModel('tasks', 'id', $model);
        if ($taskResourceModel->save($model)){
            return true;
        }
        return false;
    }

    public function edit($model){
        $taskResourceModel = new TaskResourceModel('tasks', 'id', $model);
        if ($taskResourceModel->save($model)){
            return true;
        }
        return false;
    }

    public function delete($id){
        $taskResourceModel = new TaskResourceModel('tasks', 'id', '');
        if ($taskResourceModel->delete($id)){
            return true;
        }
        return false;
    }

    public function getElementById($id)
    {
        $taskResourceModel = new TaskResourceModel('tasks', 'id', '');
        return ($taskResourceModel->showTask($id));
    }

    public function getAll()
    {
        $taskResourceModel = new TaskResourceModel('tasks', '', '');
        return $taskResourceModel->showAllTasks();
    }

}