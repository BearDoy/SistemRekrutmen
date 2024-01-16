<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
            Master Data <span class="caret"></span>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" tabindex="-1" href="users/biodata">Biodata</a>
            <a class="dropdown-item" tabindex="-1" href="#">Another action</a>
            <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>
          </div>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
      -->
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="{{auth()->user()->getAvatar()}}" class="user-image img-circle elevation-2" alt="image">
            <span class="d-none d-md-inline">{{auth()->user()->username}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
              <!-- User image -->
              <li class="user-header bg-primary">
                <img src="{{auth()->user()->getAvatar()}}" class="img-circle elevation-2" alt="User Image">

                <p>
                  {{auth()->user()->username}}
                  <small>Member since {{auth()->user()->created_at->format("d F Y")}}</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                {{-- <a href="#" class="btn btn-default btn-flat">Profile</a> --}}
                <a href="/" class="btn btn-default btn-flat float-right">Logout</a>
              </li>
            </ul>
          </li>
    </ul>
</nav>
