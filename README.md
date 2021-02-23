# php-mvc-pattern-basics


<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>


## About The Project

In this project I create a music website where you can see the information of songs and artists.

The website is capable of displaying the name, pictures, some information, nad some songs of an artist and the name, album, cover and the artists of a song. You can also play the song, edit any information, delete a song or artist and add new songs or artists.

TO do that is using a local database with mySql.

The information in the database is the following:

1. Songs
In this table you will obtain information about the songs:
  song_id
  song_name
  cover
  src (where the song is located)
  album

1. Artists
In this table you will obtain information about the artists:
  artist_id
  artist_name
  picture
  info

3. song_artist
In this table you will obtain the relation between songs and artists:
  song_id
  artist_id


## Built With

This section should list any major frameworks that you built your project using. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.

* [CSS](https://css-tricks.com)
* [JS](https://javascript.com)
* [PHP](https://php.net)
* [phpMyAdmin](https://ww.phpmyadmin.net)
* [MySQL](https://www.mysql.com/)


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.


### Prerequisites

You don't need to install anything


### Installing

To intalling and use this project you will need:

1. Clone the repo
   ```sh
   git clone https://github.com/janpc/php-mvc-pattern-basics
   ```
2. Create the database with the name of php-mvc-pattern-basics and create the tabels following the resources/database.sql
3. If the database is not created localy or the user is diferent of root change theme in modles/databaseConection.php


## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request


## Contact

**Andrés Villanueva** - [janpc](https://github.com/janpc)
