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
            self.curs = self.connection.cursor(buffered=True)
        except mysql.connector.Error as err:
            print("Database error: {}".format(err))

    def query(self, sql, args):
        return self.curs.execute(sql, args)
    
    def queryMany(self, sql, args):
        return self.curs.executemany(sql, args)
    
    def getCursor(self):
        return self.curs
    
    def closeCursor(self):
        return self.curs.close()
    
    def commit(self):
        return self.connection.commit()
    
    def countRows(self):
        return self.curs.rowcount

    def getFetchResult(self):
        return self.curs.fetchall()

    def close(self):
        self.connection.close()
    
    def log(self):
        print(1)

