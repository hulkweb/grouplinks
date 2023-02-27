<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include './connect.php';
include './simple_html_dom.php';

if (isset($_POST['add_group'])) {
    $category_slug = $_POST['category'];
    $language_slug = $_POST['language'];
    $country_slug = $_POST['country'];
    $tags = $_POST['tags'];
    $invite_link = $_POST['link'];
    $details = $_POST['details'];
    $name = '';
    $image = '';
    $link = explode("/", $_POST['link']);
    if ($link < 3) {
        echo "<script>location.replace('/addgroup')</script>";
    } else {
        $link = $link[3];
    }
    $insert = $pdo->prepare("INSERT INTO groups (
category_slug,
language_slug,
country_slug,
tags,
invite_link,
details,
name,
image,
link

) VALUES (
    :category_slug,
:language_slug,
:country_slug,
:tags,
:invite_link,
:details,
:name,
:image,
:link
)");
    $insert->execute([
        'category_slug' => $category_slug,
        'language_slug' => $language_slug,
        'country_slug' => $country_slug,
        'tags' => $tags,
        'invite_link' => $invite_link,
        'details' => $details,
        'name' => $name,
        'image' => $image,
        'link' => $link

    ]);


    if ($insert) {
        echo "<script>alert('uploaded');location.replace('/addgroup')</script>";
    }
}
if (isset($_POST['add_category'])) {
    $name = $_POST['add_category'];
    $category = mysqli_query($con, "INSERT INTO categories(name) VALUES('$name')");
    echo json_encode(['status' => 200]);
    exit();
}

if (isset($_POST['add_country'])) {
    $name = $_POST['add_country'];
    $country = mysqli_query($con, "INSERT INTO countries(name) VALUES('$name')");
    echo json_encode(['status' => 200]);
    exit();
}

if (isset($_POST['add_language'])) {
    $name = $_POST['add_language'];
    $category = mysqli_query($con, "INSERT INTO languages(name) VALUES('$name')");
    echo json_encode(['status' => 200]);
    exit();
}








function get_groups_all($pdo)
{
    $groups = [];
    $build = $pdo->prepare("SELECT * FROM  groups ORDER BY id DESC LIMIT 20");
    $build->execute();
    while ($row = $build->fetch(PDO::FETCH_ASSOC)) {
        $category_slug=$row['category_slug'];
        $row['category']=get_category($pdo,$category_slug);
        $country_slug=$row['country_slug'];
        $row['country']=get_country($pdo,$country_slug);
        $language_slug=$row['language_slug'];
        $row['language']=get_language($pdo,$language_slug);
        $groups[] = $row;
    }
    return $groups;
}

function get_categories($pdo)
{
    $categories = [];
    $build = $pdo->prepare("SELECT * FROM  categories ORDER BY id DESC");
    $build->execute();
    while ($row = $build->fetch(PDO::FETCH_ASSOC)) {
        $categories[] = $row;
    }
    return $categories;
}
function get_countries($pdo)
{
    $countries = [];
    $build = $pdo->prepare("SELECT * FROM  countries ORDER BY id DESC ");
    $build->execute();
    while ($row = $build->fetch(PDO::FETCH_ASSOC)) {
        $countries[] = $row;
    }
    return $countries;
}

function get_language($pdo,$language_slug)
{
    $languages = [];
    $build = $pdo->prepare("SELECT * FROM  languages WHERE slug=:language_slug ORDER BY id DESC ");
    $build->execute(['language_slug'=>$language_slug]);
    while ($row = $build->fetch(PDO::FETCH_ASSOC)) {
        $languages = $row;
    }
    return $languages;
}


function get_category($pdo,$category_slug)
{
    $categories = [];
    $build = $pdo->prepare("SELECT * FROM  categories WHERE slug=:category_slug  ORDER BY id DESC");
    $build->execute(['category_slug'=>$category_slug]);

    while ($row = $build->fetch(PDO::FETCH_ASSOC)) {
        $categories = $row;
    }
    return $categories;
}
function get_country($pdo,$country_slug)
{
    $countries = [];
    $build = $pdo->prepare("SELECT * FROM  countries WHERE slug=:country_slug ORDER BY id DESC ");
    $build->execute(['country_slug'=>$country_slug]);

    while ($row = $build->fetch(PDO::FETCH_ASSOC)) {
        $countries = $row;
    }
    return $countries;
}

