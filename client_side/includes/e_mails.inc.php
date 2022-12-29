<?php
session_start();
if(isset($_POST['submit_e_mail'])){
    $e_mail = $_POST['e_mail'];

    require_once('../classes/dbhc.class.php');
    include('../classes/e_mails.class.php');
    include('../classes/e_mails-contr.class.php');
    
    $newE_mail = new E_mailsContr($e_mail);
    $newE_mail->addE_mail();

    header('Location: ../pages/index.php?e_mailAddedSuccefuly');
}