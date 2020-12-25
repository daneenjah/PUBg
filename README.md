This is a project I started to get back into programming after many years off. It's rough around the edges, but works for what my group wanted to see. The API calls were handled in Python but eventually I moved to PHP, those files are left under the old directory if you want to go that route.

*config/config.php* - is where you set your players information.

*config/info.php* - is where you set the platform and enter in your key.

*counter.php* - is a simple hit counter.

*index.php* - displays your team stats.

*links.php* - provides the buttons for update/pubgreport and pubglookup.

*overall.php* - displays some overall stats for your team.

*players.php* - loads the tables with the stats.

*playerstats.php* - shows stats for an individual player.

*pull_seasonstats.php* - pulls season stats for a player.

*seasons.php* - updates data/seasons.txt, run this when a new season kicks off.

*stats.php* - parses the JSON files to pull the stats.

See it in action here: http://kd7nfr.asuscomm.com/pubg/

PUBg's API documentation: https://documentation.pubg.com/en/index.html

I have opted to keep this text file based for now. I haven't had the inclination to add match stats yet, but if I do I'll be migrating to a real database. All player information is kept in /data/<playername> to aid in cleanup.

Clicking on a player's image will open up their stat page.
