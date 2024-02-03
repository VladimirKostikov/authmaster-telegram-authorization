from modules import config
import mysql.connector

class Database:
    def __init__(self):
        self.hostname = config.hostname
        self.user = config.user
        self.password = config.password
        self.database = config.database

        try:
            self.connection = mysql.connector.connect(user=self.user, password=self.password, 
                                                        host = self.hostname, database = self.database,
                                                        auth_plugin='mysql_native_password')
        except mysql.connector.Error as err:
            print("Database error: {}".format(err))
    
    def close():
        self.connection.close()
    
    def log():
        print(1)

