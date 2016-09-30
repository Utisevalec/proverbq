#proverbq

To use, simply:

1. import db file into MySQL DB (default "meterc_vrasalnik")

2. push files to webserver directory

3. edit texts in PHP files to fit your need

4. add some data to "pregovori" table (field "id" and "pregovor")

5. when survey is online, run "vprasalnik_stat.php" (folder /php_cli) as PHP CLI script (iz has continius loop) to gather statistic data in some intervals


Admin acces:

1. create user in "admin" table (password is sha1 hash)

2. acces to admin page via $your_main_proverbq/admin

