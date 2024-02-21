"""
    Commands.py
    This file contains methods that are called with chatbot commands
    At the moment two methods are implemented: start, default (any message)
"""

"""
    Import modules
    Lang - language module.
    DB - MySQL module.
    Token - Token management for authorization
"""
from modules.lang import Language
from modules.db import Database
from modules.token import Token
from modules.messages import getMessage

# DB Initialization
# The class object will be used in future method arguments
mysql = Database()


def start(bot, message):
    language = Language(mysql, message.from_user.language_code)
    language.find(message.from_user.id)
    if mysql.countRows() == 0:
        if message.from_user.language_code in language.getLangs():
            language.create(message.from_user.id)
        
        else:
            language.setCode('en')
            language.create(message.from_user.id)

    bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text welcome 1"))
    bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text welcome 2"))
    bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text welcome 3"))

    mysql.commit()


def default(bot, message):
    language = Language(mysql, message.from_user.language_code)

    if(len(message.text) == 91):
        token = Token(message.text, mysql)
        token.find()
        
        if mysql.countRows() != 0:
            if token.submit(message) == 1:
                bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text success"))
                token.update()
            else:
                bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text error Request"))
                
        else:
            bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text error"))

        mysql.commit()
    else:
        bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text error"))