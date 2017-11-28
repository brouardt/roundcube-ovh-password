# roundcube-ovh-password
Manage Password with OVH API. Use OVH Password plugin to change your password directly inside Roundcube

The plugin is known to be working with Roundcube version 1.0 to ...

## Features
- Change password without old password check

## Requirements
- OVH API library

## Installation
1. Add in the root composer.json file, in the require section 

	```json
	"require": {
        "php": ">=5.4.0",
        "pear/pear-core-minimal": "~1.10.1",
        "...": "...",
        "ovh/ovh": "dev-master"
    },
	```
	and launch the update with 
	
	```
	composer update
	```

2. Install the code in the drivers plugin directory and name it exactly ovh.php (roundcube/plugins/password/drivers/ovh.php)
3. Add the plugin name "password" in the `plugins` array of the config file (config/config.inc.php formely config.inc.php.sample). It must match the name of the directory used in #1. 

    ```php
    $config['plugins'] = array(...,'password');
    or
    $config['plugins'] = [
    ...,
    'password'
    ];
    ```
4. Go to https://api.ovh.com/createToken/. Define the name, description, validity and credentials of your application and take the information provided on the registration document after clicking the [Create Token] button, and fill in your configuration file.

	```txt
	Credentials :
	GET /emails/domain/*
	POST /email/domain/*
	```

5. Set your API keys in config/config.inc.php. 

    ```php
	$config['ovh_application_key'] = '%MddoeEXAMPLE*$eà@er';
	$config['ovh_application_secret'] = 'TrucKL54?_dopsd%%';
	$config['ovh_endpoint'] = 'ovh-eu';	// choose your provider between ovh-eu ot ovh-ca
	$config['ovh_consumer_key'] = 'SecretK3YP^^P';
    ```

6. Test your installation. You're done!

## License
GPL2 see LICENCE file

## Source
https://github.com/brouardt/roundcube-ovh-password

### Author
Thierry Brouard - TBPRO Organization
