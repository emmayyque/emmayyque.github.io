<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8"  name='viewport' content='width=device-width, initial-scale=1'>
        
        <!-- <title>Virtual Art Gallery</title> -->
        <title>Walking Man's Art Gallery</title>

        <!-- Link to Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="imgs/favicon/DevQuantum-favicon.png">

        <!-- Link to Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans&family=Poppins:wght@200;300;400;500;600&display=swap">

        <!-- Link to CSS -->
        <link rel="stylesheet" href="css/style.css">

        <!-- Link to JavaScript -->
        <script src="js/app.js"></script>
    </head>
    <body>
        <header>
            <section class="navBar">
                <a href="index.php"><img src="imgs/WMAG.png" alt="Art Galleries's Logo"></a>
                <nav>
                    <ul>
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
                <i class="fa fa-sign-in" id="signInBtn" onclick="show()"></i>
                <div class="sub-menu">
                    <i class="fa fa-bars"></i>
                    <ul class="sub-menu-list">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a onclick="show()">Login</a></li>
                    </ul>
                </div>
            </section>  
        </header>
        <section class="overlay">
            <div class="circle-left">

            </div>
            <div class="circle-right">

            </div>
            <div class="anim-circles">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
                <div class="circle5"></div>
                <div class="circle6"></div>
                <div class="circle7"></div>
                <div class="circle8"></div>
                <div class="circle9"></div>
                <div class="circle10"></div>
            </div>
        </section>
        <section class="main">
            <div class="main-left">
                <h2><span>Experience the Art Gallery in</span></h2>
                <h1>Virtual Reality</h1>
                <p>Welcome to a new dimension of art appreciation! Step into the future and immerse yourself in the captivating world of virtual reality art galleries. Experience the Art Gallery in Virtual Reality and let your senses roam freely amidst a breathtaking array of masterpieces like never before.</p>
                <a href="galleryVR.php" target="_blank" id="vrBtn">Get into VR</a>
            </div>
            <div class="main-right">
                <img src="imgs/model1.png" alt="a model viewing something on VR Headset">
            </div>    
        </section>
        <section class="container" id="cont">
            <div class="frm">
                
                <div id="textCard">
                    <i class="fa fa-window-close" id="closeBtn" onclick="hide()"></i>
                    <h1 id="textHeading">Welcome Back</h1>
                    <p id="textPara">Dive into a world of creativity with your login credentials.</p>
                </div>
                <div>
                    <div id="signInFrmRight">
                        <form action="php/login.php" method="POST">
                        <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Username" required>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                            <p><input type="checkbox" name="remember" id="remember"> Remember Me</p>
                            <input type="submit" name="submit" id="lgBtn" value="Login">
                            <p>Don't have an account? <span id="sgnBtn" onclick="shiftPanel()">Sign Up</span></p>
                        </form>
                    </div>
                    <div id="signUpFrmRight">
                        <form action="php/register.php" method="POST">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Full Name" required>
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Username" required>
                            <label for="number">Phone Number</label>
                            <input type="number" name="number" id="number" placeholder="+923123456789" required>
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" placeholder="Email Address" required>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" required>
                            <input type="submit" name="submit" id="sgBtn" value="Sign Up">
                            <p>Already have an account? Please <span id="lgnBtn" onclick="shiftPanel()">Login</span></p>
                        </form>
                    </div>
                </div>
            </div>
                
                
                <!-- <form action="" id="signUpFrm">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Full Name" required>
                    <label for="name">Phone Number</label>
                    <input type="text" name="number" id="number" placeholder="+923123456789" required>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email Address" required>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <label for="cPassword">Confirm Password</label>
                    <input type="password" name="cPassword" id="cPassword" placeholder="Password" required>
                    <p><input type="checkbox" name="remember" id="remember"> Remember Me</p>
                    <button >Sign Up</button>
                    <p>Already have an account <a href="#" onclick="LoginPanelShow1()">Sign In</a></p>
                </form> -->
        </section>     
       
        <script src="js/app.js"></script>
    </body>
</html>