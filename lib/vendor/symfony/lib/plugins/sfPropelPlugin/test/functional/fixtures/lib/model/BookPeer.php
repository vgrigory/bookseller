<?php

/**
 * Subclass for performing query and update operations on the 'book' table.
 *
 *
 *
 * @package lib.model
 */
class BookPeer extends BaseBookPeer
{

    /**
     * Rebate books by given values
     *
     *
     * @param array $values book data
     *
     * @example $books = array(
     *              array('id' => 1, 'rebate' => 5),
     *              array('id' => 2, 'rebate' => 7.6),
     *              array('id' => 3, 'rebate' => 10.8),
     *          );
     *
     * @return int number of books that have been rebated
     */
    public function rebateBooks(array $values)
    {
        sfProjectConfiguration::getActive()->loadHelpers(array("Model"));

        $affectedRows = 0;
        foreach ($values as $bookData) {

            $book = self::retrieveByPK($bookData['id']);
            if ($book) {

                $keys = array_keys($bookData);
                foreach ($keys as $fieldName) {

                    if ($fieldName == 'id') {

                        continue;
                    }

                    $method_name = getSetterName($fieldName);
                    if (method_exists($book, $method_name)) {

                        $book->$method_name($bookData[$fieldName]);
                    }
                }


                if (count($book->getModifiedColumns())) {

                    self::doUpdate($book);
                    $affectedRows++;
                }
            }
        }

        return $affectedRows;
    }

}
