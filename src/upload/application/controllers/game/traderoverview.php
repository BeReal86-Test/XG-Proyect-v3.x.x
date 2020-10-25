<?php
/**
 * traderoverview.php
 *
 * @category Controller
 * @package  Application
 * @author   XG Proyect Team
 * @license  http://www.xgproyect.org XG Proyect
 * @link     http://www.xgproyect.org
 * @version  3.3.0
 */
namespace application\controllers\game;

use application\core\Controller;
use application\libraries\FunctionsLib as Functions;

/**
 * TraderOverview Class
 */
class TraderOverview extends Controller
{
    /**
     * The module ID
     *
     * @var int
     */
    const MODULE_ID = 5;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        // check if session is active
        parent::$users->checkSession();

        // load Language
        parent::loadLang(['game/trader']);

        // Check module access
        Functions::moduleMessage(Functions::isModuleAccesible(self::MODULE_ID));

        // build the page
        $this->buildPage();
    }

    /**
     * Build the page
     *
     * @return void
     */
    private function buildPage(): void
    {
        parent::$page->display(
            $this->getTemplate()->set(
                'game/trader_overview_view',
                array_merge(
                    $this->langs->language,
                    [
                        'status_message' => [],
                        'error_color' => '',
                        'error_text' => '',
                        'current_mode' => '',
                    ]
                )
            )
        );
    }
}
