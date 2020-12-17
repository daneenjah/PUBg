import requests
import json
import decimal
import sys

# import variables from config.py
from config import platform
from config import key

# pull the name from the command line
user = str(sys.argv[1])
season = str(sys.argv[2])

# put the url together
url = "https://api.pubg.com/shards/" + (platform) + "/players?filter[playerNames]=" + (user)

# header required by PUBg's API
header = {
    "Authorization": "Bearer " + (key) + "",
    "Accept": "application/vnd.api+json"
}

try:
    # lets pull the data from them
    r = requests.get(url, headers=header)

    # lets load it up
    parsed = json.loads(r.text)

    # pull the account id
    for i in parsed["data"]:
            account = (f'{i["id"]}')
except:
    account = "false"

# if the pull for the account id fails, we'll print an error
if (account) == "false":
    print("Too many API calls, please wait.")
    sys.exit()
else:
    try:
        # assemble our url for pulling stats
        url = "https://api.pubg.com/shards/" + (platform) + "/players/" + (account) + "/seasons/" + (season)

        # header required by PUBg's API
        header = {
        "Authorization": "Bearer " + (key) + "",
        "Accept": "application/vnd.api+json"
        }

        # lets pull the data from them
        r = requests.get(url, headers=header)

        # lets load it up
        parsed = json.loads(r.text)

        # open our text file for storage, store season match history in data directory
        f = open('data/' + user + '_' + season + '.json', 'w')

        # write the things
        with (f) as outfile:
            json.dump(parsed, outfile)
        f.close
    except:
        print("Too many API calls, please wait.")
        sys.exit()
