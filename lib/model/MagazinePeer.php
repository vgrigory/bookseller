<?php

/**
 * Skeleton subclass for performing query and update operations on the 'magazine' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 07/28/12 07:35:04
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class MagazinePeer extends BaseMagazinePeer
{

    /**
     * Marks magazines as "sold out" and/or "can be reordered"
     *
     *
     * @param array $values magazines' data to be processed
     *
     * @example $magazines = array(
     *                           array('id' => 1, 'sold_out' => 0),
     *                           array('id' => 2, 'can_be_reordered' => 0),
     *                           array('id' => 3, 'sold_out' => 1, 'can_be_reordered' => 0, 'rebate' => 7.2),
     *                       );
     *
     * @return int number of magazines that have been processed
     */
    static public function markMagazines(array $values)
    {
        sfProjectConfiguration::getActive()->loadHelpers(array("Model"));

        $affectedRows = 0;
        foreach ($values as $magazineData) {

            $magazine = self::retrieveByPK($magazineData['id']);
            if ($magazine) {

                $keys = array_keys($magazineData);
                foreach ($keys as $fieldName) {

                    if ($fieldName == 'id') {

                        continue;
                    }

                    $method_name = getSetterName($fieldName);
                    if (method_exists($magazine, $method_name)) {

                        $magazine->$method_name($magazineData[$fieldName]);
                    }
                }


                if (count($magazine->getModifiedColumns())) {

                    self::doUpdate($magazine);
                    $affectedRows++;
                }
            }
        }

        return $affectedRows;
    }

    static public function getAverage($id = null)
    {
        $criteria = new Criteria();
        $criteria->addSelectColumn('AVG(' . MagazinePeer::PRICE . ')');

        if ($id) {

            $criteria->add(MagazinePeer::BOOKSELLER_ID, $id);
        }

        $magazineStmt = self::doSelectStmt($criteria);

        return $magazineStmt->fetchColumn(0);
    }

    static public function getMagazines($id = null)
    {
        $criteria = new Criteria();

        if ($id) {

            $criteria->add(MagazinePeer::BOOKSELLER_ID, $id);
        }

        $magazines = self::doSelect($criteria);

        return $magazines;
    }

}

// MagazinePeer
