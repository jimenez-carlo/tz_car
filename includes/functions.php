<?php
require_once 'db_conn.php';


$_SESSION['conn'] = $conn;

function query($sql)
{
    return mysqli_query($_SESSION['conn'], $sql);
}

function get_inserted_id($sql)
{
    $conn =  $_SESSION['conn'];
    mysqli_query($conn, $sql);
    return mysqli_insert_id($conn);
}

function get_one($sql)
{
    $result = mysqli_query($_SESSION['conn'], $sql);
    while ($row = mysqli_fetch_object($result)) {
        return $row;
    }
}

function get_list($sql)
{
    $result = mysqli_query($_SESSION['conn'], $sql);
    $temp = array();
    while ($row = $result->fetch_assoc()) {
        $temp[] = $row;
    }
    return $temp;
}

function has_result($sql)
{
    return (mysqli_num_rows(query($sql)) > 0) ?  true : false;
}

// function deleteItem($table, $column,  $id)
// {
//     query("update $table set deleted_flag = 1 where $column = $id");
//     echo success_message("Item Deleted Successfully!");
// }

function deleteItem($table, $column,  $id)
{
    query("DELETE FROM $table where $column = $id");
    echo success_message("Item Deleted Successfully!");
}

function createUser($data)
{
    extract($data);
    if (has_result("select * from tbl_users where email = '$email'")) {
        return error_message("Email already in-use");
    }

    if (has_result("select * from tbl_users where username = '$username'")) {
        return error_message("Username already in-use");
    }
    $password = password_hash($password, PASSWORD_BCRYPT);
    query("INSERT INTO `tbl_users` (       
       `access_id`,
       `user_status_id`, 
       `gender_id`, 
       `email`, 
       `username`, 
       `password`, 
       `first_name`, 
       `last_name`, 
       `phone_no`) values(
       '$access_id',
       '1', 
       '$gender_id', 
       '$email', 
       '$username', 
       '$password', 
       '$first_name', 
       '$last_name', 
       '$phone_no'
       )");
    unset($_POST);
    return success_message("User Created Successfully!");
}

