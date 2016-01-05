# git-php-deploy

Small php deploy script for your git projects

- Do not forget to change the variables to the correct git repo and paths

- Make sure you have the ssh key and you save it into your github or bitbucket

## SSH KEY

```
#!/bin/bash

# Create .ssh folder for server to use
mkdir /var/www/.ssh
chmod 700 /var/www/.ssh/
chown www-data:www-data /var/www/.ssh

# Generate SSH Key for server to use
su - www-data -c "ssh-keygen -t rsa -b 2048 -N "" –f id_rsa"

```

Also do not forget to change permissions for your deploy script

```
# Fix permissions on deploy scripts
chown www-data:www-data /var/www/domain/public_html/public/deploy.php
chmod 771 /var/www/domain/public_html/public/deploy.php
```

To test the script from the command line (helps in troubleshooting), you must CD into the directory where the script resides:

```
cd /var/www/domain/public_html/public
```

Then run the following:

```
sudo -u www-data php deploy.php
```

Then you can see the verbose script output from the script.

You could do the same from the browser too

http://domain.com/deploy.php
