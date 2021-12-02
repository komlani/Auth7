<body class="nav-md footer_fixed">

  <div class="container body">

    <div class="main_container">

      <div class="col-md-3 left_col menu_fixed">

        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span><?php echo APP_NAME ?></span></a>
          </div>

          <div class="clearfix"></div>
          <br />

          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3><a class="text-white" href="<?php echo  URL ?>dashboard">Dashboard</a></h3>
              <ul class="nav side-menu">

                <?php if (isset($canManageUser) && $canManageUser == true ) { ?>
                  <li><a href="<?php echo URL ?>user">
                      <i class="fa fa-user"></i> Users</span></a>
                  </li>
                <?php } ?>
                
                <!-- <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="#">General Form</a></li>
                  </ul>
                </li> -->
              </ul>
            </div>
          </div>

          <div class="sidebar-footer hidden-small">

            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="fa fa-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="fa fa-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="fa fa-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="fa fa-cog" aria-hidden="true"></span>
            </a>

          </div>

        </div>

      </div>