function get_languages($pdo)
{
    $languages = [];
    $build = $pdo->prepare("SELECT * FROM  languages ORDER BY id DESC ");
    $build->execute();
    while ($row = $build->fetch(PDO::FETCH_ASSOC)) {
        $languages[] = $row;
    }
    return $languages;
}
function get_search_results($pdo, $keyword)
{
    $blogs = [];
    $build = $pdo->prepare("SELECT * FROM categories WHERE title LIKE '%$keyword%' ");
    $build->execute();
    while ($row = $build->fetch(PDO::FETCH_ASSOC)) {
        $category = get_group_by_category($pdo, $row['id']);
        $row["category"] = $category['title'];
        $blogs[] = $row;
    }
    return $blogs;
}
function get_group_by_category($pdo, $category_name)
{

    $groups = [];
    $build = $pdo->prepare("SELECT * FROM  groups WHERE category_slug=:id");
    $build->execute(['id' => $category_name]);
    while ($row = $build->fetch(PDO::FETCH_ASSOC)) {
        $category_slug=$row['category_slug'];
        $row['category']=get_category($pdo,$category_slug);
        $country_slug=$row['country_slug'];
        $row['country']=get_country($pdo,$country_slug);
        $language_slug=$row['language_slug'];
        $row['language']=get_language($pdo,$language_slug);
        $groups[] = $row;
    }
    return $groups;
}

function get_group_by_language($pdo, $language_name)
{

    $groups = [];
    $build = $pdo->prepare("SELECT * FROM  groups WHERE language_slug=:id");
    $build->execute(['id' => $language_name]);
    while ($row = $build->fetch(PDO::FETCH_ASSOC)) {
        $category_slug=$row['category_slug'];
        $row['category']=get_category($pdo,$category_slug);
        $country_slug=$row['country_slug'];
        $row['country']=get_country($pdo,$country_slug);
        $language_slug=$row['language_slug'];
        $row['language']=get_language($pdo,$language_slug);
        $groups[] = $row;
    }
    return $groups;
}
function get_group_by_country($pdo, $country_name)
{
    $language_id = 0;
    $groups = [];
    $groups = [];
    $build = $pdo->prepare("SELECT * FROM  groups WHERE country_slug=:id");
    $build->execute(['id' => $country_name]);
    while ($row = $build->fetch(PDO::FETCH_ASSOC)) {
        $category_slug=$row['category_slug'];
        $row['category']=get_category($pdo,$category_slug);
        $country_slug=$row['country_slug'];
        $row['country']=get_country($pdo,$country_slug);
        $language_slug=$row['language_slug'];
        $row['language']=get_language($pdo,$language_slug);
        $groups[] = $row;
        
    }
    return $groups;
}

function get_groups($pdo, $category_id, $language_id, $country_id)
{
    $groups = [];
    $build = $pdo->prepare("SELECT * FROM  groups WHERE category_id=:category_id AND language_id=:language_id AND  country_id=:country_id ");
    $build->execute(['category_id' => $category_id, 'language_id' => $language_id, 'country_id' => $country_id]);
    while ($row = $build->fetch(PDO::FETCH_ASSOC)) {
        $category_slug=$row['category_slug'];
        $row['category']=get_category($pdo,$category_slug);
        $country_slug=$row['country_slug'];
        $row['country']=get_country($pdo,$country_slug);
        $language_slug=$row['language_slug'];
        $row['language']=get_language($pdo,$language_slug);
        $groups[] = $row;
    }
    return $groups;
}


function add_slug($pdo, $con)
{
    $build = $pdo->prepare("SELECT * FROM languages ");
    $build->execute();
    while ($row = $build->fetch(PDO::FETCH_ASSOC)) {

        $slug = implode("-", explode(" ", $row['name']));
        $id = $row['id'];
        mysqli_query($con, "UPDATE languages SET slug='$slug' WHERE id=$id");
        $blogs[] = $row;
    }
}



function get_group_info($invite_link){
    $html = file_get_html($invite_link);
    $links = [];
  
        foreach ($html->find("img._9vx6") as  $a) {
            array_push($links, $a->attr['src']);
        }
    
    $html->clear();
    echo $html;
    unset($html);

  
    return $links;
}
// get_group_info('https://chat.whatsapp.com/KmAJ9vHuoYU4WykDqgCxMZ');