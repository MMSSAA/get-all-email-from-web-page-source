<?php
    require 'FetchEmail.php';

    $em=new FetchEmail("http://www.Example.com");
    $em->GetEmailFromWebPage();