<?php
// /templates/header.php

// Memuat semua data agar bisa diakses di halaman manapun
require_once __DIR__ . '/../data/content.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Ahmad Zeldiyan</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar">
        <a href="index.php" class="nav-brand">J.</a>
        <div class="nav-links">
            <a href="index.php#work">Works</a>
            <a href="articles.php">Articles</a>
            <a href="index.php#contact">Contact</a>
        </div>
    </nav>

    <div class="sidebar">
        <div class="sidebar-icons">
            <a href="#home" class="sidebar-icon active"><div class="icon-dot"></div></a>
            <a href="#skills" class="sidebar-icon"><div class="icon-dot"></div></a>
            <a href="#experience" class="sidebar-icon"><div class="icon-dot"></div></a>
            <a href="#work" class="sidebar-icon"><div class="icon-dot"></div></a>
            <a href="#resume" class="sidebar-icon"><div class="icon-dot"></div></a>
            <a href="#contact" class="sidebar-icon"><div class="icon-dot"></div></a>
            <a href="#services" class="sidebar-icon"><div class="icon-dot"></div></a>
        </div>
    </div>

    <main class="main-content">