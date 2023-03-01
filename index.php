<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

include './admin/connect.php';
include_once 'functions.php';
$url = 'http://localhost/rahulkatre/fiverr/groupsor/';
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$slug = parse_url($actual_link, PHP_URL_PATH);
$slug = explode("/", $slug);
$root = 4;

switch ($slug[$root]) {
    case 'doc':
        $file = $slug[$root + 1] . ".php";
        include_once "admi,/index.php";
        break;
    case 'addgroup':
        $file = "addgroup.php";
        include_once "views/$file";
        break;
    case 'search':
        if (isset($_GET['keyword'])) {
            $groups = get_search_results($pdo,$con, $_GET['keyword']);
            include 'views/find.php';
        }
        break;
    case 'find':

        $groups = get_groups($pdo, $_POST['category'], $_POST['language'], $_POST['country']);
        include 'views/find.php';

        break;
    case 'addreport':

        $response = add_report($pdo, $_POST['group_id'], $_POST['reason'], $_POST['message']);
        if ($response) {
            echo "<script>alert('request submitted');location.replace('/')</script>";
        } else {
            echo "<script>alert('request not submitted');location.replace('/')</script>";
        }

        break;
    case 'invite':
        $link = $slug[$root + 1];
        $group = get_group_by_invite($pdo, $link);
        include 'views/invite.php';
        break;

    case 'join':
        $link = $slug[$root + 1];
        $group = get_group_by_invite($pdo, $link);
        include 'views/join.php';
        break;
    case 'group':
        $filter_by = $slug[$root + 1];
        $value = $slug[$root + 2];
        $groups = [];
        if ($filter_by == 'country') {
            $title = "find whatsapp groups in " . $value;
            $groups = get_group_by_country($pdo, $value);
            include 'views/find.php';
        } elseif ($filter_by == 'category') {
            $title = "find whatsapp groups by category " . $value;
            $groups = get_group_by_category($pdo, $value);
            include 'views/find.php';
        } elseif ($filter_by == 'language') {
            $title = "find whatsapp groups with category " . $value;
            $groups = get_group_by_language($pdo, $value);
            include 'views/find.php';
        } elseif ($filter_by == 'invite') {
        }

        break;
    case '':
        $title = "";
        $groups = get_groups_all($pdo);
        include_once 'views/home.php';
        break;
    default:

        include_once 'views/404.php';
}
