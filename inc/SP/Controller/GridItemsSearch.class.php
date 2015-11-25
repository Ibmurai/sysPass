<?php
/**
 * Created by PhpStorm.
 * User: rdb
 * Date: 24/11/15
 * Time: 14:14
 */

namespace SP\Controller;


use SP\Core\Template;
use SP\Html\DataGrid\DataGridPagerBase;
use SP\Util\Checks;

abstract class GridItemsSearch extends Controller
{
    /**
     * @var Grids
     */
    protected $_grids;

    /**
     * Constructor
     *
     * @param $template Template con instancia de plantilla
     */
    public function __construct(Template $template = null)
    {
        parent::__construct($template);

        $this->view->assign('isDemo', Checks::demoIsEnabled());

        $this->_grids = new Grids();
        $this->_grids->setQueryTimeStart(microtime());
    }

    /**
     * Actualizar los datos del paginador
     *
     * @param DataGridPagerBase $Pager
     * @param bool              $filterOn
     * @param int               $limitStart
     * @param int               $limitCount
     */
    protected function updatePager(DataGridPagerBase $Pager, $filterOn, $limitStart, $limitCount)
    {
        $Pager->setLimitStart($limitStart);
        $Pager->setLimitCount($limitCount);
        $Pager->setOnClickArgs($limitCount);
        $Pager->setFilterOn($filterOn);
    }
}