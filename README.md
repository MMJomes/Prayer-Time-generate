
## Documentation for prayer time generation



## Tech Stack

**Client:** Boostrap 4

I choice it cause It's first to create UI without writing pure css.

**Server:** Larvael 7.3, php 7.3,Mysql

I opted for Laravel because it streamlines our development process by offering a variety of essential features that come pre-configured. This includes default authentication mechanisms, scheduling capabilities, Eloquent Models for database interaction, and built-in CSRF protection,etc... many more. These features eliminate the need for manual setup and allow us to focus more on building our application's functionality.


## Run Locally

Clone the project

```bash
  git clone https://link-to-project
```

Go to the project directory

```bash
  cd my-project
```

Install dependencies

```bash
  composer Install
```

Copy enivroment and setup the database

```bash
  cp .env.example .env
```
Database seeding and migration
```bash
  php artisan migrate --seed
```
Run Locally

```bash
 php artisan serve

```

## Features

- Authnication
We have a superadmin who controls the subscribers. The superadmin can log in to manage subscribers, while subscribers can log in to perform actions as required by the coding test documents.





## Future Plan

- Want to scrape video from youtube and play song
- Send Notification to remind prayer time to subscribers via whatsapp,email
- Allow to upload music from superadmin


## Authors

- [@mmjomes](https://www.github.com/mmjomes)
