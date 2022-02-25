<?php

namespace App\query_builder\table;

class Column
{
    protected  $columnTitle,$columnKey,$sort,$callback,$search,$searchType;

    /**
     * @return mixed
     */
    public function getColumnTitle()
    {
        return $this->columnTitle;
    }

    /**
     * @param mixed $columnTitle
     * @return Column
     */
    public function setColumnTitle($columnTitle)
    {
        $this->columnTitle = $columnTitle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColumnKey()
    {
        return $this->columnKey;
    }

    /**
     * @param mixed $columnKey
     * @return Column
     */
    public function setColumnKey($columnKey)
    {
        $this->columnKey = $columnKey;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param mixed $sort
     * @return Column
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @param mixed $callback
     * @return Column
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @param mixed $search
     * @return Column
     */
    public function setSearch($key=null,$title=null,$type="text",$placeholder="",$suggest_url="",$more=[])
    {

        if (!$key)$key=$this->getColumnKey();
        if (!$title)$title=$this->getColumnTitle();
        $search_object=new \stdClass();
        $search_object->name=$key;
        $search_object->type=$type;
        $search_object->placeholder=$placeholder;
        $search_object->title=$title;
        $search_object->suggest_url=$suggest_url;
        $search_object->more=$more;

        $this->search = $search_object;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSearchType()
    {
        return $this->searchType;
    }

    /**
     * @param mixed $searchType
     * @return Column
     */
    public function setSearchType($searchType)
    {
        $this->searchType = $searchType;
        return $this;
    }

    /**
     * @param $columnTitle
     * @param $columnKey
     * @param $sort
     * @param $callback
     * @param $search
     * @param $searchType
     */

    public static function init($title,$key,$sort=null): Column
    {
        $column= new static();
        $column->setCallback(function ($data)use ($key){
            $keys=explode(".",$key);
            $result=$data;
            foreach ($keys as $k){
                $result=$result->{$k};
            }
            return $result??"dont found key";});
        $column->setColumnTitle($title);
        $column->setColumnKey($key);
        if ($sort!==false){
            if ($sort===null)$column->sort=$key;
            $column->setSort($sort);
        }
        return  $column;

    }


}
