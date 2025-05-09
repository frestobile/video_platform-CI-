<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
    // $config['protocol']	    = 'smtp';
    // $config['smtp_port']	= '587';
    // $config['smtp_host']	= 'smtp.sendgrid.net';
    // $config['smtp_user']	= 'apikey';
    // $config['smtp_pass']	= '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';
    // $config['crlf'] = '\r\n';
    // $config['newline'] = '\r\n';

        $config['protocol']  = getenv('EMAIL_PROTOCOL');
        $config['smtp_host'] = getenv('EMAIL_HOST');
        $config['smtp_user'] = getenv('EMAIL_USER');
        $config['smtp_pass'] = getenv('EMAIL_PASS');
        $config['smtp_port'] = getenv('EMAIL_PORT');
        $config['smtp_crypto'] = getenv('EMAIL_CRYPTO');
        $config['crlf'] = '\r\n';
        $config['newline']   = "\r\n";


?>
