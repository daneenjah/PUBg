import requests
import json
import decimal
import sys
import datetime

# import variables from config.py
from config import season
from config import platform
from config import key

# pull the name from the command line
user = str(sys.argv[1])

# get the date to
dater= datetime.datetime.now()
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

# lets pull the data from them
r = requests.get(url, headers=header)

# lets load it up
parsed = json.loads(r.text)

# here we pull all the data we want to use and store it as variables for FPP squads
squad_fpp_assists = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["assists"])
squad_fpp_boosts = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["boosts"])
squad_fpp_dBNOs = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["dBNOs"])
squad_fpp_damageDealt = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["damageDealt"])
squad_fpp_headshotKills = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["headshotKills"])
squad_fpp_heals = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["heals"])
squad_fpp_kills = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["kills"])
squad_fpp_longestKill = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["longestKill"])
squad_fpp_longestTimeSurvived = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["longestTimeSurvived"])
squad_fpp_losses = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["losses"])
squad_fpp_maxKillStreaks = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["maxKillStreaks"])
squad_fpp_revives = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["revives"])
squad_fpp_rideDistance = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["rideDistance"])
squad_fpp_roundMostKills = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["roundMostKills"])
squad_fpp_roundsPlayed = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["roundsPlayed"])
squad_fpp_suicides = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["suicides"])
squad_fpp_swimDistance = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["swimDistance"])
squad_fpp_teamKills = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["teamKills"])
squad_fpp_timeSurvived = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["timeSurvived"])
squad_fpp_top10s = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["top10s"])
squad_fpp_vehicleDestroys = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["vehicleDestroys"])
squad_fpp_walkDistance = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["walkDistance"])
squad_fpp_weaponsAcquired = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["weaponsAcquired"])
squad_fpp_wins = str(parsed["data"]["attributes"]["gameModeStats"]["squad-fpp"]["wins"])

# here we pull all the data we want to use and store it as variables for FPP duos
duo_fpp_assists = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["assists"])
duo_fpp_boosts = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["boosts"])
duo_fpp_dBNOs = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["dBNOs"])
duo_fpp_damageDealt = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["damageDealt"])
duo_fpp_headshotKills = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["headshotKills"])
duo_fpp_heals = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["heals"])
duo_fpp_kills = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["kills"])
duo_fpp_longestKill = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["longestKill"])
duo_fpp_longestTimeSurvived = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["longestTimeSurvived"])
duo_fpp_losses = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["losses"])
duo_fpp_maxKillStreaks = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["maxKillStreaks"])
duo_fpp_revives = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["revives"])
duo_fpp_rideDistance = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["rideDistance"])
duo_fpp_roundMostKills = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["roundMostKills"])
duo_fpp_roundsPlayed = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["roundsPlayed"])
duo_fpp_suicides = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["suicides"])
duo_fpp_swimDistance = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["swimDistance"])
duo_fpp_teamKills = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["teamKills"])
duo_fpp_timeSurvived = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["timeSurvived"])
duo_fpp_top10s = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["top10s"])
duo_fpp_vehicleDestroys = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["vehicleDestroys"])
duo_fpp_walkDistance = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["walkDistance"])
duo_fpp_weaponsAcquired = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["weaponsAcquired"])
duo_fpp_wins = str(parsed["data"]["attributes"]["gameModeStats"]["duo-fpp"]["wins"])

