<?php
/**
 * Login Model
 *
 * PHP Version 7.1+
 *
 * @category Model
 * @package  Application
 * @author   XG Proyect Team
 * @license  http://www.xgproyect.org XG Proyect
 * @link     http://www.xgproyect.org
 * @version  3.1.0
 */
namespace application\models\adm;

use application\core\Model;

/**
 * Login Class
 *
 * @category Classes
 * @package  Application
 * @author   XG Proyect Team
 * @license  http://www.xgproyect.org XG Proyect
 * @link     http://www.xgproyect.org
 * @version  3.1.0
 */
class Login extends Model
{
    /**
     * Get user data to login
     *
     * @param string $user_email
     * @param string $user_password
     * @return array
     */
    public function getLoginData(string $user_email, string $user_password): array
    {
        $result = $this->db->queryFetch(
            "SELECT
                `user_id`,
                `user_name`,
                `user_password`
            FROM `" . USERS . "`
            WHERE `user_email` = '" . $this->db->escapeValue($user_email) . "'
                AND `user_password` = '" . sha1($user_password) . "'
                AND `user_authlevel` >= '1'
            LIMIT 1"
        );

        if ($result) {
            return $result;
        }

        return [];
    }
}

/* end of login.php */
