<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Login</title>

	<link href="assets/vendor/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/style-login.css">
</head>
	
<body>
	<div class="container">    
        <div id="loginbox" style="margin-top: 150px; margin-left: 35%; width: 30%; " class="mainbox">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title text-center"><h1>Absensi Siswa Realtime</h1></div>
                </div>     

                <div style="padding-top:20px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                    <form id="loginform" method="POST" action="<?php echo base_url()."login/cek_login";?>" class="form-horizontal" role="form">
                                    
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="username" type="text" class="form-control" name="username" value="" placeholder="Masukan ID">                                        
                        </div>
                                
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Masukan Kata Sandi">
                        </div>
                                    
                       	<div style="margin-top:10px" class="form-group">
                        
                        <!-- Button -->

    	                    <div class="col-sm-12 controls">
    	                       	<input id="btn-login" href="#" type="submit" name="submit" class="btn btn-success col-sm-12" value="Login" />
    	                    </div>
                       	</div>    
                    </form>
                </div>                     
            </div>  
        </div>
    </div>
    


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="assets/vendor/js/jquery.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="assets/vendor/js/bootstrap.js"></script>
</body>
</html>