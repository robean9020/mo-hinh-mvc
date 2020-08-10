<?php
namespace MyApp\Models;

use MyApp\Core\ResourceModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct($table, $id , $model)
    {
        $this->_init($table, $id, $model);
    }

}