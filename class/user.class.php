<?php

require_once('common.class.php');

class User extends Common
{
    public $id, $fullname, $email, $age,
        $phone, $gender, $occupation, $area, $address, $password;

    public function save()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'homesolution');
        $sql = "insert into 
               users(fullname, email, age, phone, gender, 
               occupation, area, address, password) values('$this->fullname','$this->email','$this->age',
               '$this->phone','$this->gender', '$this->occupation', '$this->area', '$this->address', '$this->password')";

        $conn->query($sql);
        if ($conn->affected_rows == 1 && $conn->insert_id > 0) {
            return $conn->insert_id;
        } else {
            return false;
        }
    }
    // public function retrieve()
    // {
    //     $conn = mysqli_connect('localhost', 'root', '', 'outsidelime');
    //     $sql = "select * from slider";
    //     $var = $conn->query($sql);
    //     if ($var->num_rows > 0) {
    //         $datalist = $var->fetch_all(MYSQLI_ASSOC);
    //         return $datalist;
    //     } else {
    //         return false;
    //     }
    // }


    // public function edit()
    // {
    //     $conn = mysqli_connect('localhost', 'root', '', 'outsidelime');
    //     $sql = "update slider set banner_title='$this->banner_title',
    //                                 banner_quote='$this->banner_quote',
    //                                 banner_img='$this->banner_img',
    //                                 banner_link='$this->banner_link',
    //                                 status='$this->status'
    //                                 where banner_id='$this->banner_id'";
    //     $conn->query($sql);
    //     if ($conn->affected_rows == 1) {
    //         return $this->banner_id;
    //     } else {
    //         return false;
    //     }
    // }
    // public function delete()
    // {
    //     $conn = mysqli_connect('localhost', 'root', '', 'outsidelime');
    //     $sql = "delete from slider where banner_id='$this->banner_id'";
    //     $var = $conn->query($sql);
    //     if ($var) {
    //         return "success";
    //     } else {
    //         return "failed";
    //     }
    // }



}
