# DonationsWebApp-Symfony
## A simple yet powerful WebApp built using (Symfony 4 / Bootstrap 4 / jQuery / MySQL / Stripe JS)

### Summary
This is a WebApp designed to be simple yet powerful. As we know, in this day and age we need to come up with simple solutions for complex problems and that was my approach, in this Donation WebApp, you'll be able to send a donation in just 2 clicks after logging in, you just go to "New Donation" -> "Send Donation" (I'm using a REAL credit card processor btw).

This is also built using Stripe JS (made by Stripe, one of the biggest --if not the biggest-- payment processor in the world!) and I'm even doing test payment transactions to my sandbox account in Stripe!

I'm storing only the last 4 digits of the credit cards entered for security reasons, and it's important to mention that due to the PCI Compliance it is NOT advised to store the CVV, and you guessed it, I'm not storing it!

There is a nice trend going on right now with WebApps focusing on minimalistic design, fun/cute icons, simplicity, high-performance and using powerful frameworks, in this case, I'm using Symfony 4, which is just... Awesome.

I've built a REST API here that expects a get request and returns a JSON object that contains all the donations that have been made until then. I've added an example using an AJAX showing how to call it in order to obtajin the JSON structure from this Webservice.

There is also a log function there, it stores in a .txt the IP and DateTime of all users that try to log-in (I'm storing everyone, people that authenticate correctly and people that don't; in order to keep track of things). 


********************************

### Built with
* PHP 7
* Stripe JS
* Bootstrap 4.3.1
* Symfony 4.5.3
* jQuery 3.3.1
* MySQL 10.1.40-MariaDB
* Apache (Xampp)

********************************
### Installation steps

* [Download this repository](https://github.com/ecortez91/DonationsWebApp-Symfony/tree/alpha) and unzip it in ./htdocs
* Start Apache and MySQL in Xampp
* Go to phpmyadmin and create an empty database named: telusapp
* Import the .sql script (I would suggest using phpmyadmin to upload the script)
* Update .env if needed and set your DB info
* Run Symfony 4 -> *symfony server:start*
* Go to http://127.0.0.1:8000/ (localhost or whatever your local server URL is, virtual hosts rock btw!)
* Enjoy the WebApp! (Working 100% in Firefox)

********************************
### Logins

**Country accounts**

* elsalvador@gov.com.sv / Test123
* donations@gov.us / Test123

**User accounts**

* douglas@telus.com / Test456
* Or you can create as many users as you like

********************************
### Sandbox CC Information

**MasterCard**
* 5555 5555 5555 4444
* 5105 1051 0510 5100

**Visa**
* 4111 1111 1111 1111
* 4012 8888 8888 1881

**JCB**
* 3530 1113 3330 0000
* 3566 0020 2036 0505

**CVC**
* 123 

**ZIP**
* Random numbers are fine.

[Sandbox Credit Cards obtained from here](https://www.paypalobjects.com/en_AU/vhelp/paypalmanager_help/credit_card_numbers.htm)

********************************

### ER Diagram

![alt text](https://github.com/ecortez91/DonationsWebApp-Symfony/blob/alpha/Documentation/Database%20Files/ER%20Diagram/ER-Diagram%20-%20Cortez%20Donations.png)


********************************

### Screenshots

![alt text](https://github.com/ecortez91/DonationsWebApp-Symfony/blob/alpha/Documentation/Screenshots/LoginPage.png)
![alt text](https://github.com/ecortez91/DonationsWebApp-Symfony/blob/alpha/Documentation/Screenshots/RegisterPage.png)
![alt text](https://github.com/ecortez91/DonationsWebApp-Symfony/blob/alpha/Documentation/Screenshots/DonationPage.png)
![alt text](https://github.com/ecortez91/DonationsWebApp-Symfony/blob/alpha/Documentation/Screenshots/MainPage%20-%20CountryUser.png)
![alt text](https://github.com/ecortez91/DonationsWebApp-Symfony/blob/alpha/Documentation/Screenshots/MainPage%20-%20User.png)
![alt text](https://github.com/ecortez91/DonationsWebApp-Symfony/blob/alpha/Documentation/Screenshots/Today's%20log%20button.png)
![alt text](https://github.com/ecortez91/DonationsWebApp-Symfony/blob/alpha/Documentation/Screenshots/Full%20log%20button.png)
![alt text](https://github.com/ecortez91/DonationsWebApp-Symfony/blob/alpha/Documentation/Screenshots/View%20all%20donations%20button.png)


********************************

### Conclusion

This is a great project for anyone looking to learn the MVC design patter or for someone that wants to get familiar with Symfony, strong PHP knowledge is a MUST! Let's remember that this was done in less than 48 hours, I'm pretty happy with the results. Had a lot of fun for sure!


********************************

### What can we do to expand this WebApp?

There's definitely some work to do here if we want to build a robust Donation WebApp, so far we have a nice architecture using the MVC design pattern, and we can keep using in order to keep things organized, here are some thoughts that I have in order to improve and extend this WebApp:

1) **Profile section ->** I was going to do this but ran out of time, it would be nice to have a profile showing allowing members to view/edit their personal information, store their CC, add recurrent payments, also we can show detailed information related to "my donations", we can even add some graphics to see in which categories we donate more, which brings me to the next point.
2) **Categories ->** It would be nice to add categories here, that can be fairly simple, just add a table and link the institutions to the category, that way we can keep track of what kind of foundations or institutions are being helped more or less (by person or everyone).
3) **Newsfeed ->** Using the observer design pattern -> I was thinking about doing like a newsfeed similar to Instagram where you can click any organization or institution that you may have not heard about before and start helping them! While scrolling down you can discover a nice foundation or institution that sounds good for you, then you can start sending donations right away!
4) **Roles ->** Add users with the flag "is_country" activated (aka "Country Users") using the WebApp, but on a second thought I decided that it would be better to just add the "roles" logic into the system. That can be a better route for sure. I provide 2 "Country Users" (that represent a country) as an example but you can turn a "Normal user" into a "Country user" just by setting to "true" the "is_country" field in the database (table = "t_user")
5) **Emails ->** Notifications, email validation & password recovery option.

I hope you enjoy this cool WebApp! :)


-Eduardo Miguel Cortez
