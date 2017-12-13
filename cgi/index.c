#include <stdio.h>
#include <stdlib.h>
#include <string.h>

char* replace_char(char* str, char find, char replace) {
	char *current_pos = strchr(str,find);
	while (current_pos){
		*current_pos = replace;
		current_pos = strchr(current_pos,find);
	}
	return str;
}

int main(void) {
	char *data = getenv("QUERY_STRING");
	char *name;
	sscanf(data, "name=%s", name);
	replace_char(name, '+', ' ');

	printf("Content-type: text/html\n\n");
	printf("<!DOCTYPE html>\n");
	printf("<html>\n\n");

	printf("<head>\n");
	printf("\t<title>Online Meeting Planner</title>\n");
	printf("\t<!-- favicon -->\n");
	printf("\t<link rel='apple-touch-icon' sizes='180x180' href='../icons/apple-touch-icon.png'>\n");
	printf("\t<link rel='icon' type='image/png' sizes='32x32' href='../icons/favicon-32x32.png'>\n");
	printf("\t<link rel='icon' type='image/png' sizes='16x16' href='../icons/favicon-16x16.png'>\n");
	printf("\t<link rel='manifest' href='../icons/manifest.json'>\n");
	printf("\t<link rel='mask-icon' href='../icons/safari-pinned-tab.svg' color='#5bbad5'>\n");
	printf("\t<meta name='msapplication-config' content='../icons/browserconfig.xml'>\n");
	printf("\t<meta name='theme-color' content='#ffffff'>\n");
	printf("\t<!-- external stylesheet -->\n");
	printf("\t<link rel='stylesheet' type='text/css' href='../style.css'>\n");
	printf("\t<!-- jQuery -->\n");
	printf("\t<script src='../jquery-3.2.1.min.js'></script>\n");
	printf("\t<!-- BootStrap -->\n");
	printf("\t<meta charset='utf-8'>\n");
	printf("\t<meta name='viewport' content='width=device-width, initial-scale=1'>\n");
	printf("\t<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>\n");
	printf("\t<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>\n");
	printf("\t<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>\n");
	printf("</head>\n\n");

	printf("<body>\n");
	printf("\t<div class='jumbotron text-center'>\n");
	printf("\t\t<h1>Online Meeting Planner</h1>\n");
	printf("\t\t<p>Plan your meeting without hassle!</p>\n");
	printf("\t</div>\n");
	printf("\t<div class='container'>\n");
	printf("\t\t<h4>Login</h4>\n");
	printf("\t\t<form action='../login.php' method='post'>\n");
	printf("\t\t\t<div class='form-group'>\n");
	printf("\t\t\t\tUsername:\n");
	printf("\t\t\t\t<input type='text' class='form-control' placeholder='Enter username' name='username'>\n");
	printf("\t\t\t</div>\n");
	printf("\t\t\t<div class='form-group'>\n");
	printf("\t\t\t\tPassword: <br>\n");
	printf("\t\t\t\t<input type='password' class='form-control' placeholder='Enter password' name='password' id='password'/>\n");
	printf("\t\t\t</div>\n");
	printf("\t\t\t<button type='submit' class='btn btn-default' value='Submit'>Submit</button>\n");
	printf("\t\t</form>\n");
	printf("\t\t<br><br>\n");
	printf("\t\tNot already registered?\n");
	printf("\t\t<a href='../createAccount.html'>Create an account!</a>\n");
	printf("\t</div>\n");
	printf("</body>\n\n");

	printf("</html>");
	return 0;
}