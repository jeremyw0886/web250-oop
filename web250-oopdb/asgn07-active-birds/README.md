
# WNC Birds Database - Assignment 07

Part of WEB250 Database Driven Websites course

## Overview

A bird watching database for Western North Carolina (WNC) birds using PHP and MySQL, featuring the Active Record pattern.

## Features

- Bird information display
- Conservation status tracking
- Habitat and feeding details
- Backyard tips for bird watchers

## Database Structure

Birds table includes:

- Common name
- Habitat
- Food
- Conservation status
- Backyard tips

## Directory Structure

asgn07-active-birds/ ├── private/ # Private files │ ├── classes/ # Class files │ └── shared/ # Templates ├── public/ # Public files │ └── css/ # Stylesheets └── sabirds.sql # Database setup

## Setup

1. Copy these files from chain_gang example:
   - db_credentials.php
   - initialize.php
   - database_functions.php
   - functions.php

2. Modify files for birds:
   - Update Bird class for database operations
   - Modify initialize.php for bird-specific setup
   - Update db_credentials.php with database settings

3. Database Setup:
   - Create database using sabirds.sql
   - Remove database creation commands for webhost
   - Import modified SQL on webhost

## Technologies

- PHP
- MySQL
- HTML/CSS
- OOP/Active Record Pattern

## Author

Jeremy Warren
WEB250 Database Driven Websites
November 5th 2024
