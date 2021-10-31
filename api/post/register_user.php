<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    $level = '..';
    // Includes
    require_once '../../config/conn.php';
    require_once '../../models/User.php';

    // Instantiate DB & connect
    $user = new User($conn);

    // local Variables
    $retVal = "";
    $isValid = true;
    $status = 400;

    // GET POST VARIABLES
    $first_name = isset($_REQUEST['first_name']) ? trim($_REQUEST['first_name']) : null;
    $last_name =  isset($_REQUEST['last_name']) ? trim($_REQUEST['last_name']) : null;
    $phone_no =  isset($_REQUEST['phone_no']) ? trim($_REQUEST['phone_no']) : null;
    $password =  isset($_REQUEST['password']) ? trim($_REQUEST['password']) : null;
    $confirmpassword =  isset($_REQUEST['confirmpassword']) ? trim($_REQUEST['confirmpassword']) : null;

    // Check fields are empty or not
    if($first_name == '' || $last_name == '' || $phone_no == '' || $password == '' || $confirmpassword == ''){
        $isValid = false;
        $retVal = "Please fill all fields.";
    }

    // Check if confirm password matching or not
    if($isValid && ($password != $confirmpassword) ){
        $isValid = false;
        $retVal = "Confirm password not matching.";
    }

    // Check if phone number is valid or not
    if ($isValid) {
        $pattern = "^(09|\+639)\d{9}$^";
        $val = preg_match($pattern, $phone_no); // Outputs 1 when valid
        if($val != 1){
            $isValid = false;
            $retVal = "Invalid Phone number. Please enter 09XXXXXXXXX or +639XXXXXXXXX formats only.";
        }
    }

    // Check if phone number already exists
    if($isValid && $user->is_in_db($phone_no)){
        $isValid = false;
        $retVal = "An account already exists with this phone number.";
    }


            // $first_name
    // $last_name
    // $phone_no


    // // Insert records
    // if($isValid){
    //     $insertSQL = "INSERT INTO items(item_name , item_description, user_id ) values(?,?,?)";
    //     $stmt = $con->prepare($insertSQL);
    //     $stmt->bind_param("sss",$itemName, $itemDescription,$userID);
    //     $stmt->execute();
    //     $stmt->close();
    //     $retVal = "Task created successfully.";
    //     $status = 200;
    // }

    // Response
    $myObj = array(
        'status' => $status,
        'message' => $retVal
    );
    $myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
    echo $myJSON;

    // Close PDO connection
    $conn=null;
?>