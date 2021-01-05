# Plate recognition with arduino
## Introduction
An embedded-system based project for university course to apply what we have learned so far. Using arduino, camera from smartphone and running detection algorithm on laptop.

First, control car model (module wifi ESP8266) to go into car parking area. An ultrasonic sensor HC-SR04 measures distance to activate IP webcam on smartphone. After saving picture, python script runs the algorithm function and returns the plate.
Checking if plate in local sqlite database, if yes retrieive infomation relate to that plate and insert into mysql database to display on localhost website and at the same time send 'true' with plate to arduino through Serial port to display on LCD screen and open barrier.Then, control car to go through door. 
If not, send 'false' to arduino to display LCD differently and not open barrier.
## Technologies
* PHP
* Basic HTML, CSS
* Anaconda 
* C++ for Arduino programming
* Xampp with Apache, MySQL
* SQLite
## Sources
This project is insprired by MiAI article https://www.miai.vn/2019/12/05/nhan-dien-bien-so-xe-chuong-5-nhan-dien-bien-so-xe-bang-wpod-va-svm/ .

Based on repo: https://github.com/thangnch/MiAI_LP_Detection_SVM and modify for using
