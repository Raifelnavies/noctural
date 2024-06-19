<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
        <div class="sidebar-brand-text">NOCTURAL SYSTEM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo $this->uri->segment(1) == 'dashboard' ? 'active open' : ''; ?>">
        <a class="nav-link" href="http://localhost/noctural/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Main
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item <?php echo $this->uri->segment(1) == 'kelolauser' ? 'active open' : ''; ?>">
        <a class="nav-link" href="http://localhost/noctural/kelolauser">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Kelola User</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?php echo $this->uri->segment(1) == 'kelolatiket' ? 'active open' : ''; ?>">
        <a class="nav-link" href="http://localhost/noctural/kelolatiket">
            <i class="fas fa-fw fa-table"></i>
            <span>Kelola Tiket</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>