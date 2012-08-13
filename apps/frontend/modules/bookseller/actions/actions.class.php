<?php

/**
 * bookseller actions.
 *
 * @package    bookseller
 * @subpackage bookseller
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class booksellerActions extends sfActions
{

    const TYPE_BOOK = 'book';
    const TYPE_MAGAZINE = 'magazine';

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->forward('default', 'module');
    }

    public function executeAverage(sfWebRequest $request)
    {
        $this->id = $request->getParameter('id');
        $type = trim($request->getParameter('type'));

        if (!$type || $type == self::TYPE_BOOK) {

            $this->bookAverage = BookPeer::getAverage($this->id);
        }

        if (!$type || $type == self::TYPE_MAGAZINE) {

            $this->magazineAverage = MagazinePeer::getAverage($this->id);
        }
    }

    public function executeList(sfWebRequest $request)
    {

    }

    public function executeListAjax(sfWebRequest $request)
    {
        $this->id = $request->getParameter('id');
        $type = $request->getParameter('type');

        $limit = $request->getParameter('rows');
        $page  = $request->getParameter('page');

        $this->getResponse()->setContentType('application/json');
        if (!$type || self::TYPE_BOOK == $type) {

            sfProjectConfiguration::getActive()->loadHelpers(array('Book'), 'book');
            $books = BookPeer::getBooks($this->id);

            return $this->renderText(getBooksJSON($books));
        }

        if (self::TYPE_MAGAZINE == $type) {

            sfProjectConfiguration::getActive()->loadHelpers(array('Magazine'), 'magazine');
            $magazines = MagazinePeer::getMagazines($this->id);

            return $this->renderText(getMagazinesJSON($magazines));
        }
    }

}
