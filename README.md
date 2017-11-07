# Drupal 8 setup for Interview
### Description
Drupal 8 composer based local project that uses Lando for fast local development. This base project is created for the purpouse of having a Drupal 8 setup for an Interview.

### Requirements
For running this project the following is needed:
1. [Composer](https://getcomposer.org/download/)
2. [Docker](https://www.docker.com/)
3. [lando](https://github.com/lando/lando)

### Run
For running the project in your local environment follow the steps:
```bash
# Root Folder
cd <d8-deployment-interview> 

# Composer install
composer install

# Start Lando
lando start

# If fresh install
# Password can be changed to any desired password
# User by default will be admin
cd <d8-deployment-interview>/web

lando drush si --db-url=mysql://drupal8:drupal8@database:3306/drupal8 --account-pass=12345 -y 

# If Not a fresh install, follow the instructions bellow:
#
# 1. Import DB, the credentials are:
#       USER: drupal8
#       PASSWORD: drupal8
#       DATABASE: drupal8
#       HOST: localhost
#       PORT: 3307
#
# 2. Edit the <d8-deployment-interview>/web/sites/default/settings.php to contain the DB Connection Info. Follow the documentation on the settings.php file on how to set it up.
#
# 3. If configuration from a previous Drupal Environment exist, the drupal 8 composer project sets the config sync directory to <d8-deployment-interview>/web/sites/config/sync, just drop the configuration there and import it with Drush or by the admin UI in /admin/config/development/configuration
```

### Environment
 - Drupal 8: Latest
 - Nginx (Can be easily switched to apache): Stable
 - MariaDB: Latest
 - Tools:
    - Drush: Stable
    - Drupal Console: Stable
    - XDebug: Stable

### Reasoning on why choosing Lando
1. Simple to get started which removes a lot of complexity for fast local development and prototyping.
2. Fast local development
3. Easy to integrate multiple services in just one project.
4. Docker Wrapper, can be extendend with custom Docker
5. Support for a variaty of technologoly
6. Node.js based project, which makes it easily to extend.
7. Can be used in any OS and the end result will be the same.