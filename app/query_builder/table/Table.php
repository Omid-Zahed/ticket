<?php

namespace App\query_builder\table;

class Table
{
    /**
     * @var Column[] $columns
     */
    protected $columns=[];
    protected $url;
    protected $search_items=[];

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return Table
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }


    public function getColumns(): array
{
    return $this->columns;
}
public function addColumn( Column $column): Table
{
    $this->columns[] =$column;
    return $this;
}

public function addSearch($key,$title,$type="text",$placeholder="",$suggest_url="",$more=[]){

    $search_object=new \stdClass();
    $search_object->name=$key;
    $search_object->type=$type;
    $search_object->placeholder=$placeholder;
    $search_object->title=$title;
    $search_object->suggest_url=$suggest_url;
    $search_object->more=$more;
    $this->search_items[]=$search_object;
    return $this;
}
    public function getSearchItem()
        {
            $search_items=$this->search_items;
            foreach ($this->columns as $column){
                $s=$column->getSearch();
                if ($s)$search_items[]=$s;

            }
            return $search_items;
        }

public static function init($url): Table
{
    return new Table($url);
}
}
