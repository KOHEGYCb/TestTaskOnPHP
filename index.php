<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" language="javascript" src="js/ajaxSubmit.js"></script>
    </head>
    <body id="results">
        <?php
        session_start();
        include './GenerateHTML.php';
        homePage();
        ?>
    </body>
</html>
