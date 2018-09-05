<nav class="navbar">
    <div class="col-12">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="../dashboard">My Blog</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                <?php echo $_SESSION['username']; ?>
                </a>
                <ul class="dropdown-menu slideDown">
                    <li class="footer"> <a href="admin/logout"><i class="fa fa-sign-out"></i><span> Logout</span></a> </li>
                </ul>
            </li>
        </ul>
    </div>

</nav>
