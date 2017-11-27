# roundcube-ovh-password
Manage Password with OVH API. Use OVH Password plugin to change your password directly inside Roundcube

The plugin is known to be working with Roundcube version 1.0 to ...

## Features
- Change password without old password check

## Requirements
- OVH API library

## Installation
1. Install the code in the drivers plugin directory and name it exactly ovh.php (roundcube/plugins/password/drivers/ovh.php)
2. Add the plugin name in the `plugins` array of the config file (config/config.inc.php formely main.inc.php). It must match the name of the directory used in #1. 

    ```php
    $config['plugins'] = array(...,'password');
    ```

3. Set your API keys in config/config.inc.php

    ```php
	$config['ovh_application_key'] = '';
	$config['ovh_application_secret'] = '';
	$config['ovh_endpoint'] = 'ovh-eu';	// choose your provider between ovh-eu ot ovh-ca
	$config['ovh_consumer_key'] = '';
    ```

4. Test your installation. You're done!

## License
GPL2 see LICENCE file

## Source
https://github.com/brouardt/roundcube-ovh-password

### Author
Thierry Brouard - TBPRO Organization
