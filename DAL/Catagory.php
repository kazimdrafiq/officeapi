<?php


class Catagory
{
    public $categoryId;
    public $category_name;
    public $slug;
    public $home_status;
    public $reg_date;

    function set_categoryId($categoryId){
        $this->categoryId=$categoryId;
    }

    function set_category_name($category_name){
        $this->category_name=$category_name;
    }
    function set_slug($slug){
        $this->slug=$slug;
    }
    function set_home_status($home_status){
        $this->home_status=$home_status;
    }
    function set_reg_date($reg_date){
        $this->reg_date=$reg_date;
    }


    function get_categoryId(){
        return $this->categoryId;
    }

    function get_category_name(){
        return $this->category_name;
    }
    function get_slug(){
        return $this->slug;
    }
    function get_home_status(){
        return $this->home_status;
    }
    function get_reg_date(){
        return $this->reg_date;
    }
}