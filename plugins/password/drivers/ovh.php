<?php
/**
 * OVH driver
 *
 * Driver that adds functionality to change the user password via
 * the OVH API.
 *
 * For installation instructions please read the README file.
 *
 * @version 0.1
 * @author Thierry Brouard <thierry@brouard.pro>
 *
 * Licence : GPL2
 */
use \Ovh\Api;

class rcube_ovh_password
{

    public function save($currpass, $newpass)
    {
        $rc = rcmail::get_instance();

        list($name, $domain) = explode('@', $_SESSION['username']);

        $application_key = $rc->config->get('ovh_application_key');
        $application_secret = $rc->config->get('ovh_application_secret');
        $endpoint = $rc->config->get('ovh_endpoint');
        $consumer_key = $rc->config->get('ovh_consumer_key');

        $ovh = new Api($application_key, $application_secret, $endpoint, $consumer_key);
        try {
            $result = $ovh->post("/email/domain/$domain/account/$name/changePassword", array(
                'password' => $newpass
            ));
            return PASSWORD_SUCCESS;
        } catch (ClientErrorResponseException $exception) {
            $errorCode = $exception->getResponse()->getStatusCode();
            switch ($errorCode) {
                case 403:
                    rcube::raise_error(array(
                        'code' => $errorCode, 
						'type' => 'ovh',
                        'file' => __FILE__, 
						'line' => __LINE__,
                        'message' => $exception->getResponse()->getBody(true)
                        ), true, false);
                    $code = PASSWORD_CONNECT_ERROR;
                    break;
                default:
                    $code = PASSWORD_SUCCESS;
                    break;  // faster than nothing
            }
            return $code;
        }
    }
}
