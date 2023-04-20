This is a project I started to get back into programming after many years off. It's rough around the edges, but works for what my group wanted to see. The API calls were handled in Python but eventually I moved to PHP, those files are left under the old directory if you want to go that route.

    *config/cleanup.php* - deletes everything in the data directory.

    *config/config.json* - stores the configuration data.

    *config/login.php* - access the config section.

    *config/platform_select.php* - provides information for platform selection.

    *config/player_select.php* - provides information on the number of players selected.

    *config/players.json* - stores the players data.

    *config/protect.php* - secures the pages within the config directory.

    *config/seasons.php* - updates data/seasons.txt, run this when a new season kicks off.

    *config/settings.php* - settings main page.

    *counter.php* - is a simple hit counter.

    *index.php* - displays your team stats.

    *links.php* - provides the buttons for update/pubgreport and pubglookup.

    *overall.php* - displays some overall stats for your team.

    *players.php* - loads the tables with the stats.

    *playerstats.php* - shows stats for an individual player.

    *playerstats_lifetime.php* - shows lifetime stats for an individual player.

    *pull_all.php* - pulls season stats for all players defined in the config.

    *pull_lifestats.php* - pulls lifetime stats.

    *pull_seasonstats.php* - pulls season stats for a player.

    *season_select.php* - provides information for season selection.

    *stats_overall.php* - pulls from all seasons stored locally to display totals.

    *stats.php* - parses the JSON files to pull the stats.

See it in action here: https://www.hootis.net/pubg

PUBg's API documentation: https://documentation.pubg.com/en/index.html

I have opted to keep this JSON file based for now. I haven't had the inclination to add match stats yet, but if I do I'll be migrating to a real database. All player information is kept in /data/<playername> to aid in cleanup.

Clicking on a player's image will open up their stat page.


*Todo:*

    -More secure login.

    -Too many API requests notification to the user interface.

    -Add matches?
