## Main file
## Main Python executable file
## Reads the text entered by the user and calls the corresponding methods

import telebot;
from modules import config
from modules.commands import *

bot = telebot.TeleBot(config.token);

## List of commands
switch = {
    "/start": start,
}

@bot.message_handler(content_types=['text'])

def get_text_messages(message):
    
    ## Call method from list of commands or call default method
    switch.get(message.text, default)(bot, message)

bot.polling(none_stop=True, interval=0)