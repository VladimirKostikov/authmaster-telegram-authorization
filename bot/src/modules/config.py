import configparser

config = configparser.ConfigParser()
 
config.read('config/db.ini')
 
hostname     =  config.get('db', 'hostname')
database     =  config.get('db', 'database')
user         =  config.get('db', 'user')
password     =  config.get('db', 'password')
