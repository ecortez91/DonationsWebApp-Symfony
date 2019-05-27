# DonationsWebApp-Symfony
**A simple yet powerful WebApp built using (Symfony 4 (PHP7) / Bootstrap 4 / jQuery / MySQL / Stripe JS)**

Summary:
This is a WebApp designed to be simple yet powerful, as we know, in this day and age we need to come up with simple solutions for complex problems and that was my approach, in this Donation WebApp, you'll be able to send a donation in just 2 clicks after logging in, you just go to "New Donation" -> "Send Donation".

This is also built using Stripe JS (made by Stripe, one of the biggest --if not the biggest-- payment processor in the world!) and we are even doing test payment transactions to my sandbox account in Stripe!

We are storing only the last 4 digits of the credit cards entered for security reasons, and it's important to mention that due to the PCI Compliance it is NOT advised to store the CVV, and you guessed it, we are not storing it!

There is a nice trend right now with WebApps focusing on minimalistic design, fun and pretty icons, simplicity, high-performance and using powerful frameworks, in this case, we are using Symfony 4, which is just... Awesome.

Also, I've built a REST API that expects a get request and returns objects in JSON format that represent all the donations made. I've added an example using an AJAX call in order to show the JSON information obtained from this Webservice.

There is also a log function there, that stores in a .txt the IP and DateTime of all users after when trying to log-in (doesn't matter if it's successful or not)

Built with:
* PHP 7
* Stripe JS
* Bootstrap 4.3.1
* Symfony 4.5.3
* jQuery 3.3.1
* MySQL 10.1.40-MariaDB

********************************
Installation steps:

* Download this repository from the branch "Alpha"
* Start Apache and MySQL in Xampp
* Go to phpmyadmin and create an empty database named: telusapp
* Import the .sql script (I would suggest using phpmyadmin to upload the script)
* Run Symfony 4: symfony server:start
* Go to http://127.0.0.1:8000/
* Enjoy the WebApp! (Tested in Firefox)

********************************
Country accounts:
* elsalvador@gov.com.sv / Test123
* donations@gov.us / Test123

User accounts:
* eduardo@cortez.solutions / 0000
* You can create one (or as many as you want)!
********************************

**Conclusion**
This is a great project for anyone looking to learn the MVC design patter or for someone that wants to get familiar with Symfony, strong PHP knowledge is a MUST! Let's remember that this was done in less than 48 hours, I'm pretty happy with the result. Had a lot of fun for sure! 

**What can we do to expand this WebApp?**
There's definitely some work to do here if we want to build a robust WebApp, so far we have a nice structure using the MVC design pattern that we can keep using in order to keep things organized, here are some thoughts that I have in order to improve and extend this WebApp:

1) Profile section -> I was going to do this but ran out of time, it would be nice to have a profile showing detailed information related to my donations, we can even add some graphics and see in which categories we donate more, brings me to the next point.
2) Categories -> It would be nice to add categories here, that way we can keep track of what types of foundations or institutions are being helped more or less.
3) Newsfeed using the observer pattern -> I was thinking about doing like a newsfeed similar to Instagram where you can click any organization or institution that you may have not heard about before and start helping them!
4) Add users with the flag "is_country" on so we can add "Country Users" using the web app, but it would be better to just add the "roles" logic.
5) Email notification and validation
6) Password recovery option

I'll be adding more stuff that would be cool to have! 


-Eduardo Miguel Cortez
