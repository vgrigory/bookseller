<?php


function formatMagazinePrice(Magazine $magazine, $onlyWholeNumbers = true)
{
    if( !$onlyWholeNumbers || $magazine->getPrice() - floor($magazine->getPrice()) == 0 ){

        return floor($magazine->getPrice()-1)+0.99;
    }

    return $magazine->getPrice();
}

function getMagazinesJSON(array $magazines)
{
    $response = new stdClass();
    $response->page = 1;
    $response->total = 1;
    $response->records = count($magazines);
    $response->rows = array();
    foreach ($magazines as $key => $magazine) {

        $response->rows[$key]['id'] = $magazine->getId();

        $response->rows[$key]['cell'] = array();
        $response->rows[$key]['cell'][] = $magazine->getId();
        $response->rows[$key]['cell'][] = $magazine->getTitle();
        $response->rows[$key]['cell'][] = $magazine->getDateOfPublication();
        $response->rows[$key]['cell'][] = formatMagazinePrice($magazine) . ' &#8364';
        $response->rows[$key]['cell'][] = $magazine->getBooksellerId();
        $response->rows[$key]['cell'][] = $magazine->getSoldOut();
        $response->rows[$key]['cell'][] = $magazine->getCanBeReordered();
        $response->rows[$key]['cell'][] = $magazine->getRebate();
    }


    return json_encode($response);
}