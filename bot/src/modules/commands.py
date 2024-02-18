from modules import lang as lg
from modules import db
from modules import messages as msg

mysql = db.Database()


def start(bot, message):
    language = lg.Language(mysql, message.from_user.language_code)
    language.find(message.from_user.id)
    if mysql.countRows() == 0:
        if message.from_user.language_code in language.getLangs():
            language.create(message.from_user.id)
        
        else:
            language.setCode('en')
            language.create(message.from_user.id)

    bot.send_message(message.from_user.id, msg.getMessage(language.getLang(), "Text welcome 1"))
    bot.send_message(message.from_user.id, msg.getMessage(language.getLang(), "Text welcome 2"))
    bot.send_message(message.from_user.id, msg.getMessage(language.getLang(), "Text welcome 3"))

    mysql.commit()


def default(bot, message):
    language = lg.Language(mysql, message.from_user.language_code)

    if(len(message.text) == 91):
        bot.send_message(message.from_user.id, msg.getMessage(language.getLang(), "Text success"))
    else:
        bot.send_message(message.from_user.id, msg.getMessage(language.getLang(), "Text error"))