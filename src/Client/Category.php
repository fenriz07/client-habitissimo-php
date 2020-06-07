<?php namespace HabitissimoCF7\Repositories\Client;

use HabitissimoCF7\Models\OptionModel;

class Category extends GuzzleHttpRequest
{
    private $endpoint = ['category/list'];

    public function listCategories()
    {
        return $this->get($this->endpoint);
    }

    public function listSubCategories($id)
    {
        $id = (string) $id;
        $this->endpoint[0] .= '/' . $id;

        return $this->get($this->endpoint);
    }

    public function listChildrenSubCategories()
    {
        $id = OptionModel::getSubCategory();

        return $this->listSubCategories($id);
    }
        
}

