<?php ?>
<nav class="navbar navbar-inverse" id="topbar"style="margin-top: -80px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <div id="logoNname">
            <img src="image/logo.png" id="navlogo">
            <a class="navbar-brand" href="#">Midnight Delivery</a>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">About Us<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="when.php">What is our schedule?</a></li>
                        <li><a href="who.php">Who made this cool site?</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ordering<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="shopping.php">Shopping</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                    </ul>
                </li>
                
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Career<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="hiring.php">We are hiring</a></li>
                        <li><a href="position.php">Listed Positions</a></li>
                    </ul>
                </li>
                           
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>