# here we pull all the data we want to use and store it as variables for FPP solos
solo_fpp_assists = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["assists"])
solo_fpp_boosts = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["boosts"])
solo_fpp_dBNOs = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["dBNOs"])
solo_fpp_damageDealt = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["damageDealt"])
solo_fpp_headshotKills = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["headshotKills"])
solo_fpp_heals = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["heals"])
solo_fpp_kills = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["kills"])
solo_fpp_longestKill = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["longestKill"])
solo_fpp_longestTimeSurvived = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["longestTimeSurvived"])
solo_fpp_losses = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["losses"])
solo_fpp_maxKillStreaks = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["maxKillStreaks"])
solo_fpp_revives = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["revives"])
solo_fpp_rideDistance = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["rideDistance"])
solo_fpp_roundMostKills = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["roundMostKills"])
solo_fpp_roundsPlayed = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["roundsPlayed"])
solo_fpp_suicides = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["suicides"])
solo_fpp_swimDistance = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["swimDistance"])
solo_fpp_teamKills = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["teamKills"])
solo_fpp_timeSurvived = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["timeSurvived"])
solo_fpp_top10s = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["top10s"])
solo_fpp_vehicleDestroys = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["vehicleDestroys"])
solo_fpp_walkDistance = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["walkDistance"])
solo_fpp_weaponsAcquired = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["weaponsAcquired"])
solo_fpp_wins = str(parsed["data"]["attributes"]["gameModeStats"]["solo-fpp"]["wins"])

# here we pull all the data we want to use and store it as variables for  TPP squads
squad_assists = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["assists"])
squad_boosts = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["boosts"])
squad_dBNOs = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["dBNOs"])
squad_damageDealt = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["damageDealt"])
squad_headshotKills = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["headshotKills"])
squad_heals = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["heals"])
squad_kills = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["kills"])
squad_longestKill = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["longestKill"])
squad_longestTimeSurvived = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["longestTimeSurvived"])
squad_losses = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["losses"])
squad_maxKillStreaks = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["maxKillStreaks"])
squad_revives = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["revives"])
squad_rideDistance = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["rideDistance"])
squad_roundMostKills = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["roundMostKills"])
squad_roundsPlayed = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["roundsPlayed"])
squad_suicides = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["suicides"])
squad_swimDistance = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["swimDistance"])
squad_teamKills = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["teamKills"])
squad_timeSurvived = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["timeSurvived"])
squad_top10s = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["top10s"])
squad_vehicleDestroys = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["vehicleDestroys"])
squad_walkDistance = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["walkDistance"])
squad_weaponsAcquired = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["weaponsAcquired"])
squad_wins = str(parsed["data"]["attributes"]["gameModeStats"]["squad"]["wins"])

# here we pull all the data we want to use and store it as variables for  TPP duos
duo_assists = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["assists"])
duo_boosts = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["boosts"])
duo_dBNOs = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["dBNOs"])
duo_damageDealt = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["damageDealt"])
duo_headshotKills = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["headshotKills"])
duo_heals = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["heals"])
duo_kills = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["kills"])
duo_longestKill = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["longestKill"])
duo_longestTimeSurvived = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["longestTimeSurvived"])
duo_losses = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["losses"])
duo_maxKillStreaks = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["maxKillStreaks"])
duo_revives = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["revives"])
duo_rideDistance = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["rideDistance"])
duo_roundMostKills = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["roundMostKills"])
duo_roundsPlayed = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["roundsPlayed"])
duo_suicides = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["suicides"])
duo_swimDistance = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["swimDistance"])
duo_teamKills = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["teamKills"])
duo_timeSurvived = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["timeSurvived"])
duo_top10s = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["top10s"])
duo_vehicleDestroys = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["vehicleDestroys"])
duo_walkDistance = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["walkDistance"])
duo_weaponsAcquired = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["weaponsAcquired"])
duo_wins = str(parsed["data"]["attributes"]["gameModeStats"]["duo"]["wins"])

