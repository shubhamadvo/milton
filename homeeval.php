<?php //echo "<pre>";print_r($_POST);exit;
if(isset($_POST['email'])){ 
    $to = 'Jayanthi.Sreedhar@Gmail.com

 ';
    //$to = 'bd.advocosoft@gmail.com';
    $subject = 'Milton Real State Enquiry';
    //$message = 'Name: '.$_POST['name'].'Email: '.$_POST['email'].' Number: '.$_POST['number'].'Message:'.$_POST['about'];
    $message = "<html>
            <head>
            <title>Milton Real Estate</title>
            </head>
            <body><table align='center' style = 'border: 1 px; solid #333;' width = '100%'><tr><th>Address</th><th>City</th><th>Style</th><th>Bedrooms</th><th>Bathrooms</th><th>Area</th><th>Age</th><th>Rating</th><th>Features</th><th>Name</th><th>Email:</th><th>Phone No.</th><th>Purpose</th><th>Timeframe</th></tr><tr><td align='center'>".$_POST['Address']."</td><td align='center'>".$_POST['City']."</td><td align='center'>".$_POST['Style']."</td><td align='center'> ".$_POST['Bedrooms']."</td><td align='center'> ".$_POST['Bathrooms']."</td><td align='center'> ".$_POST['Approx_SquareFootage']."</td><td align='center'> ".$_POST['Age']."</td><td align='center'> ".$_POST['Showability']."</td><td align='center'> ".$_POST['SpecialFeatures']."</td><td align='center'>".$_POST['first_name'].' '.$_POST['last_name']."</td><td align='center'>".$_POST['email']."</td><td align='center'>".$_POST['phone']."</td><td align='center'>".$_POST['Purpose_Of_Eval']."</td><td align='center'>".$_POST['Moving_Timeframe']."</td></tr></table></body></html>";
    $from = $_POST['email'];
    $headers1 = "MIME-Version: 1.0" . "\r\n";
        $headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers1 .= 'From: <'.$from.'>' . "\r\n";  
    if(mail($to,$subject,$message,$headers1)){
        echo json_encode(['msg'=>'Your Enquiry Submit Successfully.']);
    }
    header("Location: index.html");
}
?>
