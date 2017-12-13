<?php

// Boot deps
require __DIR__ . '/vendor/autoload.php';
use Dotenv\Dotenv;
use Filestack\Filelink;
use Filestack\FilestackClient;
use Filestack\FilestackSecurity;

// Show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Logging helper
function puts($text) {
	echo $text."\n";
}

// Abort helper
function abort($text) {
	puts($text);
	die;
}

// Start up
puts('Starting');
puts('--------');

// Check for config file
if (!file_exists(__DIR__.'/.env')) abort('No .env file');
$dotenv = new Dotenv(__DIR__);
$dotenv->load();

// Create client
// See https://github.com/filestack/filestack-php
$key = getenv('FILESTACK_KEY');
$security = new FilestackSecurity(getenv('FILESTACK_SECRET'));
$client = new FilestackClient($key, $security);

// Upload a file
puts('Uploading');
$upload = $client->upload(__DIR__.'/file.txt');
puts('Uploaded: '.$upload->handle);

// Check the remove file contents
puts('Reading');
$remote = new Filelink($upload->handle, $key, $security);
puts('Read: '.trim($remote->getContent()));

// Cleaning up
puts('Deleting');
$remote->delete();
puts('Deleted');


// Finished
puts('-------------');
puts('Test complete');
