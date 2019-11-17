 
<HTML>
<HEAD>
 <TITLE>SURE-</TITLE>
</HEAD>
<BODY>
 
 
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'>
        <link href="css/semantic.min.css" rel="stylesheet">
        <link href="css/templatemo_style.css"  rel='stylesheet' type='text/css'>
        <link href="css/mystyle.css"  rel='stylesheet' type='text/css'> 
<div class="container">

               <div class="row">
                    <div class="templatemo-line-header" style="margin-top: 40px;" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="span_blog txt_darkgrey txt_orange"><img src="images/uwa-1.png"></span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                </div>
 </div>
     <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="process_login.php">
						 <?php
if(isset($_GET['error'])) {
   echo '<div class=error>Error Logging In!</div>';

}

  ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User name" name="username" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label> <input name="remember" type="checkbox" value="Remember Me">Remember Me</label>
                                </div>
                                <button type="sumbit" name="submit" value="login" class="btn btn-lg btn-success btn-block">Login</button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</BODY>
</HTML>
