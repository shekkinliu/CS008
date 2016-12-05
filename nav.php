<?php ?>
<nav class="navbar navbar-inverse" id="topbar"style="margin-top: -80px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#">Food Item Express</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">About Us<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="why.php">Why are we here?</a></li>
                        <li><a href="who.php">Who made this cool site?</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ordering<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="itemlist.php">Item List</a></li>
                        <li><a href="shopping.php">Shopping</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
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