<?php

/**
 * book actions.
 *
 * @package    bookseller
 * @subpackage book
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bookActions extends sfActions
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
     * Action to test BookPeer::rebateBooks() method
     *
     *
     * @param sfWebRequest $request
     */
    public function executeRebateBooks(sfWebRequest $request)
    {
        $books = array(
            array('id' => 1, 'rebate' => 5),
            array('id' => 2, 'rebate' => 7.6),
            array('id' => 3, 'rebate' => 10.8),
        );

        $this->affectedRows = BookPeer::rebateBooks($books);
    }

    /**
     * Action to test round book pricehelperfunction
     *
     * @param sfWebRequest $request
     */
    public function executeRoundBookPrice(sfWebRequest $request)
    {
        sfProjectConfiguration::getActive()->loadHelpers(array('Book'), 'book');

        $bookId           = $request->getParameter('id');
        $book = BookPeer::retrieveByPK($bookId);
        if( !$book ){
            $book = new Book();
            $book->setPrice(14.79);
        }

        $onlyWholeNumbers = $request->getParameter('onlyWholeNumbers');
        if( empty($onlyWholeNumbers) ){

            $onlyWholeNumbers = false;
        }

        $this->originalPrice = $book->getPrice();
        $this->roundedPrice  = formatBookPrice($book, $onlyWholeNumbers);
    }
}
