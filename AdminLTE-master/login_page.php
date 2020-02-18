<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login_page</title>
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css">

	<style>
			  #b3{
                              background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                              background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                              background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                              background-image: linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                              color: blue;
                              border-left: solid 1px rgba(172,239,224,0.66);
                              border-top: solid 1px rgba(172,239,224,0.66);
                              border-right: solid 1px rgba(172,239,224,0.66);

                              border-radius: 15px 15px 15px 15px;
        					width: 50%;
				  margin: 0 auto;
				  padding-bottom: 50px;
				  margin-top: 50px;
				  padding-top: 60px;
		}
		#iner_div{
			width: 40%;
			margin: 0 auto;
		}
	</style>
</head>

<body>
	<div class="" id="b3">
		<div id="iner_div">
				<form  method="post" action="index.php">

								Enter Email:
								<input type="text" name="email" class="form-control" required>
								<br>
								Password:
								<input type="password" name="pass" placeholder="Enter Password " class="form-control" required>
								<br>
								<button type="submit" name="btn_lg" class="btn btn-primary btn-block">Log in</button>


				</form>
		</div>

	</div>

</body>
</html>
