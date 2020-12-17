import requests
import json
import decimal
import sys

# import variables from config.py
from config import season
from config import platform
from config import key

# pull the name from the command line
user = str(sys.argv[1])

# get the date to
dater = datetime.datetime.now()
date = dater.strftime("%b %d @ %H:%M:%S")

# put the url together
url = "https://api.pubg.com/shards/" + (platform) + "/players?filter[playerNames]=" + (user)

# header required by PUBg's API
header = {
  "Authorization": "Bearer " + (key) + "",
  "Accept": "application/vnd.api+json"
}

# lets pull the data from them
r = requests.get(url, headers=header)

# lets load it up
parsed = json.loads(r.text)

# pull the account id
for i in parsed["data"]:
        account = (f'{i["id"]}')

# assemble our url for pulling stats
url = "https://api.pubg.com/shards/steam/players/" + (account) + "/seasons/" + (season)

# header required by PUBg's API
header = {
  "Authorization": "Bearer " + (key) + "",
  "Accept": "application/vnd.api+json"
}

# open our text file for storage, store season match history in data directory
f = open('data/%s.json' % user, 'w')

# write that shit
with (f) as outfile:
    json.dump(parsed, outfile)
f.close
