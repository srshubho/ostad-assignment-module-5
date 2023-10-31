<?php
require "auth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Include the Tailwind CSS CDN or link to your local CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .table tr:not(:last-child) {
            margin-bottom: 2rem;
            /* Adjust the margin as needed */
        }
    </style>
</head>

<body class="bg-gray-200 flex flex-col items-center space-y-4  h-screen">
    <?php require "navbar.php"; ?>