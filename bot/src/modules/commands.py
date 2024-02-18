import json
from modules import lang as lg
from modules import db

mysql = db.Database()


def start(bot, message):
    language = lg.Language(message.from_user.language_code, mysql)
    language.find(message.from_user.id)
    if mysql.countRows() == 0:
        if message.from_user.language_code in language.getLangs():
            language.create(message.from_user.id)
        
        else:
            language.setCode('en')
            language.create(message.from_user.id)

    else:
        bot.send_message(message.from_user.id, message.from_user.language_code)
    
    mysql.commit()


def default(bot, message):
    bot.send_message(message.from_user.id, "Error");