function updateUser($data)
{
    extract($data);

    $password = password_hash($pass, PASSWORD_BCRYPT);
    query("UPDATE `users` set 
       `FNAME` = '$fname',
       `LNAME` =  '$lname', 
       `EMAIL` =  '$email', 
       `LIC_NUM` =  '$lic', 
       `PHONE_NUMBER` =  '$ph', 
       `PASSWORD` =  '$password', 
       `GENDER` =  '$gender'
       where `EMAIL` = '$email'
       ");
    // query("UPDATE `tbl_users` set 
    //    `access_id` = '$access_id',
    //    `gender_id` =  '$gender_id', 
    //    `email` =  '$email', 
    //    `username` =  '$username', 
    //    `password` =  '$password', 
    //    `first_name` =  '$first_name', 
    //    `last_name` =  '$last_name', 
    //    `phone_no`= $phone_no
    //    where `user_id` = '$id'
    //    ");
    unset($_POST);
    return success_message("User Updated Successfully!");
}

function createBrand($data)
{
    extract($data);
    if (has_result("select * from tbl_brand where brand = '$brand'")) {
        return error_message("Brand Name Already in-use");
    }

    query("INSERT INTO `tbl_brand` (`brand`) values('$brand')");
    unset($_POST);
    return success_message("Brand Created Successfully!");
}

function updateBrand($data)
{
    extract($data);
    if (has_result("select * from tbl_brand where brand = '$brand' and brand_id <> $id")) {
        return error_message("Brand Name Already in-use");
    }

    query("UPDATE `tbl_brand` set `brand` = '$brand' where `brand_id` = '$id'");
    unset($_POST);
    return success_message("Brand Updated Successfully!");
}

function createCategory($data)
{
    extract($data);
    if (has_result("select * from tbl_car_category where car_category = '$car_category'")) {
        return error_message("Category Name Already in-use");
    }

    query("INSERT INTO `tbl_car_category` (`car_category`) values('$car_category')");
    unset($_POST);
    return success_message("Category Created Successfully!");
}

function updateCategory($data)
{
    extract($data);
    if (has_result("select * from tbl_car_category where car_category = '$car_category' and car_category_id <> $id")) {
        return error_message("Category Name Already in-use");
    }

    query("UPDATE `tbl_car_category` set `car_category` = '$car_category' where `car_category_id` = '$id'");
    unset($_POST);
    return success_message("Category Updated Successfully!");
}

function createLocation($data)
{
    extract($data);
    if (has_result("select * from tbl_pickup_location where location = '$location'")) {
        return error_message("Location Name Already in-use");
    }

    query("INSERT INTO `tbl_pickup_location` (`location`) values('$location')");
    unset($_POST);
    return success_message("Location Created Successfully!");
}

function createFeedback($data)
{
    extract($data);

    query("INSERT INTO `feedback` (`EMAIL`, `COMMENT`) values('" . $_SESSION['user']->EMAIL . "','$comment')");
    unset($_POST);
    return success_message("Feedback Created Successfully!");
}

function updateLocation($data)
{
    extract($data);
    if (has_result("select * from tbl_pickup_location where location = '$location' and pickup_location_id <> $id")) {
        return error_message("Location Name Already in-use");
    }

    query("UPDATE `tbl_pickup_location` set `location` = '$location' where `pickup_location_id` = '$id'");
    unset($_POST);
    return success_message("Location Updated Successfully!");
}

function createCarv2($data)
{
    extract($data);

    $img = upload_pic($image, "../images");
    query("INSERT INTO cars(CAR_NAME,FUEL_TYPE,CAPACITY,PRICE,CAR_IMG,AVAILABLE) values('$carname','$ftype',$capacity,$price,'$img','$available')");

    unset($_POST, $_FILES);
    return success_message("Car Created Successfully!");
}

function createCar($data)
{
    extract($data);

    $img = upload_pic($img, "cars");

    query("INSERT INTO `tbl_cars` 
(
`brand_id`,
`car_category_id`,
`gas_id`,
`car_type_id`,
`seater_id`,
`img`,
`rfid`,
`model`,
`model_year`,
`color`,
`price`) values(
'$brand_id',
'$car_category_id',
'$gas_id',
'$car_type_id',
'$seater_id',
'$img',
'$rfid',
'$model',
'$model_year',
'$color',
'$price')");
    unset($_POST, $_FILES);
    return success_message("Car Created Successfully!");
}

function updateCar($data)
{
    extract($data);
    $img = upload_pic($img, "cars", $default_img);
    query("UPDATE `tbl_cars` set 
`brand_id` = '$brand_id',
`car_category_id` ='$car_category_id',
`gas_id` ='$gas_id',
`car_type_id` ='$car_type_id',
`seater_id` ='$seater_id',
`img` ='$img',
`rfid` ='$rfid',
`model` ='$model',
`model_year` ='$model_year',
`color` ='$color',
`price` ='$price',
     where `car_id` = '$id'");
    unset($_POST);
    return success_message("Car Updated Successfully!");
}


function createBookAdmin($data)
{
    extract($data);

    $img = upload_pic($img, "payment");

    $id = get_inserted_id("INSERT INTO `tbl_booking` 
(
payment_status_id, 
payment_mode_id,
date_start,  
date_end,  
book_status_id, 
client_id, 
pickup_location_id, 
img,
car_id, 
amount) values(
'$payment_status_id',
'$payment_mode_id',
'$start_date',
'$end_date',
'1',
'$client_id',
'$pickup_location_id',
'$img',
'$car_id',
'$amount'
)");

    createBookHistory($id, 1);
    unset($_POST, $_FILES);
    return success_message("Book Created Successfully!");
}




function updateBookAdmin($data)
{
    extract($data);

    $img = upload_pic($img, "payment");

    query("UPDATE `tbl_booking` set
payment_status_id = '$payment_status_id', 
payment_mode_id = '$payment_mode_id',
date_start = '$start_date',  
date_end = '$end_date',  
book_status_id = '$book_status_id', 
client_id = '$client_id', 
pickup_location_id = '$pickup_location_id', 
img = '$img',
car_id = '$car_id', amount = '$amount' where booking_id = $id");

    if ($old_book_status_id != $book_status_id) {
        createBookHistory($id, $book_status_id);
    }
    unset($_POST, $_FILES);
    return success_message("Book Updated Successfully!");
}

function createBook($data)
{
    extract($data);
    $img = upload_pic($image, "../images");

    $price = (int)$price * (int)$duration;
    $id = get_inserted_id("INSERT INTO `booking` 
(
CAR_ID, 
EMAIL,
BOOK_PLACE,  
BOOK_DATE,  
PHONE_NUMBER, 
DURATION, 
DESTINATION, 
RETURN_DATE, 
PRICE,
BOOK_STATUS, 
BOOK_SS) values(
'$car_id',
'$email',
'$book_place',
'$book_date',
'$phone_no',
'$duration',
'$destination',
'$return_date',
'$price',
'$book_status',
'$img'
)");

    query("update cars set AVAILABLE = 'N' where CAR_ID = '$car_id'");

    unset($_POST, $_FILES);
    return success_message("Book Created Successfully!", "/index.php");
}

function createBookHistory($booking_id, $booking_status_id)
{
    query("INSERT INTO `tbl_booking_status_history` (booking_status_id, booking_id) values('$booking_status_id', '$booking_id')");
}
function cancelBook($booking_id)
{
    query("UPDATE tbl_booking set book_status_id = '$booking_id' where booking_id = $booking_id");
    query("INSERT INTO `tbl_booking_status_history` (booking_status_id, booking_id) values(3, '$booking_id')");
    return success_message("Book Cancelled Successfully!");
}

function changeBookStatus($id, $book_status, $car_id = null)
{
    query("UPDATE booking set BOOK_STATUS = '$book_status' where BOOK_ID = $id");
    if (!empty($car_id)) {
        query("update cars AVAILABLE = 'Y' where CAR_ID = " . $car_id);
    }
    // query("INSERT INTO `tbl_booking_status_history` (booking_status_id, booking_id) values(3, '$booking_id')");
    return success_message("Book Changed Status Successfully!");
}

// function createBookAdmin($data)
// {
//     extract($data);

//     $img = upload_pic($img, "payment");

//     query("INSERT INTO `tbl_booking` 
// (
// booking_id,
// payment_status_id, 
// payment_mode_id,
// date_start,  
// date_end,  
// book_status_id, 
// client_id, 
// pickup_location_id, 
// img,
// car_id, 
// amount) values(
// '$booking_id',
// '$payment_status_id',
// '$payment_mode_id',
// '$date_start',
// '$date_end',
// '$book_status_id,'
// '$client_id',
// '$pickup_location_id',
// '$img',
// '$car_id',
// '$amount'
// )");

//     unset($_POST, $_FILES);
//     return success_message("Book Created Successfully!");
// }

function loginUser($data)
{
    extract($data);
    $result = query("SELECT * FROM `users` WHERE ( email = '$username') ");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_object($result)) {
            if (password_verify($password, $row->PASSWORD)) {
                $_SESSION['user'] = $row;
                $_SESSION['user']->access_id = 3;

                echo "<script>location.reload();</script>";
            } else {
                echo error_message("Invalid Username/Email or Password!");
            }
        }
    } else {
        echo error_message("Invalid Username/Email or Password!");
    }
}

function loginAdmin($data)
{
    extract($data);
    $result = query("SELECT * FROM `admin` WHERE ( ADMIN_ID = '$username' AND ADMIN_PASSWORD = '$password') ");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_object($result)) {
            // if (password_verify($password, $row->password)) {
            $_SESSION['user'] = $row;
            $_SESSION['user']->access_id = 1;

            echo "<script>location.reload();</script>";
            // } else {
            //     echo error_message("Invalid Username/Email or Password!");
            // }
        }
    } else {
        echo error_message("Invalid Username/Email or Password!");
    }
}

function upload_pic($file, $folder, $default = "default.png")
{
    $file_name = $default;
    if (isset($file) && !empty($file['name'])) {
        $ext = explode(".", $file["name"]);
        $file_name = 'file_' . date('YmdHis') . "." . end($ext);
        move_uploaded_file($file['tmp_name'], "../img/$folder/" . $file_name);
        $file_name = "$file_name";
    }
    return $file_name;
}


function error_message($message = "Error Something Went Wrong")
{
    return '<script>alert("' . $message . '")</script> ';
    // return '<div class="alert alert-danger" role="alert"> ' . $message . ' </div>';
}

function success_message($message = "Successfull", $redirect = "")
{
    if (!empty($redirect)) {
        return '<script>
        alert("' . $message . '"); 
        window.location.href = "' . $redirect . '";
        </script> ';
    } else {

        return '<script>alert("' . $message . '");</script> ';
    }
    // return '<div class="alert alert-success" role="alert"> ' . $message . ' </div>';
}


function convertDate($date)
{

    // $tmp = date_create($date . " 00:00:00");
    // return $tmp;
    try {
        return DateTime::createFromFormat("F d, Y", $date);
    } catch (\Throwable $th) {
        $tmp =  false;
        return '';
    }
    // if ($tmp) {
    //     return  date_format($tmp, 'F d, Y');
    // }
    // return '';
}
function convertTime($data)
{
    if ($data < 1) {
        return $data * 60 . "mins";
    }
    return $data . " Hours";
}
function generatePassword($length = 8)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_+=<>?';
    $charactersLength = strlen($characters);
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, $charactersLength - 1)];
    }

    return $password;
}


function forgot_password($email)
{

    $password = generatePassword(8);
    $has_password = password_hash($password, PASSWORD_BCRYPT);

    query("update users set PASSWORD = '$has_password' where EMAIL = '$email'");
    $subject = "Your Temporary Password";

    $message = "
    <html>
    <head>
        <title>Your Temporary Password</title>
    </head>
    <body>
        <p>Hi,</p>
        <p>We have generated a temporary password for your account:</p>
        <p><strong>" . $password . "</strong></p>
        <p>Please use this password to log in and change your password as soon as possible.</p>
        <p>If you did not request this, please contact support immediately.</p>
        <p>Thanks,</p>
    </body>
    </html>";

    $headers = "From: no-reply@Fegankoh.a2hosted.com\r\n";
    $headers .= "Reply-To: tzcarrental@gmail.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send email
    if (mail($email, $subject, $message, $headers)) {
        return success_message("New password Sent to Email!");
    } else {
        return error_message("Something went wrong!");
    }
}
