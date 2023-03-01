<nav class="navbar navbar-light navbar-expand">

    <button id="sidebar-collapse" class="navbar-toggler d-block d-lg-none mr-2" type="button">

        <span class="navbar-toggler-icon"></span>
    </button>


    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-flex align-items-center mr-3">
        </li>

        <li class="nav-item dropdown notifications" id="notification-menu"></li>




        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown">
                <div class="avatar css-avatar"><span><?php echo $admin['name_f'][0]; ?> </span></div>

                <span class="d-none d-lg-block ml-1"><?php echo $admin['name_f']; ?></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="profile.php" class="dropdown-item" data-pjax>Your
                    account</a>
                <a href="logout.php" class="dropdown-item">
                    Sign out
                </a>
            </div>
        </li>



    </ul>
</nav>

<?php function convertDate($date)
{
    date_default_timezone_set("Asia/Calcutta");
    $now = strtotime("now"); // or your date as well
    $your_date = strtotime($date);
    $datediff = $now - $your_date;
    $date = intval($datediff / (60 * 60 * 24));
    if ($date <= 0) {
        $hour = intval($datediff / (60 * 60));
        if ($hour > 0) {
            $date = $hour . " hours ago";
        } else {
            $minute = intval($datediff / 60);
            if ($minute > 0) {
                $date = $minute . " Minutes ago";
            } else {
                $second = $datediff;
                $date = intval($second) . " second ago";
            }
        }
    } elseif ($date >= 1 && $date < 7) {
        $date = intval($datediff / (60 * 60 * 24));
        $date = $date . " days ago";
    } elseif ($date >= 7 && $date < 30) {
        $date = intval($date / 7);
        $date = $date . " week ago";
    } elseif ($date >= 30 && $date < 365) {
        $date = intval($date / 30);
        $date = $date . " month ago";
    } else {
        $date = intval($date / 365);
        $date = $date . " year ago";
    }

    return $date;
} ?>