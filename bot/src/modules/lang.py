from modules import config

class Language:
    def __init__(self, mysql, code):
        self.langs = config.langs
        self.mysql = mysql

        if code in self.langs:
            self.lang = code
        else:
            self.lang = "en"
    
    def find(self, user_id):
        sql = "SELECT * FROM bot_langs WHERE user_id=%s AND lang=%s"
        self.mysql.queryMany(sql, [(user_id, self.lang)])

    def setCode(self, code):
        self.lang = code

    def create(self, user_id):
        sql = "INSERT INTO bot_langs (user_id, lang) VALUES (%s, %s)"
        self.mysql.queryMany(sql, [(user_id, self.lang)])
    
    def getLangs(self):
        return self.langs
    
    def getLang(self):
        return self.lang