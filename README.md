# Laravel-CampaignMonitor
A Laravel 5 wrapper for CampaignMonitor APIs

## Installation

- [Laravel-CampaignMonitor on Packagist](https://packagist.org/packages/casinelli/laravel-campaignmonitor)
- [Laravel-CampaignMonitor on GitHub](https://github.com/Casinelli/Laravel-CampaignMonitor)

To get the latest version of Laravel-CampaignMonitor simply require it in your `composer.json` file.

~~~
"casinelli/laravel-campaignmonitor": "dev-master"
~~~

You'll then need to run `composer install` to download it and have the autoloader updated.

Once Laravel-CampaignMonitor is installed you need to register the service provider with the application. Open up `app/config/app.php` and find the `providers` key.

~~~php
'providers' => [

    Casinelli\CampaignMonitor\CampaignMonitorServiceProvider::class,

]
~~~

Laravel-CampaignMonitor also ships with a facade. You can register the facade in the `aliases` key of your `app/config/app.php` file.

~~~php
'aliases' => [

    'CampaignMonitor' => Casinelli\CampaignMonitor\Facades\CampaignMonitor::class,

]
~~~

Create the configuration file using artisan

~~~
$ php artisan vendor:publish
~~~

And set your own API key and Client ID:

~~~php
return [

    'api_key' => env('CAMPAIGNMONITOR_API_KEY'),

    'client_id' => env('CAMPAIGNMONITOR_CLIENT_ID'),

];
~~~

## Usage

You can find all the methods in the original [campaignmonitor/createsend-php package](https://github.com/campaignmonitor/createsend-php).

Some examples:

~~~php
// Add an user to a List ID:
$result = CampaignMonitor::subscribers('LIST_ID')->add([
    'EmailAddress' => 'example@gmail.com',
    'Name' => 'Giovanni Casinelli',
]);

// Create a list for a Client:
$result = CampaignMonitor::lists()->create(\Config::get('campaignmonitor.client_id'), [
    'Title' => 'List name',
]);
~~~
