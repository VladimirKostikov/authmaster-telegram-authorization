## Messages file
## Retrieve the message text by name according to the user's language

import json

def getMessage(code, message):
    path = "lang/" + code + ".json"
    with open(path, 'r') as j:
        data = json.loads(j.read())

    return data[message]