<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top p-0 flex-md-nowrap justify-content-between">
    <div class="container-fluid px-0">
        <ul class="navbar-nav align-items-center">
            <a href="rating.php" class="nav-link"><</a>
            <li class="nav-item">
                <div class="nav-link">
                    <span class="badge badge-pill badge-light">Time: <?php echo (isset($all_time) && $all_time > 1 ? $all_time/3600 : "0"); ?> min</span>
                    <span class="badge badge-pill badge-light">Price: <?php echo (isset($all_price) && $all_price > 1 ? $all_price : "0"); ?> Bath</span>
                </div>
            </li>
            <div class="nav-link">
                <button class="btn btn-light btn-sm" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </ul>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a href="signout.php" class="nav-link px-3">Sign out</a>
            </div>
        </div>
    </div>
</nav>