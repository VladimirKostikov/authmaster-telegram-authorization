import json

def getMessage(code, message):
    path = "lang/" + code + ".json"
    with open(path, 'r') as j:
        data = json.loads(j.read())

    return data[message]