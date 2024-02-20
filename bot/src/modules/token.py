import requests
import json
from .site import Site

class Token:
    def __init__(self, token, mysql):
        self.token = token
        self.mysql = mysql

    def find(self):
        sql = "SELECT * FROM codes WHERE code=%s AND status=0 LIMIT 1"
        self.mysql.query(sql, [(self.token)])

    def update(self):
        sql = "UPDATE codes SET status=1 WHERE code=%s"
        self.mysql.query(sql, [(self.token)])

    def submit(self, message):
        token_data = self.mysql.getFetchOneResult()
        site = Site(self.mysql, token_data[1])
        site.find()
        site_data = self.mysql.getFetchOneResult()

        data = {
            'user_id': message.from_user.id,
            'username': message.from_user.username,
            'lang': message.from_user.language_code,
            'is_premium': message.from_user.is_premium,
            'ip': token_data[6],
            'site_name': site_data[6],
            'code': token_data[2],
            'code_created': json.dumps(token_data[4], default=str) 
        }

        headers = {"Content-Type": "application/json", 'Accept': 'application/json'}
        response = requests.post(site_data[7], data =json.dumps(data), headers=headers)
        
        if(response.status_code == 200):
            return 1
        else:
            return 0
