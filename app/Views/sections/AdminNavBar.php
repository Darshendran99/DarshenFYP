<div class="container-fluid position-relative d-flex p-0">

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="/AdminPage" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Stellar PC</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                  <br><br><br>

                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $adminData["staffName"]; ?></h6>
                        <span>Admin</span>

                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/AdminPage" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <div class="nav-item dropdown">

                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-table me-2"></i>View Tables</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href='/UsersTable' class="dropdown-item">User's Table</a>
                            <a href="/ProductsTable" class="dropdown-item">Product's Table</a>
                            <a href="/PromotionsTable" class="dropdown-item">Promotion's Table</a>
                            <a href="/ComponentsTable" class="dropdown-item">BuildYourPC's Table</a>
                            <a href="/RewardsTable" class="dropdown-item">Reward's Table</a>
                            <a href="/PaymentsTable" class="dropdown-item">Payment's Table</a>
                            <a href="/OrdersTable" class="dropdown-item">Order's Table</a>
                            <a href="/CPUsTable" class="dropdown-item">CPU's Table</a>
                            <a href="/GPUsTable" class="dropdown-item">GPU's Table</a>
                            <a href="/AdminsTable" class="dropdown-item">Admin's Table</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Add New data</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/AddUser" class="dropdown-item">Add User</a>
                            <a href="/AddProduct" class="dropdown-item">Add Product</a>
                            <a href="/AddPromotion" class="dropdown-item">Add Promotion</a>
                            <a href="/AddComponent" class="dropdown-item">Add BuildYourPC</a>
                            <a href="/AddReward" class="dropdown-item">Add Reward</a>
                            <a href="/AddOrder" class="dropdown-item">Add Order</a>
                            <a href="/AddCPU" class="dropdown-item">Add CPU</a>
                            <a href="/AddGPU" class="dropdown-item">Add GPU</a>
                            <a href="/AddAdmin" class="dropdown-item">Add Admin</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex"><?php echo $adminData["staffName"]; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="/Adminlogout" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
