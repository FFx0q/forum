#!/bin/bash

# Update Composer
cd api
composer self-update

# Create database
mysql -e 'CREATE DATABASE IF NOT EXISTS phpboard;'