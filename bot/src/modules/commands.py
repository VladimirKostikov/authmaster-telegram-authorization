## Commands.py
## This file contains methods that are called with chatbot commands
## At the moment two methods are implemented: start, default (any message)
## The methods are called using a dictionary in the main file   


## Import modules
## Lang - language module.
## DB - MySQL module.
## Token - Token management for authorization

from modules.lang import Language
from modules.db import Database
from modules.token import Token
from modules.messages import getMessage



## DB Initialization
## The class object will be used in future method arguments

mysql = Database()


## Method start
## Argument "bot": Telegram bot library class object
## Argument "message": This object represents a message.
def start(bot, message):

    ## Language installation
    ## Search for a record in the database where the language is set for the user's id
    language = Language(mysql, message.from_user.language_code)
    language.find(message.from_user.id)

    ## If the record doesnt exists
    if mysql.countRows() == 0:
        
        ## Set the user to the language that is set in their Telegram account settings, if their language exists in the "lang" folder
        if message.from_user.language_code in language.getLangs():
            language.create(message.from_user.id)


        ## Else set default English language
        else:
            language.setCode('en')
            language.create(message.from_user.id)


    ## Send informations about bot to user.
    bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text welcome 1"))
    bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text welcome 2"))
    bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text welcome 3"))

    ## Submit changes to MySQL after settings with language
    mysql.commit()


## Method default
## Argument "bot": Telegram bot library class object
## Argument "message": This object represents a message.   
def default(bot, message):

    ## Set language for messages
    language = Language(mysql, message.from_user.language_code)


    ## If message is authorization token
    if(len(message.text) == 91):

        ## Create token object
        ## Arguments for constructor:
        ## message.text - Text of this message
        ## mysql - object of Database class
        token = Token(message.text, mysql)


        ## Search for active token in DB
        token.find()
        

        ## If token exist, then submit authorization and send JSON to Notification URL
        if mysql.countRows() != 0:

            ## If token exist, then submit authorization and send JSON to Notification URL
            if token.submit(message) == 1:
                bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text success"))

                ## Turn off token
                token.update()
            else:
                bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text error Request"))
                
        else:
            bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text error"))

        mysql.commit()
    
    ## Send error
    else:
        bot.send_message(message.from_user.id, getMessage(language.getLang(), "Text error"))