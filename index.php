<html>
    <?php require "conn.php";
          include "functions.php" ?>
    <head>
        <title>Dummy Directory</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <h2>Dummy Directory Structure</h2>
        <a style="text-decoration:none;" href="insert.php">
            <div id="insert" class="insert">
                Click Here To Insert Data
            </div>
        </a>

        <?php
                if($_POST['search_btn']=='Search'):   
                    $search_value=$_POST['search_value'];
                    $search_type=$_POST['select_search'];
                    //echo "search value :".$search_value; 
                    //echo "search type :".$search_type."<br>"; 
                    $obj=new actions();
                    $response=$obj->search($search_type,$search_value);
                    //echo "the search response is".$response;
                    $search_return=$obj->search_result;
                endif
        ?>

        <form method="POST" action=" ">
                <select name="select_search">
                    <option value="1">Name</option>
                    <option value="2">Phone</option>
                </select>
                <input type="text" name="search_value" placeholder="Enter Value"> <input type="submit" name="search_btn" value="Search">
        </form>

        <h4 style="color:red">
            <?php
                if($_POST['search_btn']=='Search')
                { 
                    if($response==0)
                    echo "No Record Found, Search Again!";
                }
            ?>
        </h4>


        <table class="data_table">
            <tr>
                   <th>Name</th>
                   <th>Age</th>
                   <th>City</th>
                   <th>Phone</th>
                   <th>Edit</th>
                   <th>Delete</th>
            </tr>
            <?php
                //echo "Returned Value".$msg;
                if($response==0):
                $view_obj= new actions();
                $verify=$view_obj->view_data(); 
                while($row=$verify->fetch_assoc()):
            ?> 
            <tr>
                    <td><?php echo $row["col_name"]; ?></td>
                    <td><?php echo $row["col_age"]; ?></td>
                    <td><?php echo $row["col_city"]; ?></td>
                    <td><?php echo $row["col_phone"]; ?></td>
                    <td><a class="edit_del" href="insert.php?id=<?php echo $row['ID'] ?>">Edit</a></td>
                    <td><a class="on_delete edit_del" href="delete_data.php?id=<?php echo $row['ID'] ?>">Delete</a></td>
            </tr>
            <?php   endwhile;
                     // endif ?>

            <?php  elseif($response==1):
                    //$search_return=$obj->search_result;
                    while($search_data=$search_return->fetch_assoc()): ?>
            <tr>
                    <td><?php echo $search_data["col_name"]; ?></td>
                    <td><?php echo $search_data["col_age"]; ?></td>
                    <td><?php echo $search_data["col_city"]; ?></td>
                    <td><?php echo $search_data["col_phone"]; ?></td>
                    <td><a class="edit_del" href="insert.php?id=<?php echo $search_data['ID'] ?>">Edit</a></td>
                    <td><a class="on_delete edit_del" href="delete_data.php?id=<?php echo $search_data['ID'] ?>">Delete</a></td>
            </tr>

            <?php   endwhile;
                    elseif($response==2):
                    //$search_return=$obj->search_result;
                    while($search_data=$search_return->fetch_assoc()): ?>
            <tr>
                    <td><?php echo $search_data["col_name"]; ?></td>
                    <td><?php echo $search_data["col_age"]; ?></td>
                    <td><?php echo $search_data["col_city"]; ?></td>
                    <td><?php echo $search_data["col_phone"]; ?></td>
                    <td><a class="edit_del" href="insert.php?id=<?php echo $search_data['ID'] ?>">Edit</a></td>
                    <td><a class="on_delete edit_del" href="delete_data.php?id=<?php echo $search_data['ID'] ?>">Delete</a></td>
            </tr>

            <?php   endwhile;
                    else: echo "ghanta";
                        endif ?>
        </table>
        <div id="delete_box">
                Are you sure you want to do this? <br>
                <input id="yes" type="submit" value="Yes">
                <input id="no" type="submit" value="No">
        </div>
    </body>
</html>
