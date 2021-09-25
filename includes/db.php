<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'myblog3') or die("Database is not connected !");
