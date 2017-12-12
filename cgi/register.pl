#!"c:\xampp\perl\bin\perl.exe"
#!/usr/bin/perl

print "Content-type: text/html\n\n";
print "<!DOCTYPE html>\n";
print "<html>\n\n";

print "<head>\n";
print "\t<title>Online Meeting Planner</title>\n";
print "\t<!-- favicon -->\n";
print "\t<link rel='apple-touch-icon' sizes='180x180' href='/icons/apple-touch-icon.png'>\n";
print "\t<link rel='icon' type='image/png' sizes='32x32' href='/icons/favicon-32x32.png'>\n";
print "\t<link rel='icon' type='image/png' sizes='16x16' href='/icons/favicon-16x16.png'>\n";
print "\t<link rel='manifest' href='/icons/manifest.json'>\n";
print "\t<link rel='mask-icon' href='/icons/safari-pinned-tab.svg' color='#5bbad5'>\n";
print "\t<meta name='msapplication-config' content='/icons/browserconfig.xml'>\n";
print "\t<meta name='theme-color' content='#ffffff'>\n";
print "\t<!-- external stylesheet -->\n";
print "\t<link rel='stylesheet' type='text/css' href='style.css'>\n";
print "\t<!-- jQuery -->\n";
print "\t<script src='jquery-3.2.1.min.js'></script>\n";
print "\t<!-- BootStrap -->\n";
print "\t<meta charset='utf-8'>\n";
print "\t<meta name='viewport' content='width=device-width, initial-scale=1'>\n";
print "\t<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>\n";
print "\t<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>\n";
print "\t<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>\n";
print "</head>\n\n";

print "<body>\n";
print "\t<div class='jumbotron text-center'>\n";
print "\t\t<h1>Online Meeting Planner</h1>\n";
print "\t\t<p>Plan your meeting without hassle!</p>\n";
print "\t</div>\n";
print "\t<div class='container'>\n";
print "\t\t<h4>Create an account:</h4>\n";
print "\t\t<form action='../addUser.php' method='post'>\n";
print "\t\t\t<div class='form-group'>\n";
print "\t\t\t\tUsername:\n";
print "\t\t\t\t<input type='text' class='form-control' placeholder='Enter username' name='username'>\n";
print "\t\t\t</div>\n";
print "\t\t\t<div class='form-group'>\n";
print "\t\t\t\tPassword: <br>\n";
print "\t\t\t\t<input type='password' class='form-control' placeholder='Enter password' name='password' id='password'>\n";
print "\t\t\t</div>\n";
print "\t\t\t<div class='form-group'>\n";
print "\t\t\t\tEmail: <br>\n";
print "\t\t\t\t<input type='text' class='form-control' placeholder='Enter email' name='email'>\n";
print "\t\t\t</div>\n";
print "\t\t\t<button type='submit' class='btn btn-default' value='Submit'>Submit</button>\n";
print "\t\t</form>\n";
print "\t</div>\n";
print "</body>\n\n";

print "</html>";

1;