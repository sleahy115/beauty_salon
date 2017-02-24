# Beauty Salon

#### Epicodus PHP Week 3 project, 2/23/2017

#### By Sarah Leahy

## Description

Beauty salon application, that allows a user to add and modify stylists and clients.

## Setup/Installation Requirements
* See https://secure.php.net/ for details on installing _PHP_.  Note: PHP is typically already installed on Macs.
* See https://getcomposer.org for details on installing _composer_.
* Clone repository
* Open MAMP- see https://www.mamp.info/en/downloads/ for details on installing _MAMP_
* Open localhost:8888/phpmyadmin in browser
* Go to import tab
* Install beauty_salon.zip.sql to access database structure
* From project root, run > composer install --prefer-source --no-interaction
* From web folder in project, Start PHP > php -S localhost:8000
* In web browser open localhost:8000

## Known Bugs
* No known bugs

## Specifications

| Behavior - Our Program should Handle?| Input         | Output |      
|---| --- | --- |        
|  Accept one stylist name | Debbie | Debbie |
|  Save stylist name to database via save button. | Debbie  |  in db- 1.Debbie|
|  Accept multiple stylists and save them to db and output list. | Debbie, Tom |  in db- 1.Debbie, 2.Tom|
|  Accept client name in relation to stylist. | Client = Sam Smith, stylist_id = 1| stylist = 1, client = Sam Smith|
|  Accept multiple clients per stylist | client = Lisa Miller , client = Melissa Taylor| stylist id= 2, client = Lisa Miller, Melissa Taylor |
|  Get complete stylist list | get all stylists   |Debbie, Tom, Andi |
|  Get complete client list by stylist. | get all clients for Debbie     |Sam Smith |
|  Update stylist name | Debbie   |Deb |
|  Update client name. | Sam Smith  |Sam Jones |
|  Delete stylist. | Deb |  Deleted|
|  Delete client. | Sam Jones |  "deleted"|
|  Delete all clients and stylists. | delete all |  "no clients or stylists"|

## SQL commands
* CREATE DATABASE hair_salon;
* USE hair_salon;
* CREATE TABLE stylists(id serial PRIMARY KEY, stylist_name VARCHAR(255)));
* CREATE TABLE clients(id serial PRIMARY KEY, client_name VARCHAR(255), stylist_id INT);


## Support and contact details
no support

## Technologies Used
* PHP
* Composer
* Silex
* Twig
* HTML
* CSS
* Bootstrap
* Git

## Copyright (c)
* 2017 Sarah Leahy

## License
* MIT
