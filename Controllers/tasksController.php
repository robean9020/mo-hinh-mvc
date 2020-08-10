<?php
namespace MyApp\Controllers;

use MyApp\Core\Controller;
use MyApp\Models\TaskModel;
use MyApp\Models\TaskRepository as repo;

class tasksController extends Controller
{
    private $repo;

    public function __construct()
    {
        $repo = new repo();
        $this->repo = $repo;
    }

    function index()
    {
        $d['tasks'] = $this->repo->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]) && isset($_POST["submit"]))
        {
            $tasksModel = new TaskModel();
            $tasksModel->setTitle($_POST['title']);
            $tasksModel->setDescription($_POST['description']);
            $tasksModel->setCreated_at(date('Y-m-d H:i:s'));
            $tasksModel->setUpdated_at(date('Y-m-d H:i:s'));
            if($this->repo->add($tasksModel)){
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->render("create");
    }

    function edit($id)
    {
        $d["task"] = $this->repo->getElementById($id);
        if (isset($_POST["title"]))
        {
            $tasksModel = new TaskModel();
            $tasksModel->setId($id);
            $tasksModel->setTitle($_POST['title']);
            $tasksModel->setDescription($_POST['description']);
            $tasksModel->setUpdated_at(date('Y-m-d H:i:s'));
            if($this->repo->edit($tasksModel))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }


    function delete($id)
    {
        if ($this->repo->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
