<?php

require_once ('bugController.php');


if (isset($_SERVER['SCRIPT_NAME'])) {

    if ($_SERVER['SCRIPT_NAME'] == '/dashboard/works/test/Views/list.php') {

        liste();
    } elseif ($_GET['action'] == 'show') {

        if (isset($_GET['id']) && $_GET['id'] > 0) {

            show();
        } elseif ($_POST['action'] == 'add') {

            if (isset($_POST['envoie']) == '/dashboard/works/test/Views/AjoutBug.php') {

                add();
            } else {

                echo 'Erreur 404';
            }
        }
    }
}