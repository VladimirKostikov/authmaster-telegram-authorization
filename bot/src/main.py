import requests
import telebot;
from modules import config
from modules import db
from modules import commands

mysql = db.Database()
bot = telebot.TeleBot(config.token);

switch = {
    "/start": commands.start,
}

@bot.message_handler(content_types=['text'])

def get_text_messages(message):
    switch.get(message.text, commands.default)(bot, message)

bot.polling(none_stop=True, interval=0)