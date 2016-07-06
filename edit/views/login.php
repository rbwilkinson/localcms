<html class="login-lcms">
    <span id="badge-lcms">
    </span>
    <div class="container"  style='padding-top: 80px;'>
        <div class="row">
            <div class="col-sm-12">
                <div id="brand">
                    
                    <h2>Sign In To Edit <br><?php echo $title->content; ?>.</h2>

                </div><!--/#brand-->
            </div><!--/.col-*-->
            <div class="col-sm-7 col-md-6 col-lg-5 login">
                <form method="POST" action="controllers/login.php?action=login" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputUsername" class="col-sm-2 col-md-2 control-label">Username</label>
                        <div class="col-sm-10 col-md-10">
                            <input type="text" class="form-control" name='username' id="inputUsername" placeholder="" tabindex="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 col-md-2 control-label">Password</label>
                        <div class="col-sm-10 col-md-10">
                            <input type="password" class="form-control" name='password' id="inputPassword" placeholder="" tabindex="2">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 col-sm-4 col-md-4 submit">
                            <button type="submit" class="btn btn-primary btn-lg" tabindex="4">Log In</button>
                        </div>
                    </div>
                </form>
                <div class='form-group'>
                    <p><a class="brand" href="../">&larr; Back to <?php echo $title->content; ?></a></p>
                </div>
            </div><!--/.col-*-->
            <div class="col-sm-5 col-md-6 col-lg-7 details">
                <p>
                    <img src="../images/localcms.png" alt="LocalCMS Application"><br /><br />
                    <strong>Welcome to your LocalCMS Control Panel</strong>
                    <br />
                    Login here to set content and edit your website.
                </p>
            </div><!--/.col-*-->
        </div><!--/.row-->
    </div><!--/.container-->

</html>