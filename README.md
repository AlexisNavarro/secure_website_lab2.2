# secure_website_lab2.2
## Purpose
The purpose of this website is to be able to test if a Cross Site Request Forgery attack(CSRF) is possible and how can I defend against it. To be able simulate the CSRF attack, I will be using the [malicious folder](https://github.com/AlexisNavarro/secure_website_lab2.2/tree/main/malicious.edu) which contains [add_user.html](https://github.com/AlexisNavarro/secure_website_lab2.2/blob/main/malicious.edu/add_user.html) which is a way to attack the website with CSRF and has the [protected_user.html](https://github.com/AlexisNavarro/secure_website_lab2.2/blob/main/malicious.edu/protected_user.html) which contains a way to defend against CSRF attacks which uses different versions of the website code for both the html forms. 

**NOTE:** the add_user file is using the website code that came from [website_lab2](https://github.com/AlexisNavarro/website_lab2) with no modification while protected_user uses the [lab3_secure_web](https://github.com/AlexisNavarro/secure_website_lab2.2/blob/main/lab3_secure_web/create_adminv2.php) code which uses the new website code with a security modification.

## Protect against CSRF attacks
