<!DOCTYPE html>
<html>
<head>

</head>
<body>
<h3>Welcome To HRMS.System</h3>
<p>
    Hello {{$senderdata['name']}} ,<br> 

We have Just recived a password reset request for {{$senderdata['email']}} <br>
Following is Your secret Code for reseting password.<br>
Code :&nbsp;{{$senderdata['random']}}
</p>
Thank You.
</body>
</html> 