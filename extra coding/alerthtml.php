<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<h2>Alert Messages</h2>
<form action="" method="post">
<button type="submit" name="b">click</button>
</form>
<p>Click on the "x" symbol to close the alert message.</p>

<?php  if (isset($_POST['b'])) {
  echo "button are clicked "; ?>
  <style>
  .alert {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    background-color: orange;
    color: white;
    border-radius: 15px
  }

  .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 40px;
    line-height: 30px;
    cursor: pointer;
    transition: 0.4s;

  }

  .closebtn:hover {
    color: black;
  }
  </style>






<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
  <h2>hello me are allert of the html</h2>
  how can it help your
  <h1>welcome ! ....</h1>
</div>

<?php  }  ?>
</body>
</html>
