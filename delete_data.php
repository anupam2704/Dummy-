<html>
    <?php require "conn.php";
          include "functions.php"; ?>
    <head>
        <title>
            Delete Page
        </title>
        <link rel="stylesheet" type="text/css" href="delete_style.css">
    </head>
    <body>
        <?php if($_POST['delete']=='Yes'):
                //echo "done before post";
                $id=$_GET['id'];
                $obj= new actions(); 
                $response=$obj->delete($id);
                //echo "The response is".$response;
                endif;
                //print_r($_POST);?>
        <h1>Delete Data</h1>
        <form method="POST" action=" ">
            <!-- <input type="hidden" value="<?php //echo $_GET['id']; ?>" name="id"/> -->
            Are you sure you want to delete <br> this record? <br>
            <input type="submit" id="yes_btn" name="delete" value="Yes">
            <a href="index.php">No</a> <br>
        </form>
         <p id="del_msg"><?php if($response==1)
                                    echo "Record Deleted";?></p>
        <a href="index.php">
            <b>
                HOME
            </b>
        </a>

    </body>
</html>
