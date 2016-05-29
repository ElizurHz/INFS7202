# INFS7202 Assignment 2
## Aim
Inplement a function with PHP and MySQL that you propose in assignment 1.
## Overview
This is the code of the whole site. The details in Login.php is compatible with Amazon EC2. You may adjust it to make sure it works on your environment.
For any detail, visit [this site](http://ec2-52-40-16-205.us-west-2.compute.amazonaws.com/).
## Login System
I only implement the login system. 

### Authority
* Only the administrator accounts can create new posts (and manage all comments and feedbacks, not be implemented).
* Normal user accounts can only make comments and write feedbacks.
* When you sign up, the account automatically becomes a normal user account. And if you want to change it to an administrator account, it must be authorized by the manager of this site and it can only be changed in the database.

### Functionality
* Before logging in, there are only two options: "Sign Up" and "Login"
* After you log in, there are several options: "Change Your Password", "Log Out" and "New Content" only for administrator accounts.
* After you log in, the current user name can be shown.
* Session is used to remember the login status.
