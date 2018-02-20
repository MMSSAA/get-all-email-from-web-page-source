<?php

/**
 * Created by Soheil_star.
 * email: m.soheili71@Gmail.com
 * get all email from web page source
 */
class FetchEmail
{
    protected $url;
    protected $pattern = '/[a-z0-9_\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';
    protected $wrongCharacter = ['/', ':', '.', '\\'];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function GetEmailFromWebPage()
    {
        try {
            $getUrl = file_get_contents($this->url);
            $clientSourceWebSite = htmlspecialchars($getUrl);
            preg_match_all($this->pattern, $clientSourceWebSite, $search);

            $url = str_replace($this->wrongCharacter, ' ', $this->url);
            $file = fopen($url . '.txt', 'w') or die('Unable to open File');
            fwrite($file, implode(" ", $search[0]));
            fclose($file);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}