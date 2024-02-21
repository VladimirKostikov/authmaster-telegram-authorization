## Site file
## Class for working with the table of sites
class Site:

    ## Class contructor
    ## MySQL - object of Database class
    ## id - Site's id
    def __init__(self, mysql, id):
        self.mysql = mysql
        self.id = id
    
    ## Find site in Database by id
    def find(self):
        sql = "SELECT * FROM sites WHERE id=%s"
        self.mysql.query(sql, [(self.id)])