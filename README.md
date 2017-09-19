## Average everyday Kičin 

This is the PHP script for my Telegram bot. **avgkicin_bot** ([telegram.me/avgkicin_bot](https://telegram.me/avgkicin_bot)) is the telegram handle, but I still have to implement some questions and answers for the bot. Also, the bot currently only replies in Bosnian.

Available commands:
+ */film* - replies with a random movie from a list of movies scraped from imdb
+ */tvshow* - replies with a random TV show from a list of TV shows scraped from the cucirca page
+ */selam* - replies with "alejkumu selam" (test case and initial command for the bot)
+ Replies with a random sticker if you send him a sticker
+ Answers to basic questions in Bosnian such as "ko si ti?" (who are you), "šta ima?" (what's up) and similar patterns and variations of the questions. If he doesn't understand the question, the reply will be generated from a list of random answers from a text file.



The bot uses the Bot API: [Telegram bot API](https://core.telegram.org/bots/API), and for now it uses the [long polling method](https://core.telegram.org/bots/api#getupdates) for getting the updates instead of a [webhook](https://core.telegram.org/bots/api#setwebhook). For the website scrapers, I've used two simple python scripts for each website.
