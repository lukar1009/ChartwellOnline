    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../home_page.php">
                <img src="./images/logo.png" style="height: 50px;" class="img-responsive img-fluid" alt="LOGO">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php 
                if(isset($_SESSION['firstname'])){
                    echo "Logged User - " . $_SESSION['firstname'];
                }else{
                    echo "Admin User";
                }
                
                ?>
                <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="../home_page.php"><i class="fa fa-fw fa-home"></i> Home Page</a></li>
                    
                    <li><a href="edit_profile.php?user=<?php echo $_SESSION['user_id']; ?>"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    
                    <li class="divider"></li>
                    <li><a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="gornji-deo collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li><a href="./index.php"><i class="fa fa-fw fa-home"></i> Admin Panel Home</a></li>
                <li>
                    <a class="text-white" href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa text-white fa-fw fa-search"></i> View <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="view_all_users.php"><i class="fa fa-angle-double-right"></i> All Users </a></li>
                        <li><a href="view_all_lessons.php"><i class="fa fa-angle-double-right"></i> All Lessons </a></li>
                        <li><a href="view_all_comments.php"><i class="fa fa-angle-double-right"></i> All Comments </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-user-plus"></i> Insert <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="../register_view.php"><i class="fa fa-angle-double-right"></i> Register New User</a></li>
                        <li><a href="../add_lesson.php"><i class="fa fa-angle-double-right"></i> Insert New Lesson</a></li>
                    </ul>
                </li>
                <li>
                    <a href="contact_support.php"><i class="fa fa-fw fa fa-question-circle"></i> Contact Support</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
