## DB.py file
## This file contains a class for working with MySQL

from modules import config
import mysql.connector

class Database:
    
    ## Class constructor
    ## Database connection
    def __init__(self):
        self.hostname = config.hostname
        self.user = config.user
        self.password = config.password
        self.database = config.database

        try:
            self.connection = mysql.connector.connect(user=self.user, password=self.password, 
                                                        host = self.hostname, database = self.database,
                                                        auth_plugin='mysql_native_password')
            self.curs = self.connection.cursor(buffered=True)
        except mysql.connector.Error as err:
            print("Database error: {}".format(err))


    ## Query method (for one variable)
    ## sql - Request text
    ## args - Query variables
    def query(self, sql, args):
        return self.curs.execute(sql, args)
    
    ## Query method (for several variable)
    ## sql - Request text
    ## args - Query variables
    def queryMany(self, sql, args):
        return self.curs.executemany(sql, args)
    
    ## Get cursor
    def getCursor(self):
        return self.curs
    
    ## Close cursor
    def closeCursor(self):
        return self.curs.close()
    
    ## Submit changes
    def commit(self):
        return self.connection.commit()
    
    ## Get amount of rows
    def countRows(self):
        return self.curs.rowcount

    ## Fetch all result
    def getFetchResult(self):
        return self.curs.fetchall()
    
    ## Fetch one result
    def getFetchOneResult(self):
        return self.curs.fetchone()

    ## Close connection
    def close(self):
        self.connection.close()

