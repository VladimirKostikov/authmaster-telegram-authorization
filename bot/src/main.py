import requests
import telebot;
import modules
from modules import config
from modules.commands import *

bot = telebot.TeleBot(config.token);

switch = {
    "/start": start,
}

@bot.message_handler(content_types=['text'])

def get_text_messages(message):
    switch.get(message.text, default)(bot, message)

bot.polling(none_stop=True, interval=0)