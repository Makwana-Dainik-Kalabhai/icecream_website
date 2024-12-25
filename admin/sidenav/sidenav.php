<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light p-2" id="sidenavAccordion" style="width: 17vw;">
        <div class="sb-sidenav-menu">

            <div class="nav">
                <div class="sb-sidenav-menu-heading fs-6 text-danger">Core</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>


                <!-- //! Products -->
                <div class="sb-sidenav-menu-heading fs-6 text-danger">Product Section</div>

                <a class="nav-link collapsed" href="#collapseProducts" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-table"></i></div>
                    Products
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="http://localhost/php/mysql/icecream_website/admin/products/add_product.php">Add Product</a>
                    </nav>
                </div>
                <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="http://localhost/php/mysql/icecream_website/admin/products/view_products.php">View Products</a>
                    </nav>
                </div>


                <!-- //! Admin/Staff -->
                <div class="sb-sidenav-menu-heading fs-6 text-danger">Admins/Users</div>

                <a class="nav-link collapsed" href="#collapseAdmins" data-bs-toggle="collapse" data-bs-target="#collapseAdmins" aria-expanded="false" aria-controls="collapseAdmins">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></div>
                    Admins/Staff
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAdmins" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="http://localhost/php/mysql/icecream_website/admin/admins/add_admin.php">Add Admin</a>
                    </nav>
                </div>
                <div class="collapse" id="collapseAdmins" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="http://localhost/php/mysql/icecream_website/admin/admins/view_admins.php">View Admins</a>
                    </nav>
                </div>



                <!-- //! Users -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="http://localhost/php/mysql/icecream_website/admin/users/view_users.php">View Users</a>
                    </nav>
                </div>


                <div class="sb-sidenav-menu-heading fs-6 text-danger">Users</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    View Users
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php
            echo $_SESSION["email"]; ?>
        </div>
    </nav>
</div>