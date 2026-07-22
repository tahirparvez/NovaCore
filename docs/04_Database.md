# NovaCore Database Layer

Version:
v0.2.0


## Overview

NovaCore database layer provides:

- Environment based configuration
- PDO connection management
- Database service provider
- Database facade


## Architecture


Application

↓

DatabaseServiceProvider

↓

DatabaseManager

↓

Connection

↓

PDO

↓

MySQL



## Configuration

Database settings are stored in:

.env


Example:

DB_DRIVER=mysql
DB_HOST=127.0.0.1
DB_DATABASE=novacore_school
DB_USERNAME=root


## Usage


DB::connection();


returns:

PDO instance



## Future Development

v0.2.1

Query Builder


v0.2.2

ORM Models


v0.2.3

Migration System
