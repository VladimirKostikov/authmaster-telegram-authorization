## Lang file
## Language control in Telegram bot

from modules import config

class Language:

    ## Class constructor
    ## mysql - Object of Database class
    ## code - Language code
    def __init__(self, mysql, code):
        self.langs = config.langs
        self.mysql = mysql

        ## If config has this language code, then set. Else set default language as en
        if code in self.langs:
            self.lang = code
        else:
            self.lang = "en"
    
    ## Find language for user by id
    ## user_id - User's id
    def find(self, user_id):
        sql = "SELECT * FROM bot_langs WHERE user_id=%s AND lang=%s"
        self.mysql.queryMany(sql, [(user_id, self.lang)])

    ## Set lang code 
    def setCode(self, code):
        self.lang = code

    ## Create a record in DB to set language to the user
    def create(self, user_id):
        sql = "INSERT INTO bot_langs (user_id, lang) VALUES (%s, %s)"
        self.mysql.queryMany(sql, [(user_id, self.lang)])
    
    ## Get all available languages
    def getLangs(self):
        return self.langs
    
    ## Get current user's lang
    def getLang(self):
        return self.lang