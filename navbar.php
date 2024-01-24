<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
} ?>

<div class="container">
        <div class="sidebar">
            <nav class="main-menu">
                <div>
                    <!-- <img src="../../assets/img/logo.png" alt="Logo" class="logo"> -->
                </div>

                <div class="scrollbar" id="style-1">

                    <ul>

                        <li class="<?php if ($page == 'Home') {echo 'active';} ?>">
                            <a href="../home">
                                <i class="fa fa-home fa-lg"></i>
                                <span class="nav-text">Home</span>
                            </a>
                        </li>


                        </li>
                        <li class="darkerlishadow <?php if ($page == 'Dashboard') {echo 'active';} ?>">
                            <a href="../announcement/index.html">
                                <i class="fa fa-bar-chart  fa-lg"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="darkerli <?php if ($page == 'Resident') {echo 'active';} ?>">
                            <a href="../resident/">
                                <i class="fa fa-users fa-lg"></i>
                                <span class="nav-text">Residents</span>
                            </a>
                        </li>

                        <li class="darkerli <?php if ($page == 'Announcement') {echo 'active';} ?>">
                            <a href="../announcement/">
                                <i class="fa fa-bullhorn fa-lg"></i>
                                <span class="nav-text">Announcement</span>
                            </a>
                        </li>


                        <li class="darkerlishadowdown <?php if ($page == 'Users') {echo 'active';} ?>">
                            <a href="../user/">
                                <i class="fa fa-user fa-lg"></i>
                                <span class="nav-text">Users</span>
                            </a>
                        </li>


                    </ul>



                    <ul class="logout">
                        <li>
                            <a href="http://startific.com">
                                <i class="fa fa-sign-out fa-lg"></i>
                                <span class="nav-text">
                                    Logout
                                </span>

                            </a>
                        </li>
                    </ul>
            </nav>
        </div>
        <div class="content">

        </div>
    </div>