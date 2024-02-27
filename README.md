# Laravel Application

## :desktop_computer: The project

This app is designed to show the latest game released and allow the user to register and save the games completed to its homepage.
All datas are retrived using IGDB.com APIs and the game informations are stored into a controller that organize the infos in a easier way to display it,
It's also possible to recover the account password with the implementation of laravel service.

## :gear: Instruction

- Copy the repository from my Github
- Use the file named `migration.sql` to create the base structure of your database, it contains users and saved_games table, the last handles the list of games the users want add to their account.
- You need to log into twitch `https://dev.twitch.tv` to obtain the TWITCH_CLIENT_ID and the TWITCH_CLIENT_SECRET in order to make API calls to IGDB.com
- Choose the mail service you want to use in order to let the app to send emails with the password recovery link