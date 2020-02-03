## THIS IS A PIPELINE FOR DEVELOPING MOC WEBSITE

### INTRODUCTION 
    
This is a mock MOC website on wordpress. After the set up, almost all administration can be done through its web frontend. In order to run wordpress locally we need LAMP stack. (L)INUX, (A)PACHE, (M)ySQL, (P)HP. Follow the steps to get wordpress installed locally 
    
     
 This git repo consists of the theme used to create the website. If you already have wordpress running locally skip to step 5.

###  STEP # 1 INSTALL Apache web server
        
        dnf install httpd -y 
        
Now allow Apache through firewall in case fireall is running on your system. 
        
        firewall-cmd --add-port=80/tcp --permanent
        firewall-cmd --reload
      
Start and enable Apache 
        
        systemctl start httpd
        systemctl enable httpd
        
                                   
### STEP # 2 Install MySQL and run security script

        dnf install mysql mysql-server
        
Start and enable MySQL: 
        
        systemctl enable mariadb
        systemctl start mariadb
        

Now run MySQL security script to set the root password, remove anonymous users, remove test databases,and disable remote login. If root password is already set enter the password instead of enter and do the rest of the steps.


        Enter current password for root (enter for none): Press ENTER
        ...
        Set root password? [Y/n] <y>
        New password: <STRONGPASSWORD>
        Re-enter new password: STRONGPASSWORD
        ...
        Remove anonymous users? [Y/n] <y>.
        ...
        Disallow root login remotely? [Y/n] <y>
        ...
        Remove test database and access to it? [Y/n] <y>
        ...
        Reload privilege tables now? [Y/n] <y>
        
        
### STEP # 3 Installing PHP and Wordpress


         dnf install php php-fpm php-mysqlnd php-gd php-mcrypt php-mbstring
         dnf install wordpress


### STEP# 4 Create database for Wordpress.

Login to MariaDB using the password set in step 2.
        
        mysql -u root -p
        
Then use the following command to create Wordpress database

        create database mocsite;
        
Create Database user with all the privileges granted. After that, reload grant tables and quit.
User=Admin

        grant all privileges on mocsite.* to admin@localhost identified by 'PASSWORD';
        flush privileges;
        quit;

            
### STEP # 5 Configure database for Wordpress website

Here you'll have to go into the wp-config.php file of wordpress to configure the database you made in the above steps.

        vim /etc/wordpress/wp-config.php_
   
        /** The name of the database for WordPress */
        define('DB_NAME', 'database_name_here');   [Change the database name made above. "mocsite"
 
         /** MySQL database username */
         define('DB_USER', 'username_here');        [Change the user name= Admin]
 
         /** MySQL database password */
         define('DB_PASSWORD', 'password_here');    [Change the password]

         /** MySQL hostname */
         define('DB_HOST', 'localhost');            [No change needed]
                   
### STEP # 6 CLONE THIS GITHUB REPO IN YOUR WP-THEME
  
        cd /etc/wordpress/wp-content/themes
        git clone https://github.com/pkhander/MOC-pipeline_
        systemctl restart httpd

### STEP # 7 READY TO GO 

        ON YOUR BROWSER: localhost/wordpress
        
Follow the steps to create a site. You now have a locally running wordpress. 
Choose the theme MOC-pipeline and now you are successfully running the latest MOC-WEBSITE 
