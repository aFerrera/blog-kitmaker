<?php

use ScientiaMobile\WurflCloud\Config;
use ScientiaMobile\WurflCloud\Cache\Null;
use ScientiaMobile\WurflCloud\Cache\Cookie;
use ScientiaMobile\WurflCloud\Client;
require_once 'wurfl-cloud-client-php-master/src/autoload.php';
try {
  // Create a WURFL Cloud Config
  $config = new Config();
  // Set your API Key here
  $config->api_key = '154356:A1cBG0AgLmMhVrRbxyAlL3YwZe0rlnij';
  // Create a WURFL Cloud Client
  $client = new Client($config, new Null());
  // Detect the visitor's device
  $client->detectDevice();
