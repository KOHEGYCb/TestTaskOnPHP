<?php
session_start();

session_unset();
include './GenerateHTML.php';
homePage();

