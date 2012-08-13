<?php

/**
 * magazine actions.
 *
 * @package    bookseller
 * @subpackage magazine
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class magazineActions extends sfActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->forward('default', 'module');
    }

    /**
     * Action to test MagazinePeer::markMagazines() method
     *
     *
     * @param sfWebRequest $request
     */
    public function executeMarkMagazines(sfWebRequest $request)
    {
        $magazines = array(
            array('id' => 1, 'sold_out' => 0),
            array('id' => 2, 'can_be_reordered' => 0),
            array('id' => 3, 'sold_out' => 0, 'can_be_reordered' => 0, 'rebate' => 7.2),
        );

        $this->affectedRows = MagazinePeer::markMagazines($magazines);
    }

}
