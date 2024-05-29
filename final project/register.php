<?php 
include ( 'nav.php' ) ; 

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
    # Connect to the database.
  require ('connect_db.php'); 

  # Initialize an error array.
  $errors = array();

  # Check for a first name.
  if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }

  # Check for a last name.
  if ( empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }

  # Check for an email address.
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter email address.' ; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }

   # Check for a password and matching input passwords.
   if ( !empty($_POST[ 'pass1' ] ) )
   {
     if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
     { $errors[] = 'Passwords do not match.' ; }
     else
     { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
   }
   else { $errors[] = 'Enter your password.' ; }

   # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) 
$errors[] = 
'Email address already registered. 
<a class="alert-link" href="login.php">Sign In Now</a>' ;
  }

  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) 
	VALUES ('$fn', '$ln', '$e', '$p', NOW() )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '
     <p>You are now registered.</p>
	  <a class="alert-link" href="login.php">Login</a>'; }
	  
# Close database connection.
    mysqli_close($link); 
    exit();
  }

  # Or report errors.
  else 
  {
    echo '<h4 class="alert-heading" id="err_msg">The following error(s) occurred:</h4>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo '<p>or please try again.</p></div>';
    # Close database connection.
    mysqli_close( $link );
  }  
}
?>

<div class="container">
    <!--HTML Register Form-->

    <div class="row">
        <div class="col-sm">
            <div class="card bg-light mb-3">
                <div class="card-header"><h1>Create Account</div>
                <div class="card-body">
                    <form action="register.php" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputfirst_name">First Name</label>
                                    <input type="text" name="first_name" class="form-control" required placeholder="* Enter your first name">

                                </div>
                            </div><!--closing col-->
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputlast_name">last Name</label>
                                    <input type="text" name="last_name" class="form-control" required placeholder="* Enter your Lat name">

                                </div><!--closing col-->
                            </div><!--closing col-->

                        </div><!--closing row-->
                        <div class="form-group">
                            <label for="inputemail">Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="* Enter your email address">

                        </div>
                        <small id="emailHelp" class="form-text text-muted">*We will never share your information</small>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputpass1">Create New Password</label>
                                    <input type="password" name="pass1" class="form-control" requiered placeholder="* Enter your password">
                                </div>
                            </div><!--Closing col-->
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputpass2">confirm Password</label>
                                    <input type="password" name="pass2" class="form-control" requiered placeholder="* Re-enter your password">
                                </div>
                            </div><!--Closing col-->
                        </div><!--closing row-->
                        <hr>
                        <p>By creating an account you agree to our <a href="#">Terms & Privacy Agreement</a>
                        <input type="submit" class="btn btn-dark btn-lg btn-block">

                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
<?php 
include 'footer.php';
?>