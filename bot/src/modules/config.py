## Config file
## This file is a configuration file
## configparser copies the configuration from the ini file from the "config" folder.
## The config stores information about db, langs, telegram token for bot.

import configparser

config = configparser.ConfigParser()
 
config.read('config/db.ini')
 
hostname     =  config.get('db', 'hostname')
database     =  config.get('db', 'database')
user         =  config.get('db', 'user')
password     =  config.get('db', 'password')

config.read('config/tg.ini')
 
token        =  config.get('tg', 'token')
langs        =  config.get('tg', 'langs')
