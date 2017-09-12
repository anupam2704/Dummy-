<html>
     <?php require "conn.php";
           include "functions.php" ?>
    <head>
        <title>Insert Page</title>
        <link rel="stylesheet" type="text/css" href="insert_style.css">
    </head>
    <body>
        <h1>Insert New Data</h1>
        <form method="POST" action=" ">
        <p style="font-size:12px; line-height: 20px;">
            <?php
                $obj= new actions();
                //$obj2= new actions();
                if($_GET['id'])
                {
                    $id = $_GET['id'];
                    //echo "The id is".$id;
                    $response=$obj->insert($id);
                    $prev_name=$obj->prev_name;
                    // "Previous Name".$prev_name;
                    $prev_city=$obj->prev_city;
                    $prev_age=$obj->prev_age;
                    $prev_phone=$obj->prev_phone;
                }
                else
                { 
                    $id=0;
                    $obj= new actions();
                    $response=$obj->insert($id); 
                } ?>
        </p>
            <label>Name</label> : <input type="text" name="person_name" value="<?php if($response==0) 
                                                                                     echo $prev_name;
                                                                                     if($response==1)
                                                                                     echo $obj->name; ?>"><br>
            <label>City</label> : <input type="text" name="person_city" align="middle" value="<?php if($response==0) 
                                                                                                    echo $prev_city;
                                                                                                    if($response==1)
                                                                                                    echo $obj->city; ?>"><br>
            <label>Age</label> : <input type="text" name="person_age" value="<?php if($response==0)
                                                                                   echo $prev_age; 
                                                                                   if($response==1)
                                                                                   echo $obj->age; ?>"><br>
            <label>Phone</label> : <input type="text" name="person_phone" value="<?php  if($response==0)
                                                                                        echo $prev_phone; 
                                                                                        if($response==1)
                                                                                        echo $obj->phone; ?>"><br>
            <input id="submit_btn" type="submit" name="submit" value="Save Changes"><br>
        </form>

         <a href="index.php">
            <b>
                HOME
            </b>
        </a>
    </body>
</html>
