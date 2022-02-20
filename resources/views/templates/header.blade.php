<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="../assets/images/faces/face15.jpg" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ session()->get('nom')." ". session()->get('prenom') }}</h5>
                        <span>Visiteur</span>
                    </div>
                </div>
             
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Menu</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="">
                <span class="menu-icon">
        <i class="mdi mdi-speedometer"></i>
      </span>
                <span class="menu-title">Mes Rapports</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
        <i class="mdi mdi-laptop"></i>
      </span>
                <span class="menu-title">Plusieurs</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../pages/ui-features/buttons.html">a</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../pages/ui-features/dropdowns.html">b</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../pages/ui-features/typography.html">c</a></li>
                </ul>
            </div>
        </li>
   
    </ul>
</nav>