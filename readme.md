LocalCMS
====

This is a fork of Sean Ockert's Dine.

A simple Content Management System for single-page-plus websites. 

This extends the original project as it was decided that the newer features are required.
LocalCMS is designed specifically for restaurants and small businesses that want to display a list of their inventory or menu items without a full-blown or bloated stock CMS.

Check out a demo here: [http://otgb.net/localcms]  

Login and edit content: http://otgb.net/localcms/edit/ 
    Username: admin
    Password: admin

- Has editable content sections, dining menu (or inventroy list), image upload
- Shop options like open hours/days and closed dates, address (auto linked to Google Maps)
- Stores everything in an SQLite database at /appdata/lcms.sqlite 
- Works out of the box - change the admin password in credentials.php and you're all set
- The config settings are set in options table and in /localcms/settings.php
- Base theme is fairly minimal and easily customisable
- Patternfly used for admin and customer areas.
- Basic caching for PHP views and CSS/JS
- Added Slideshow and Gallery capabilties
- .

##Installation
===
Install in your web folder.
Change login details in credentials.php.
It is recommended that you use a database to manage your logins and sessions.


##Licence

The MIT License

View ROADMAP.txt for development considerations.





