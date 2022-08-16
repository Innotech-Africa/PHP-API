<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
header("Access-Control-Allow-Origin: *" );
header("Access-Control-Allow-Headers: *" );


include 'connect.php';


$method = $_SERVER['REQUEST_METHOD'];
switch($method){
    case 'POST':
        $user=json_decode(file_get_contents('php://input'));
        
        $sql="INSERT INTO users (id,name,email,mobile,create_at) VALUES (null,':name',':email',':mobile',':create_at')";
        $stmt = $conn->prepare($sql);
        $create_at=date('y-m-d');
       
        $stmt->bind_param(':name', $user->name);
        $stmt->bind_param(':email', $user->email);
        $stmt->bind_param(':mobile', $user->mobile);
        $stmt->bind_param(':create_at', $user->create_at);

        if($stmt->execute()){
            $response=['status'=> 1, 'message'=>'Created Successfully'];

        }
        else{
            $response=['status'=> 0, 'message'=>'Error'];

        }

        echo json_encode($response);
        break;


}
        


 ?>