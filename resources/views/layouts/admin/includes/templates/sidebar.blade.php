<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{asset('assets/images/img.jpg')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2>John Doe</h2>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <h3>Dashboard</h3>
                        <li><a href="{{route('webIndexPage')}}">Visit Website</a></li>
                        <li><a href="index3.html">Favicon Management</a></li>
                        <li><a href="index3.html">Logo Management</a></li>
                        <li><a href="index3.html">Banner Management</a></li>
                        <li><a href="{{route('config.edit')}}">Config</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> CMS <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a> Pages </a>
                        <ul class="nav child_menu">
                            <li><a href="form_advanced.html">Home Page</a></li>
                            <li><a href="form_validation.html">Contact Us</a></li>
                            <li><a href="form_wizards.html">About Us</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-sliders"></i> Slider Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index2.html">Home Main Slider</a></li>
                    <li><a href="index2.html">Home Side Slider</a></li>
                    <li><a href="index3.html">Contact Us</a></li>
                    <li><a href="index3.html">About Us</a></li>
                </ul>
            </li>
            <li><a href="{{ route('blogs.index') }}"><i class="fa fa-edit"></i> Blog Management <span class="fa fa-chevron-right"></span></a></li>
            <li><a href="{{ route('categories.index') }}"><i class="fa fa-object-group"></i> Category Management <span class="fa fa-chevron-right"></span></a>
            </li>
            <li><a><i class="fa fa-envelope"></i> Inquiry Management <span class="fa fa-chevron-right"></span></a>
            </li>
            <li><a><i class="fa fa-user-plus"></i> Manage NewsLetter <span class="fa fa-chevron-right"></span></a>
            </li>
            @auth
                @if(auth()->user()->hasRole('admin'))
                    <li><a href="{{ route('roles.index') }}"><i class="fa fa-shield"></i>Roles<span class="fa fa-chevron-right"></span></a></li>
                    <li><a href="{{ route('permissions.index') }}"><i class="fa fa-key"></i>Permissions<span class="fa fa-chevron-right"></span></a></li>
                    <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> Users Management<span class="fa fa-chevron-right"></span></a>
                    </li>
                @endif
            @endauth

        </ul>
    </div>

      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>
