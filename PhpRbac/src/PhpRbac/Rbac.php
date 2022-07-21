<?php

namespace PhpRbac;

use \Jf;

/**
 * @file
 * Provides NIST Level 2 Standard Role Based Access Control functionality
 *
 * @defgroup phprbac Rbac Functionality
 * @{
 * Documentation for all PhpRbac related functionality.
 */
class Rbac
{
    public function __construct($ProvidedHostname = false, $ProvidedDbname = false, $ProvidedUsername = false, $ProvidedPassword = false, $ProvidedAdapter = false, $ProvidedTablePrefix = false, $unit_test = '')
    {
        if ((string) $unit_test === 'unit_test') {
            require_once dirname(dirname(__DIR__)) . '/tests/database/database.config';
        } else {
            require_once dirname(dirname(__DIR__)) . '/database/database.config';
        }

        if ($ProvidedHostname) $host = $ProvidedHostname;
        if ($ProvidedDbname) $dbname = $ProvidedDbname;
        if ($ProvidedUsername) $user = $ProvidedUsername;
        if ($ProvidedPassword) $pass = $ProvidedPassword;
        if ($ProvidedAdapter) $adapter = $ProvidedAdapter;
        if ($ProvidedTablePrefix) $tablePrefix = $ProvidedTablePrefix;

        require_once 'core/lib/Jf.php';

        $this->Permissions = Jf::$Rbac->Permissions;
        $this->Roles = Jf::$Rbac->Roles;
        $this->Users = Jf::$Rbac->Users;
    }

    public function assign($role, $permission)
    {
        return Jf::$Rbac->assign($role, $permission);
    }

    public function check($permission, $user_id)
    {
        return Jf::$Rbac->check($permission, $user_id);
    }

    public function enforce($permission, $user_id)
    {
        return Jf::$Rbac->enforce($permission, $user_id);
    }

    public function reset($ensure = false)
    {
        return Jf::$Rbac->reset($ensure);
    }

    public function tablePrefix()
    {
        return Jf::$Rbac->tablePrefix();
    }

    public function getWildcardPermissionList($search)
    {
        return Jf::$Rbac->getWildcardPermissionList($search);
    }
}

/** @} */ // End group phprbac */
