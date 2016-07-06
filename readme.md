LocalCMS
====

This is a fork of Sean Ockert's Dine.

A simple CMS for single page websites. 

This extends the functionality of the original development as it was decided that the newer features were necessary.
Specifically restaurants and small businesses that often want to display a list of their inventory or menu items without a full-blown stock CMS.

Check out a demo here: [http://otgb.net/localcms]  

Login and edit content: http://%yoursite%/edit/ 
    Username: admin
    Password: admin

- Has editable content sections, dining menu (or inventroy list), image upload
- Shop options like open hours/days and closed dates, address (auto linked to Google Maps)
- Stores everything in an SQLite database at /appdata/dinedb.sqlite 
- Works out of the box - change the admin password in credentials.php and you're all set
- The config settings are set in options table and in /localcms/settings.php
- Responsive with Zurb Foundation grid. Base theme is fairly minimal and easily customisable
- Basic caching for PHP views and CSS/JS

##Licence

The MIT License






