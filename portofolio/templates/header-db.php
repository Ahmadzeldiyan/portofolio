<?php
// /templates/header-db.php

// Kita tidak lagi memuat data/content.php karena semua dari database
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
        <a href="index.php" class="nav-brand">Portofolio Iyan</a>
        
        <div class="nav-links">
            <a href="index.php#work">Works</a>
            <a href="articles.php">Articles</a>
            <a href="index.php#contact">Contact</a>
            <a href="admin/" style="color: #4CAF50; font-weight: bold;">Admin Panel</a>
        </div>
    </nav>
    <div class="sidebar">
        <div class="sidebar-icons">
            <a href="index.php#home" class="sidebar-icon active"><div class="icon-dot"></div></a>
            <a href="index.php#skills" class="sidebar-icon"><div class="icon-dot"></div></a>
            <a href="index.php#experience" class="sidebar-icon"><div class="icon-dot"></div></a>
            <a href="index.php#work" class="sidebar-icon"><div class="icon-dot"></div></a>
            <a href="index.php#contact" class="sidebar-icon"><div class="icon-dot"></div></a>
            <a href="index.php#services" class="sidebar-icon"><div class="icon-dot"></div></a>
        </div>
    </div>

    <main class="main-content">