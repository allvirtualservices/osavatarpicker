<?php

function debug($variable)
{
	echo '<pre>' . print_r($variable, true) . '</pre>';
}

function generate_uuid()
{
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
    mt_rand(0, 0x0fff) | 0x4000,
    mt_rand(0, 0x3fff) | 0x8000,
    mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
}

function one_random_image_file()
{
    $files = glob('../images/*.jpg');
    shuffle($files);
    return realpath($files[0]);
}
// USAGE :
// $image_to_read = one_random_image_file();

function getImageByName($region_name)
{
    // $upload_images_dir = "images";
    foreach (glob("images/*.jpg") as $filename)
    {
        $filename = explode('/', $filename);
        $filename = $filename[1];
        $filename = explode('.', $filename);
        $filename = $filename[0];
        // echo $filename." / "filesize($filename). " / ".$region_name."<br />\n";
        if ($filename === $region_name)
            return "images/".$filename.".jpg"; 
    }
    return "images/default.jpg"; 
}


// -1 or 0 All Categories
// 1 Official location
// 3 Arts and culture
// 4 Business
// 5 Educationnal
// 6 Gaming
// 7 Hangout
// 8 Newcomer friendly
// 9 Parks and Nature
// 10 Residential
// 11 Shopping
// 13 Other
// 14 Rental
// $categories = array('base', 'category', 'subcategory', 'item');
function getDefaultDestinationCategories()
{
    $categories = [
        -1 => "All Categories",
        0 => "All Categories",
        1 => "Official location",
        3 => "Arts and culture",
        4 => "Business",
        5 => "Educationnal",
        6 => "Gaming",
        7 => "Hangout",
        8 => "Newcomer friendly",
        9 => "Parks and Nature",
        10 => "Residential",
        11 => "Shopping",
        13 => "Other",
        14 => "Rental"
    ];
    return $categories;
}

function getCategorieByNumber($number)
{
    if ($number == -1 OR $number == 0) return "All Categories";
    else if ($number == 1) return "Official location";
    else if ($number == 3) return "Arts and culture";
    else if ($number == 4) return "Business";
    else if ($number == 5) return "Educationnal";
    else if ($number == 6) return "Gaming";
    else if ($number == 7) return "Hangout";
    else if ($number == 8) return "Newcomer friendly";
    else if ($number == 9) return "Parks and Nature";
    else if ($number == 10) return "Residential";
    else if ($number == 11) return "Shopping";
    else if ($number == 13) return "Other";
    else if ($number == 14) return "Rental";
    return "All Categories";
}

// TO DO, FIX
function getCategorieByName($name)
{
    if ($name == "All Categories") return 0;
    else if ($name == "Official location") return 1;
    else if ($name == "Arts and culture") return 3;
    else if ($name == "Business") return 4;
    else if ($name == "Educationnal") return 5;
    else if ($name == "Gaming") return 6;
    else if ($name == "Hangout") return 7;
    else if ($name == "Newcomer friendly") return 8;
    else if ($name == "Parks and Nature") return 9;
    else if ($name == "Residential") return 10;
    else if ($name == "Shopping") return 11;
    else if ($name == "Other") return 13;
    else if ($name == "Rental") return 14;
    return -1;
}

?>