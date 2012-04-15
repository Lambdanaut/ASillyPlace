A Silly Place
=======

A small website written for a job interview.


Deploy
======

To run ASillyPlace, clone the site into the root directory of your server and run this SQL code in your database: 

> CREATE DATABASE test;
> 
> CREATE TABLE blog (
> 
>	id INT(11) NOT NULL AUTO_INCREMENT,
> 
>	title VARCHAR(128) NOT NULL,
> 
>	author VARCHAR(128) NOT NULL,
> 
>	slug VARCHAR(128) NOT NULL,
> 
>	text TEXT NOT NULL,
> 
>	PRIMARY KEY (id),
> 
>	KEY slug (slug)
> 
> );
> 
> CREATE TABLE comments (
> 
>	id int(11) NOT NULL AUTO_INCREMENT,
> 
>	author VARCHAR(128) NOT NULL,
> 
>	text TEXT NOT NULL,
>	
>	location VARCHAR(128) NOT NULL,
> 
>	primary key(id)
> 
> );


The server connects to the database under "root" using no password by default. You can edit this in **/application/config/database.py**
