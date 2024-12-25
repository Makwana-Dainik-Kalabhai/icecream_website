<script>
    $(document).ready(() => {
        $("#sidebarToggle").click(() => {
            $("#layoutSidenav_nav").toggle();
        });
    });
</script>


<nav class="sb-topnav navbar navbar-expand bg-danger w-100">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 text-white fs-3" href="index.php">Coldee</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>


    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>

            <ul class="dropdown-menu dropdown-menu-end text-dark" aria-labelledby="navbarDropdown">
                <li><a href="http://localhost/php/mysql/icecream_website/admin/logout.php" class="dropdown-item">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>