import requests
import json

# import variables from config.py
from config import platform
from config import key

# assemble our url for pulling stats
url = "https://api.pubg.com/shards/" + (platform) + "/seasons/"

# header required by PUBg's API
header = {
  "Authorization": "Bearer " + (key) + "",
  "Accept": "application/vnd.api+json"
}

# lets pull the data from them
r = requests.get(url, headers=header)

# lets load it up
parsed = json.loads(r.text)

# open our text file for storage, store seasons in data directory
f = open('data/seasons.json', 'w')

# write the things
with (f) as outfile:
    json.dump(parsed, outfile)
f.close
