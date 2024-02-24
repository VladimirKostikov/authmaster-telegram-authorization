<hr>

<p align="center">
    <img src="https://github.com/VladimirKostikov/authmaster-telegram-authorization/blob/main/docs/logo.jpg?raw=true" width="200">
</p>

<hr>

<h1>About this project</h1>

<p> This project is an intermediary between your web application and Telegram. If you need authorization on your webapp via Telegram, you can use this project absolutely free of charge.</p>

<p>From your web application redirects the user to the authorization page, where the user gets a code and a link to the bot</p>

<p>The user then sends an authorization token to the bot and validation takes place. If the code is correct, your webapp receives the user's JSON data from Telegram via the specified HTTPS NOTIFICATION. If the code is not valid, user will get an error</p>

<p>The last step is yours. It is necessary to process the received data to suit the needs of your project</p>

<p align="center">
    <img src="https://github.com/VladimirKostikov/authmaster-telegram-authorization/blob/main/docs/scheme.png?raw=true">
</p>

<hr>

<h1>Usage</h1>

<p>1. Register an account in the project</p>
<p>2. Add your webapp with all the required URLs in the form</p>
<p>3. Confirm your webapp rights</p>
<p>4. Write a JSON handler in your web application</p>
<p>5. Test authorization</p>

<hr>


<h1>Advantages</h1>



<p>
    You've probably seen sites where you could log in using social networks or email. However, the method of authorization through a Telegram account is quite rare.
</p>

<p>
    Telegram has an official widget that allows you to log in directly through Telegram , however, it has shortcomings. Examples:
</p>

- You need to create your own bot (based on this: 1 site - 1 bot)
- Waste of time setting up the bot configuration (the official documentation has strict recommendations for configuration)
- Inconvenience for the user. Every time he logs in to a new site via Telegram, he will start a new correspondence with a new bot
- The user must enter his phone number each time he logs in for the first time on a new site.
- Strict implementation of the login button - no ability to change the template to suit the style of the site

<p>What does this project offer?</p>

- Single bot for all authorizations. (There is no rule “1 site - 1 bot” as in the official widget)
- No need to spend time setting up the bot. The bot is already configured, all you need is to confirm the rights to the site.
- No need to start a new chat with a bot every time when logging in to a new site. One bot for all connected sites
- Instead of a phone number, the user will only need to copy and paste a special key to authorize the chat with the bot. After - this, authorization will occur
- The login button can be styled as you wish.
- Statistics. You can view the number of authorizations per day, month, year.
- Ability to disable/enable authorization through the settings panel.

<hr>

<h1>FAQ</h1>

<b>How much does it cost to use this project?</b>

<p>The project is completely free of charge</p>

<b>What user data does the project store about the user?</b>

<p>The project stores only the IP address and user_id of Telegram. The IP address is passed to your web application along with the user_id so that you can process the request</p>

<hr>

<h1>Development environment</h1>

- Server version: Apache/2.4.52 (Ubuntu)
- Linux Mint 21 Vanessa
- PHP 8.1.2-1ubuntu2.14
- Python 3.10.12
- Tailwind 3.4.1
- jQuery 3.7.1
- Laravel Framework 10.28.0
- NPM v10.2.4
- python-telegram-bot (library)

<hr>

<h1>Socials</h1>

<p><a href="https://t.me/authmaster">AuthMaster in telegram</a></p>


<hr>

<h1>Media</h1>

<img src="https://github.com/VladimirKostikov/authmaster-telegram-authorization/blob/main/docs/screen1.png?raw=true">

<img src="https://github.com/VladimirKostikov/authmaster-telegram-authorization/blob/main/docs/screen2.png?raw=true">

<img src="https://github.com/VladimirKostikov/authmaster-telegram-authorization/blob/main/docs/screen3.png?raw=true">