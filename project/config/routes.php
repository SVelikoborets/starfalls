<?php
use \Core\Route;

return [
    new Route('/stars/calendar/','stars','calendar'),
    new Route('/stars/info/:id/','stars','showInfo')
];