<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	
		<title>Bootstrap 3 Control Panel</title>
	
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="styles.css" rel="stylesheet">
<style>
@import "bourbon";

body {
	background: #eee !important;	
}

.wrapper {	
	margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
}

</style>
</head>
<body>

	
	
	  <div class="wrapper">
    <form class="form-signin" action="checkLogin.php" method="POST">       
      <h2 class="form-signin-heading">Please login</h2>
	 
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" style="margin-top:10px;" autofocus="" />
      <input type="password" class="form-control" id="password" name="password" style="margin-top:10px;" placeholder="Enter Password" />      
     
      <button class="btn btn-lg btn-primary btn-block" style="margin-top:10px;" type="submit">Login</button>   
    </form>
  </div>
	
</body>
</html>