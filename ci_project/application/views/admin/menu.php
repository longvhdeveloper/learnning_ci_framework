<?php
if ($this->session->userdata('id') > 0) {
    ?>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container"><a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                        class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a
                    class="brand" href="index.html">Admin Area </a>

                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="icon-cog"></i> Account <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:;">Settings</a></li>
                                <li><a href="javascript:;">Help</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="icon-user"></i><?php echo $this->session->userdata('username'); ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:;">Profile</a></li>
                                <li><a href="<?php echo base_url().'admin/verify/logout' ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-search pull-right">
                        <input type="text" class="search-query" placeholder="Search">
                    </form>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!-- /container -->
        </div>
        <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li class=""><a href="<?php echo base_url().'admin/user/index' ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a></li>
                    <li class="active"><a href="<?php echo base_url().'admin/user/index' ?>"><i class="icon-user"></i><span>User</span> </a></li>
                    <li class="active"><a href="<?php echo base_url().'admin/news/index' ?>"><i class="icon-list"></i><span>News</span> </a></li>
                    <li class="active"><a href="<?php echo base_url().'admin/category/index' ?>"><i class="icon-list"></i><span>Catetories</span> </a></li>
                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /subnavbar-inner -->
    </div>
    <!-- /subnavbar -->
<?php
} else {
?>
    <div class="navbar navbar-fixed-top">

        <div class="navbar-inner">

            <div class="container">

                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <a class="brand" href="index.html">
                    Bootstrap Admin Template
                </a>

                <div class="nav-collapse">
                    <ul class="nav pull-right">

                        <li class="">
                            <a href="signup.html" class="">
                                Don't have an account?
                            </a>

                        </li>

                        <li class="">
                            <a href="index.html" class="">
                                <i class="icon-chevron-left"></i>
                                Back to Homepage
                            </a>

                        </li>
                    </ul>

                </div><!--/.nav-collapse -->

            </div> <!-- /container -->

        </div> <!-- /navbar-inner -->

    </div> <!-- /navbar -->
<?php } ?>