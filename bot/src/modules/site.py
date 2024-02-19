class Site:
    def __init__(self, mysql, id):
        self.mysql = mysql
        self.id = id
    
    def find(self):
        sql = "SELECT * FROM sites WHERE id=%s"
        self.mysql.query(sql, [(self.id)])