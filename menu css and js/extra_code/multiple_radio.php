<?php

$connect = mysqli_connect("localhost", "root", "", "testing");

?>
<html>
      <head>
           <title>Webslesson Tutorial</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <style>

   .box
   {
    width:750px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:100px;
   }
  </style>
      </head>
      <body>
        <div class="container box">
          <h3 align="center">Get Multiple Checkbox values and Insert into Mysql in PHP</h3><br />
          <h4>Please Select Programming Language</h4><br />
          <form method="post">
           <p><input type="checkbox" name="language[]" value="C" /> C</p>
           <p><input type="checkbox" name="language[]" value="C++" /> C++</p>
           <p><input type="checkbox" name="language[]" value="C#" /> C#</p>
           <p><input type="checkbox" name="language[]" value="Java" /> Java</p>
           <p><input type="checkbox" name="language[]" value="PHP" /> PHP</p>
           <p><input type="submit" name="submit" class="btn btn-info" value="Submit" /></p>
          </form>
          <?php
          if(isset($_POST["submit"]))
          {
           $for_query = '';
           if(!empty($_POST["language"]))
           {
            foreach($_POST["language"] as $language)
            {
             $for_query .= $language . ', ';
            }
            $for_query = substr($for_query, 0, -2);
            $query = "INSERT INTO tbl_language (name) VALUES ('$for_query')";
            if(mysqli_query($connect, $query))
            {
             echo '<h3>You have select following language</h3>';
                echo '<label class="text-success">' . $for_query . '</label>';
            }
           }
           else
           {
            echo "<label class='text-danger'>* Please Select Atleast one Programming language</label>";
           }
          }
          ?>
     <br />
         </div>
      </body>
 </html>
