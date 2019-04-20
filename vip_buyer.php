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
            <body><table align='center' style = 'border: 1 px; solid #333;' width = '100%'><tr><th>Price Range</th><th>Bedrooms</th><th>Area</th><th>Additional criteria</th><th>Type Of Properties</th><th>Name</th><th>Email:</th><th>Phone No.</th></tr><tr><td align='center'>".$_POST['MinPrice'].' to '.$_POST['MaxPrice']."</td><td align='center'>".$_POST['Bedrooms']."</td><td align='center'>".$_POST['Area']."</td><td align='center'> ".$_POST['AdditionalCriteria']."</td><td align='center'> ".$_POST['DistressSales'].'<br>'.$_POST['FixerUppers'].'<br>'.$_POST['Foreclosures'].'<br>'.$_POST['Multi-FamilyHomes'].'<br>'.$_POST['Unlisted'].'<br>'.$_POST['NewHomes']."</td><td align='center'>".$_POST['first_name'].' '.$_POST['last_name']."</td><td align='center'>".$_POST['email']."</td><td align='center'>".$_POST['phone']."</td></tr></table></body></html>";
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
