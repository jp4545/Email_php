<?php
$row = 1;
require 'PHPMailer-master/PHPMailerAutoload.php';
if (($handle = fopen("Mail.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
       for ($c=0; $c < $num; $c++) {
            //echo $data[$c] . "<br />\n";
       	echo $c . "<br>";
            $mailto = $data[$c];
            $path1 = "/var/www/html/Email/COS_1.jpeg";
            $path2 = "/var/www/html/Email/COS_2.jpeg";
            echo $mailto;
        $message = "<p>Hola puzzle freaks! The online treasure hunt of ITRIX - 2018's infinity war and 2019's battlegrounds is now back renamed as <b>Chamber of secrets</b> with simpler and better UI and more mind boggling questions. Do participate in this fun filled event and win cash prizes upto Rs.3000!<br><br>The game will be live for 3 days. Each day is independent and one winner will be chosen each day. Clues will be updated periodically.<br><br><br>Don't miss it !<br>The hunt begins on March 6 at 6pm.<br>Brace yourselves and stay tuned.<br>Link : https://cos.itrix.in/<br>Contact : Khishore 9994135107<br><br><br>Regards,<br>ITRIX COS Team<br><br>--</p>";
        $mailSub = "ITRIX's online treasure hunt is back! Win upto Rs.3000";
	    $mail = new PHPMailer();
	    $mail ->IsSmtp();
	    $mail ->SMTPDebug = 0;
	    $mail ->SMTPAuth = true;
	    $mail ->SMTPSecure = 'ssl';
	    $mail ->Host = "smtp.gmail.com";
	    $mail ->Port = 465; // or 587
	    $mail ->IsHTML(true);
	    $mail ->Username = "ista@auist.net";
	    $mail ->Password = "ItrixistA@2k20";
	    $mail ->SetFrom("ista@auist.net");
	    // $mail ->Username = "prakashj1998@gmail.com";
	    // $mail ->Password = "TeenuAjay.123";
	    // $mail ->SetFrom("prakashj1998@gmail.com");

	    $mail ->Subject = $mailSub;
	    $mail ->Body = $message;
	    $mail->addAttachment($path1);
	    $mail->addAttachment($path2);
	    $mail ->AddAddress($mailto);

	    if($mail->Send())
	    {
	        echo "Mail Sent";
	    }
	    else
	    {
	        echo "Mail Not Sent";
	    }


        }
    }
    fclose($handle);
}
?>