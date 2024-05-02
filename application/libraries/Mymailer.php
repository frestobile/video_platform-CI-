<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\POP3;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ( dirname(__DIR__, 2).'/vendor/autoload.php');

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';


class Mymailer extends PHPMailer
{
    function __construct()
    {
        parent::__construct();
        $CI= & get_instance();
    }
}