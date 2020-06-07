<?php namespace Fenriz\HabitissimoClient\Client;


class Category extends GuzzleHttpRequest
{
    private $endpoint = ['category/list'];


    /**
     * Obtiene las categorias
     * 
     * @return array listado de categorias
     */
    public function listCategories()
    {
        return $this->get($this->endpoint);
    }

    /**
     * Obtiene las subcategorias
     * 
     * @param id string id de la categoria padre
     * 
     */
    public function listSubCategories($id)
    {
        $id = (string) $id;
        $this->endpoint[0] .= '/' . $id;

        return $this->get($this->endpoint);
    }

    /**
     * Obtiene los hijos de la subcategoria
     * 
     * @param id string id de la subcategoria padre
     * 
     */
    public function listChildrenSubCategories($id)
    {
        return $this->listSubCategories($id);
    }
        
}

