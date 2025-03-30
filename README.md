# ExcelToMySQLUploader
A PHP script to upload and import Excel (.xlsx, .xls) data into MySQL using PHPExcel. Supports header row skipping, secure MySQLi queries, and works with WAMP/XAMPP. Ideal for bulk data import.

Project Name: ExcelToMySQLUploader
Project Description:
ExcelToMySQLUploader is a simple PHP-based script that allows users to upload Excel (.xlsx and .xls) files and import the data into a MySQL database. It utilizes the PHPExcel library for reading Excel files and processes the data while handling errors gracefully.

Features:
 @ Supports .xlsx and .xls formats
 @ Skips the header row while importing
 @ Uses MySQLi for secure database operations
 @ Handles large datasets efficiently
 @ Works with WAMP/XAMPP servers

Technologies Used:
PHP (5.5+)

PHPExcel Library

MySQL

WAMP/XAMPP

Database & Table Structure:
Database Name: excel_import_db

Table Name: imported_data

Table Schema:

CREATE TABLE imported_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    column1 VARCHAR(255),
    column2 VARCHAR(255),
    column3 VARCHAR(255)
);
