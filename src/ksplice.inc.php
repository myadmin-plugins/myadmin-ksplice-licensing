<?php
/**
 * Ksplice Functionality
 *
 * API Documentation at http://www.ksplice.com/uptrack/api
 *
 * Last Changed: $LastChangedDate: 2017-05-31 17:13:05 -0400 (Wed, 31 May 2017) $
 * @author detain
 * @version $Revision: 24968 $
 * @copyright 2017
 * @package MyAdmin
 * @category Licenses
 */

/**
 * deactivate a ksplice license
 *
 * @param string $ipAddress_uuid can be either an ip or the uuid from the $license_extra['ksplice_uuid']
 */
function deactivate_ksplice($ipAddress_uuid) {
	// Deactivate Ksplice
	//
	$ksplice = new \Detain\MyAdminKsplice\Ksplice(KSPLICE_API_USERNAME, KSPLICE_API_KEY);
	if (valid_ip($ipAddress_uuid, FALSE)) {
		$uuid = $ksplice->ip_to_uuid($ipAddress_uuid);
		myadmin_log('licenses', 'info', "Ksplice IP to UUID ({$ipAddress_uuid}) Response {$uuid}", __LINE__, __FILE__);
	} else
		$uuid = $ipAddress_uuid;
	$response = $ksplice->deauthorize_machine($uuid);
	myadmin_log('licenses', 'info', "Deactivate Ksplice ({$ipAddress_uuid}) Response " . json_encode($response), __LINE__, __FILE__);
}
