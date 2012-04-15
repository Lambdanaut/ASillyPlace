GigSite
=======

A small website written for a job interview.


Deploy
======

To run ASillyPlace, clone the site into the root directory of your server and run 

> CREATE DATABASE test;
> CREATE TABLE blog (
>	id int(11) NOT NULL AUTO_INCREMENT,
>	title varchar(128) NOT NULL,
>	author varchar(128) NOT NULL,
>	slug varchar(128) NOT NULL,
>	text text NOT NULL,
>	PRIMARY KEY (id),
>	KEY slug (slug)
> );