# here we pull all the data we want to use and store it as variables for  TPP solos
solo_assists = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["assists"])
solo_boosts = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["boosts"])
solo_dBNOs = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["dBNOs"])
solo_damageDealt = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["damageDealt"])
solo_headshotKills = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["headshotKills"])
solo_heals = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["heals"])
solo_kills = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["kills"])
solo_longestKill = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["longestKill"])
solo_longestTimeSurvived = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["longestTimeSurvived"])
solo_losses = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["losses"])
solo_maxKillStreaks = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["maxKillStreaks"])
solo_revives = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["revives"])
solo_rideDistance = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["rideDistance"])
solo_roundMostKills = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["roundMostKills"])
solo_roundsPlayed = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["roundsPlayed"])
solo_suicides = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["suicides"])
solo_swimDistance = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["swimDistance"])
solo_teamKills = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["teamKills"])
solo_timeSurvived = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["timeSurvived"])
solo_top10s = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["top10s"])
solo_vehicleDestroys = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["vehicleDestroys"])
solo_walkDistance = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["walkDistance"])
solo_weaponsAcquired = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["weaponsAcquired"])
solo_wins = str(parsed["data"]["attributes"]["gameModeStats"]["solo"]["wins"])

# open our text file for storage, store in in config directory
f = open('data/%s_stats.txt' % user, 'w')
# load up our variables for writing, it's a lot and messy
message = (squad_fpp_assists) + '\n' + (squad_fpp_boosts) + '\n' + (squad_fpp_dBNOs) + '\n' \
+ (squad_fpp_damageDealt) + '\n' + (squad_fpp_headshotKills) + '\n' + (squad_fpp_heals) + '\n' \
+ (squad_fpp_kills) + '\n' + (squad_fpp_longestKill) + '\n' + (squad_fpp_longestTimeSurvived) + \
'\n' + (squad_fpp_losses) + '\n' + (squad_fpp_maxKillStreaks) + '\n' + (squad_fpp_revives) + '\n' \
+ (squad_fpp_rideDistance) + '\n' + (squad_fpp_roundMostKills) + '\n' + (squad_fpp_roundsPlayed) + \
'\n' + (squad_fpp_suicides) + '\n' + (squad_fpp_swimDistance) + '\n' + (squad_fpp_teamKills) + \
'\n' + (squad_fpp_timeSurvived) + '\n' + (squad_fpp_top10s) + '\n' + (squad_fpp_vehicleDestroys) + \
'\n' + (squad_fpp_walkDistance) + '\n' + (squad_fpp_weaponsAcquired) + '\n' + (squad_fpp_wins) + '\n'\
+ (duo_fpp_assists) + '\n' + (duo_fpp_boosts) + '\n' + (duo_fpp_dBNOs) + '\n' \
+ (duo_fpp_damageDealt) + '\n' + (duo_fpp_headshotKills) + '\n' + (duo_fpp_heals) + '\n' \
+ (duo_fpp_kills) + '\n' + (duo_fpp_longestKill) + '\n' + (duo_fpp_longestTimeSurvived) + \
'\n' + (duo_fpp_losses) + '\n' + (duo_fpp_maxKillStreaks) + '\n' + (duo_fpp_revives) + '\n' \
+ (duo_fpp_rideDistance) + '\n' + (duo_fpp_roundMostKills) + '\n' + (duo_fpp_roundsPlayed) + \
'\n' + (duo_fpp_suicides) + '\n' + (duo_fpp_swimDistance) + '\n' + (duo_fpp_teamKills) + \
'\n' + (duo_fpp_timeSurvived) + '\n' + (duo_fpp_top10s) + '\n' + (duo_fpp_vehicleDestroys) + \
'\n' + (duo_fpp_walkDistance) + '\n' + (duo_fpp_weaponsAcquired) + '\n' + (duo_fpp_wins) + '\n'\
+ (solo_fpp_assists) + '\n' + (solo_fpp_boosts) + '\n' + (solo_fpp_dBNOs) + '\n' \
+ (solo_fpp_damageDealt) + '\n' + (solo_fpp_headshotKills) + '\n' + (solo_fpp_heals) + '\n' \
+ (solo_fpp_kills) + '\n' + (solo_fpp_longestKill) + '\n' + (solo_fpp_longestTimeSurvived) + \
'\n' + (solo_fpp_losses) + '\n' + (solo_fpp_maxKillStreaks) + '\n' + (solo_fpp_revives) + '\n' \
+ (solo_fpp_rideDistance) + '\n' + (solo_fpp_roundMostKills) + '\n' + (solo_fpp_roundsPlayed) + \
'\n' + (solo_fpp_suicides) + '\n' + (solo_fpp_swimDistance) + '\n' + (solo_fpp_teamKills) + \
'\n' + (solo_fpp_timeSurvived) + '\n' + (solo_fpp_top10s) + '\n' + (solo_fpp_vehicleDestroys) + \
'\n' + (solo_fpp_walkDistance) + '\n' + (solo_fpp_weaponsAcquired) + '\n' + (solo_fpp_wins) + '\n'\
+ (squad_assists) + '\n' + (squad_boosts) + '\n' + (squad_dBNOs) + '\n' \
+ (squad_damageDealt) + '\n' + (squad_headshotKills) + '\n' + (squad_heals) + '\n' \
+ (squad_kills) + '\n' + (squad_longestKill) + '\n' + (squad_longestTimeSurvived) + \
'\n' + (squad_losses) + '\n' + (squad_maxKillStreaks) + '\n' + (squad_revives) + '\n' \
+ (squad_rideDistance) + '\n' + (squad_roundMostKills) + '\n' + (squad_roundsPlayed) + \
'\n' + (squad_suicides) + '\n' + (squad_swimDistance) + '\n' + (squad_teamKills) + \
'\n' + (squad_timeSurvived) + '\n' + (squad_top10s) + '\n' + (squad_vehicleDestroys) + \
'\n' + (squad_walkDistance) + '\n' + (squad_weaponsAcquired) + '\n' + (squad_wins) + '\n'\
+ (duo_assists) + '\n' + (duo_boosts) + '\n' + (duo_dBNOs) + '\n' \
+ (duo_damageDealt) + '\n' + (duo_headshotKills) + '\n' + (duo_heals) + '\n' \
+ (duo_kills) + '\n' + (duo_longestKill) + '\n' + (duo_longestTimeSurvived) + \
'\n' + (duo_losses) + '\n' + (duo_maxKillStreaks) + '\n' + (duo_revives) + '\n' \
+ (duo_rideDistance) + '\n' + (duo_roundMostKills) + '\n' + (duo_roundsPlayed) + \
'\n' + (duo_suicides) + '\n' + (duo_swimDistance) + '\n' + (duo_teamKills) + \
'\n' + (duo_timeSurvived) + '\n' + (duo_top10s) + '\n' + (duo_vehicleDestroys) + \
'\n' + (duo_walkDistance) + '\n' + (duo_weaponsAcquired) + '\n' + (duo_wins) + '\n'\
+ (solo_assists) + '\n' + (solo_boosts) + '\n' + (solo_dBNOs) + '\n' \
+ (solo_damageDealt) + '\n' + (solo_headshotKills) + '\n' + (solo_heals) + '\n' \
+ (solo_kills) + '\n' + (solo_longestKill) + '\n' + (solo_longestTimeSurvived) + \
'\n' + (solo_losses) + '\n' + (solo_maxKillStreaks) + '\n' + (solo_revives) + '\n' \
+ (solo_rideDistance) + '\n' + (solo_roundMostKills) + '\n' + (solo_roundsPlayed) + \
'\n' + (solo_suicides) + '\n' + (solo_swimDistance) + '\n' + (solo_teamKills) + \
'\n' + (solo_timeSurvived) + '\n' + (solo_top10s) + '\n' + (solo_vehicleDestroys) + \
'\n' + (solo_walkDistance) + '\n' + (solo_weaponsAcquired) + '\n' + (solo_wins) + '\n' \
+ (user) + '\n' + (account) + '\n' + (date) + '\n'\


# write that shit
f.write(message)
# close it up, because we like to be tidy
f.close
