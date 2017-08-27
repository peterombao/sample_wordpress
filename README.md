# Sample Wordpress

# Installation
1. Clone or Download this repository
2. Export the sample_wordpress.sql into your MySQL.
3. If you want to change your MySQL settings, you can change it in the wp-config.php file.
4. Also you can also change the site url (default: http://localhost/sample_wordpress) of the project by running this MySql queries:
```
UPDATE wp_options SET option_value = replace(option_value, 'http://www.oldurl', 'http://www.newurl') WHERE option_name = 'home' OR option_name = 'siteurl';

UPDATE wp_posts SET guid = replace(guid, 'http://www.oldurl','http://www.newurl');

UPDATE wp_posts SET post_content = replace(post_content, 'http://www.oldurl', 'http://www.newurl');

UPDATE wp_postmeta SET meta_value = replace(meta_value,'http://www.oldurl','http://www.newurl');
```
5. Admin account is: <br />
**email:** admin@admin.com <br />
**password:** password
