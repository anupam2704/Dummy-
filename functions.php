<?php

//require "conn.php";

class actions
{
        //include "validation.php";
        public $prev_name;
        public $prev_city;
        public $prev_age;
        public $prev_phone;
        public $message;
        public $search_result;
        public $name;
        public $age;
        public $city;
        public $phone;

        public function view_data()
        {
                require "conn.php";
                $view="SELECT * FROM user";
                $result=$connection->query($view);
                return $result;
        }

        public function insert($id)
        {
                include "validation.php";
                require "conn.php";
                $view="SELECT * FROM user WHERE ID='$id'";
                $result=$connection->query($view);
                $row=$result->fetch_assoc();
                $this->prev_name=$row["col_name"];
                $this->prev_city=$row["col_city"];
                $this->prev_age=$row["col_age"];
                $this->prev_phone=$row["col_phone"];
                $this->name=$_POST['person_name'];
                $this->city=$_POST['person_city'];
                $this->age=$_POST['person_age'];
                $this->phone=$_POST['person_phone'];
                $respone=0;
                if($_SERVER['REQUEST_METHOD'] == 'GET')
                        echo "";
                elseif(
                        (!empty($_POST['person_name'])) &&
                        (!empty($_POST['person_city'])) &&
                        (!empty($_POST['person_age']))  &&
                        (!empty($_POST['person_phone']))
                      ){
                                /*Validation Check Starts*/
                                //echo "Id received is".$id;
                                $val_obj=new validate();
                                $val_age=$val_obj->validate_age($this->age);
                                //echo "The age".$val_age;
                                $val_phn=$val_obj->validate_phone($this->phone);
                                //echo "The Phone".$val_phn;
                                $val_name=$val_obj->validate_name($this->name);
                                //echo "the returned".$val_name;
                                $val_city=$val_obj->validate_city($this->city);
                                if($val_age>0)
                                {
                                        if($val_age==1)
                                                echo "-Age should be between 1-75-"."<br>";
                                        if($val_age==2)
                                                echo "-Age can only be numeric/no spaces-"."<br>";
                                        if($val_age==3)
                                                echo "-No spaces allowed in age-"."<br>";
                                }
                                if($val_phn>0)
                                {
                                        if($val_phn==1)
                                                echo "-Phone no should be of 10 digits-"."<br>";
                                        if($val_phn==2)
                                                echo "-Phone can only be numeric-"."<br>";
                                        if($val_phn==3)
                                                echo "-No spaces allowed in phone-"."<br>";
                                }
                                if($val_name>0)
                                {
                                        echo "-Name can only contain alphabets-"."<br>";
                                }
                                if($val_city>0)
                                {
                                        echo "-Only alphabets/no spaces allowed in city-"."<br>";
                                }
                                /*Validation Check Ends*/


                                /*Insertion of New Data*/
                                if($id==0)
                                {
                                    if($val_age==0 && $val_phn==0 && $val_name==0 && $val_city==0)
                                    {
                                        //$obj->insert($name, $city, $age, $phone);
                                        $sql = "INSERT INTO  user (col_name, col_age ,col_city, col_phone) VALUES ('$this->name','$this->age','$this->city','$this->phone')";
                                        if ($connection->query($sql) === TRUE) {
                                                echo "\n New record created successfully \n";
                                        }
                                        else {
                                                echo "Error: " . $sql . "<br>" . $connection->error;
                                        }
                                    }
                                    else 
                                    {   
                                        $response=1;
                                    }
                                }
                                /*Insertion of New Data Ends*/

                                /*Updating Data*/
                                if($id>0)
                                {
                                    if(($this->prev_name!=$this->name) || ($this->prev_city!=$this->city) || ($this->prev_age!=$this->age) || ($this->prev_phone!=$this->phone))
                                    {
                                        if($val_age==0 && $val_phn==0 && $val_name==0 && $val_city==0)
                                        {   
                                            $update= "UPDATE user SET col_name='$this->name', col_city='$this->city', 
                                            col_age='$this->age', col_phone='$this->phone' WHERE ID='$id'";
                                            $connection->query($update);
                                            $this->message=1;
                                            echo "Data Updated";
                                        }
                                        else
                                            $response=1;
                                        
                                    }
                                    else
                                    {
                                            echo "Change a field first";
                                    }
                                }
                                /*Updating Data Ends*/


                        }
                else
                {   
                    $response=1;
                    echo "Fill all the fields";
                }
                return $response;
        }


        public function delete($id)
        {
                        require "conn.php";
        //              echo "the id to delete is".$id;
                        $sql="DELETE FROM user WHERE ID='$id'";
                        $response_id=$connection->query($sql);
                        return $response_id;
        }


        public function search($search_type, $search_value)
        {
                //echo "the received value is".$search_value;
                require "conn.php";
                switch ($search_type) {

                    case '1':

                            //echo "the received type is first";
                            $query="SELECT * FROM user WHERE col_name LIKE '%$search_value%'";
                            $this->search_result=$connection->query($query);
                            $count=$this->search_result->num_rows;
                           // echo "The number of row are ".$count;
                            if($count>0)
                                $msg=1;
                            else
                                $msg=0;
                            break;

                    case '2':
                            $query="SELECT * FROM user WHERE col_phone LIKE '%$search_value%'";
                            $this->search_result=$connection->query($query);
                            $count=$this->search_result->num_rows;
                            //echo "The number of row are ".$count;
                            if($count>0)
                                $msg=2;
                            else
                                $msg=0;
                            break;
                    
                    default:
                        echo " ";
                        break;
                }
                return $msg;
        }


}
