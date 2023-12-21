<?php

require_once('common.class.php');

class Slider extends Common
{
    public $banner_id, $banner_title, $banner_quote, $banner_link, $banner_img,
        $created_date, $status, $created_by;

    public function save()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'outsidelime');
        $sql = "insert into 
               slider(banner_title, banner_quote, banner_link, banner_img, status, 
               created_by, created_date) values('$this->banner_title',
                '$this->banner_quote','$this->banner_link',
                '$this->banner_img',
                '$this->status',
                 '$this->created_by',
                '$this->created_date')";

        $conn->query($sql);
        if ($conn->affected_rows == 1 && $conn->insert_id > 0) {
            return $conn->insert_id;
        } else {
            return false;
        }
    }
    public function retrieve()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'outsidelime');
        $sql = "select * from slider";
        $var = $conn->query($sql);
        if ($var->num_rows > 0) {
            $datalist = $var->fetch_all(MYSQLI_ASSOC);
            return $datalist;
        } else {
            return false;
        }
    }

    
    public function edit()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'outsidelime');
        $sql = "update slider set banner_title='$this->banner_title',
                                    banner_quote='$this->banner_quote',
                                    banner_img='$this->banner_img',
                                    banner_link='$this->banner_link',
                                    status='$this->status'
                                    where banner_id='$this->banner_id'";
        $conn->query($sql);
        if ($conn->affected_rows == 1) {
            return $this->banner_id;
        } else {
            return false;
        }
    }
    public function delete()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'outsidelime');
        $sql = "delete from slider where banner_id='$this->banner_id'";
        $var = $conn->query($sql);
        if ($var) {
            return "success";
        } else {
            return "failed";
        }
    }

    public function getById()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'outsidelime');
        $sql = "select * from slider where banner_id='$this->banner_id'";
        $var = $conn->query($sql);

        if ($var->num_rows > 0) {
            $data = $var->fetch_object();
            return $data;
        } else {
            return [];
        }
    }

    public function getAllSlider()
    {
        $sql = "select * from slider where status=1 limit 5";
        return $this->select($sql);
    }

    // public function getAllActiveNews()
    // {
    //     $sql = "select * from news where status=1 order by created_date desc limit 3";
    //     return $this->select($sql);
    // }

    // public function getAllActiveSliderNews()
    // {
    //     $sql = "select * from news where status=1 and slider_key = 1 order by created_date desc limit 5";
    //     return $this->select($sql);
    // }
    // public function getAllActiveBreakingNews()
    // {
    //     $sql = "select * from news where status=1 and breaking = 1 order by created_date desc limit 4";
    //     return $this->select($sql);
    // }
    // public function getAllActiveFeaturedNewsSlider()
    // {
    //     $sql = "select * from news where status=1 and featured = 1 order by created_date desc limit 4";
    //     return $this->select($sql);
    // }

    // public function getAllActiveFeaturedNews()
    // {
    //     $sql = "select * from news where status=1 and featured = 1 order by created_date desc";
    //     return $this->select($sql);
    // }
    // public function getNewsByCategoryId()
    // {
    //     $sql = "select * from news where status=1 and category_id ='$this->category_id' order by created_date desc limit 1";
    //     return $this->select($sql);
    // }

    // public function getNewsById()
    // {
    //     $sql = "select news.*, category.name as category_name from news join category on news.category_id = category.id where news.id='$this->id'";
    //     return $this->select($sql);
    // }
}
