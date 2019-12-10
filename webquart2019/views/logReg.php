<?php require_once "addCustomer_process.php"?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>


    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Theme CSS - Includes Bootstrap -->
    <link href="css/creative.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="index.css">
    <script type="text/javascript" src="../js/validation.js"></script>>

    <style>
        body {
            background-color: #CDA85C;
        }
        
        .progress {
            width: 50%;
            margin: 0 auto;
            margin-top: 20%;
        }
        
        @media only screen and (max-width:924px) {
            .progress {
                width: 70%;
                margin: 0 auto;
                margin-top: 60%;
            }
        }
    </style>
</head>

<body>

    <div id="flayer">
        <div id="slayer">

            <div class="container" id="content">
                <div class="row">
                    <div class="col l3 m3 s12"></div>
                    <div class="col l6 m6 s12">
                        <form action="addCustomer_process.php" method="POST">
                            <div class="card-panel z-depth-5">
                                <h5 class="center">Register with DiGiREM</h5>
                                <p class="center">Join Ghana's largest online Real Estate Market</p>

                                
                                <?php if(count($errors)>0):?>

                                <div class="alert alert-danger">
                                <?php foreach($errors as $error ):?>
                                    <li>
                                        <?php echo $error;?>
                                    </li>
                                <?php endforeach;?>
                                </div>
                            <?php endif;?>

                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="text" name="fname">
                                    <label>Enter First Name</label>
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="text" name="lname">
                                    <label>Enter Last Name</label>
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix">phone</i>
                                    <input type="text" name="phone">
                                    <label>Enter Phone number</label>
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix">email</i>
                                    <input type="email" name="email" class="validate">
                                    <label>Enter email</label>
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix">lock</i>
                                    <input type="password" name="pass1" id="pass1">
                                    <label>Enter password</label>
                                </div>


                                <div class="input-field">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input type="password" name="pass2">
                                    <label>Confirm password</label>
                                </div>

                                <p class="right">Already have an account? <a href="#login" class="modal-trigger">Login</a></p>
                                <input onsubmit="ValidateAll()" type="submit" name="register" value="register" class="btn btn-primary btn-lg  btn left col s12 modal-trigger">

                                <div class="clearfix"></div>
                            </div>
                        </form>

                    </div>
                    <div class="col l3 m3 s12"></div>



                </div>
            </div>
        </div>
    </div>
    <!-- login form put in the form -->
    <div class="modal modal-fixed-footer" id="login">
        <form action="" method="POST">
            <div class="modal-conent">
                <div class="container">
                    <h5 class="center">Login</h5>
                    <p class="center"></p>
                    <div class="row">

                        <div class="col m12 s12">
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <input type="text" name="email">
                                <label>Enter Email</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <input type="password" name="pass2">
                                <label>Enter password</label>
                            </div>
                            <p>
                                <label>
                      <input type="checkbox">
                      <span>Remember me</span>
                    </label>
                            </p>
                        </div>

                    </div>
                </div>
                <!-- end of modal container -->
            </div>

            <div class="modal-footer">
                <div class="container">


                    <p class="left">Are you New? <a href="" class="modal-trigger">Register</a></p>
                    <input type="submit" value="Login" name="login" class="btn btn-primary">
                    <button class="btn modal-close red">Close</button>


                </div>



            </div>
    </div>
    </form>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="C:\xampp_\htdocs\Webtech_Project\startbootstrap-bare-gh-pages\validation.js"></script>
    <script>
        const login = document.querySelectorAll(".modal");
        M.Modal.init(login, {
            opacity: 0.7,
            dismissible: false
        });

        document.querySelector("#content").style.display = "none";
        document.querySelector("#flayer").classList.add("progress");
        document.querySelector("#slayer").classList.add("indeterminate");

        setTimeout(function() {
            document.querySelector("#flayer").classList.remove("progress");
            document.querySelector("#slayer").classList.remove("indeterminate");
            document.querySelector("#content").style.display = "block";
        }, 3000)
    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
</body>

</html>