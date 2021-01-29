
<!-- Header  -->

<header class="navbar navbar-fixed-top">
    <ul class="nav navbar-nav navbar-left">                
        <li class="hidden-xs">
            
        </li>
    </ul>
    <form class="navbar-form navbar-left search-form square" role="search">
        <div class="input-group add-on">
           
           
        </div>
    </form>
    <ul class="nav navbar-nav navbar-right">
                                      
        <li class="dropdown dropdown-fuse navbar-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                <span class="hidden-xs">
                <span class="name"><?=$_SESSION["user_name"]?></span>
                </span>
                <span class="fa fa-caret-down hidden-xs"></span>
            </a>
            <ul class="dropdown-menu list-group keep-dropdown w230" role="menu">                                           
                <li class="dropdown-footer text-center">
                    <a href="server/logout.php" class="btn btn-warning">
                    logout
                </a>
                </li>
            </ul>
        </li>
    </ul>
</header>
<!-- /Header -->