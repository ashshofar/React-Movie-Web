<?php

return [
	/**
	 * User Pool ID & App Client ID
	 */
    'userPool' => env('AWS_COGNITO_USER_POOL_ID', ''),
    'clientId' => env('AWS_COGNITO_USER_APP_CLIENT_ID', ''),
    
    /**
     * Web Admin User Pool ID & App Client ID
     */
    'userAdminPool' => env('AWS_COGNITO_USER_ADMIN_POOL_ID', ''),
    'userAdminClientId' => env('AWS_COGNITO_USER_ADMIN_APP_CLIENT_ID', ''),
    
    /**
     * Default page limit for each list view
     */
    'pageLimit' => 20,

    /** table prefix */
    'tablePrefix' => env('DB_TABLE_PREFIX', ''),
];