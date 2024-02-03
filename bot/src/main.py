from modules import config
from modules import db
import requests
import telebot;

bot = telebot.TeleBot('%ваш токен%');

def main():
    obj = db.Database()
    obj.log()