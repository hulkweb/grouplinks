<?php $url =  explode(".", explode("/", $_SERVER['REQUEST_URI'])[count(explode("/", $_SERVER['REQUEST_URI'])) - 1])[0];

?>
<aside class="col sidebar" style="background: rgb(86,86,88);
background: linear-gradient(180deg,white -20%, blue 59%,blue 100%);">
    <div class="sidebar-sticky">
        <a href="index.php" class="navbar-brand d-none d-sm-block" data-pjax="data-pjax">
            <img src="http://supremenews.in/img/logo.png" height="40" alt="">
        </a>

        <ul class="nav flex-column" role="navigation">
            <li class="nav-item title">Activity</li>
            <li class="nav-item">
                <a href="index.php" class="nav-link <?php if ($url == 'index' || $url == '') {
                                                        echo 'active';
                                                    } ?>" title="Dashboard" data-pjax>

                    <span>
                        <i class="fas fa-home fa-fw"></i>

                        Home
                    </span>
                </a>
            </li>
            <li class="nav-item">

            <li class="nav-item">
                <a href="groups.php" class="nav-link <?php if ($url == 'groups') {
                                                            echo 'active';
                                                        } ?>" title="groups" data-pjax>

                    <span> <i class="fas fa-file-alt fa-fw"></i> groups </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="languages.php" class="nav-link <?php if ($url == 'languages') {
                                                            echo 'active';
                                                        } ?>" title="languages" data-pjax>

                    <span> <i class="fas fa-file-alt fa-fw"></i> languages </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="categories.php" class="nav-link <?php if ($url == 'categories') {
                                                                echo 'active';
                                                            } ?>" title="categories" data-pjax>

                    <span> <i class="fas fa-file-alt fa-fw"></i> categories </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="countries.php" class="nav-link <?php if ($url == 'countries') {
                                                            echo 'active';
                                                        } ?>" title="countries" data-pjax>

                    <span> <i class="fas fa-file-alt fa-fw"></i> countries </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="reports.php" class="nav-link <?php if ($url == 'reports') {
                                                            echo 'active';
                                                        } ?>" title="reports" data-pjax>

                    <span> <i class="fas fa-file-alt fa-fw"></i> reports </span>
                </a>
            </li>
            <li class="nav-item title">Account</li>
            <li class="nav-item">
                <a href="profile.php" class="nav-link <?php if ($url == 'profile') {
                                                            echo 'active';
                                                        } ?>" title="Profile" data-pjax>

                    <span>
                        <i class="fas fa-user fa-fw"></i>

                        Profile
                    </span>
                </a>
            </li>

        </ul>
    </div>

    <footer></footer>
</aside>