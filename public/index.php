<?php
session_start();

//db chargée une seule fois dans le index /!\ probleme majeur
require __DIR__ . '/../config/db.php';

require __DIR__ . '/../core/Router.php';


Router::handle();

