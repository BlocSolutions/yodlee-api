<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (! ini_get('date.timezone')) {
    date_default_timezone_set('America/New_York');
}

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$yodleeApi = new \Yodlee\Api\Factory(getenv('COBRAND_NAME'));

// cobrand login.
$cobrandLogin = $yodleeApi->cobrand()->postLogin(getenv('COBRAND_LOGIN'), getenv('COBRAND_PASSWORD'));
print '$cobrandLogin<pre>';
var_dump($cobrandLogin);
print '</pre>';
print 'getCobrandSessionToken()<pre>';
var_dump($yodleeApi->getSessionToken()->getCobrandSessionToken());
print '</pre>';

// user login.
$userLogin = $yodleeApi->user()->postLogin(getenv('USER_LOGIN'), getenv('USER_PASSWORD'));
print '$userLogin<pre>';
var_dump($userLogin);
print '</pre>';
print 'getUserSessionToken()<pre>';
var_dump($yodleeApi->getSessionToken()->getUserSessionToken());
print '</pre>';

// user transactions.
$transactions = $yodleeApi->transactions()->getTransactions([
    'fromDate' => '2014-01-01',
    'toDate' => '2014-12-31'
]);
print '$transactions<pre>';
print_r($transactions);
print '</pre>';
