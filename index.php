<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pomodoro Timer</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <section class="header">
        <nav>
            <a href="index.html">
                <h1>pomodoro</h1>
            </a>
            <div class="nav-links">
                <ul>
                    <li><a href="signin.php">SIGN IN</a></li>
                    <li><a href="signin.php">SIGN UP</a></li>
                </ul>
            </div>
        </nav>
    </section>
    <?php

    if (isset($_SESSION['email'])) {
        displayFull();
    } else {
        displayLimited();
    }

    function displayLimited()
    {
    ?>


        <div class="container pomodoro">

            <div class="pannel">
                <p id="work" onclick="window.location.href='/';">work</p>
                <p id="break" onclick="startbreak()">break</p>
            </div>

            <div class="timer">
                <div class="timerbox">
                    <div class="time">
                        <p id="minutes"></p>
                        <p>:</p>
                        <p id="seconds"></p>
                    </div>
                </div>
            </div>

            <div class="controls">
                <button id="start" onclick="start()" class="btn click">START</button>

                <a id="reset" href="./"><button class="btn click">RESET</button></a>
            </div>
        </div>

    <?php
    }

    function displayFull()
    {
        displayLimited();
    ?>

        <div class="todo">
            <h2>TO DO LIST:</h2>
            <div class="input-field">
                <textarea placeholder="Enter your new todo"></textarea><i class="uil uil-notes note-icon"></i>
            </div>

            <ul class="todoLists"></ul>

            <div class="pending-tasks">
                <span>You have <span class="pending-num"> no </span> tasks pending.</span>
                <button class="clear-button">Clear All</button>
            </div>
        </div>

    <?php
    }

    ?>


    <script src="./script.js"></script>
</body>

</html>