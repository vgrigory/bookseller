<?php

function formatBookPrice(Book $book, $onlyWholeNumbers = true)
{
    if (!$onlyWholeNumbers || $book->getPrice() - floor($book->getPrice()) == 0) {

        return floor($book->getPrice() - 1) + 0.99;
    }

    return $book->getPrice();
}

function roundBookPrice($price)
{
    return round($price, 2);
}

function getBooksJSON(array $books)
{
    $response = new stdClass();
    $response->page = 1;
    $response->total = 1;
    $response->records = count($books);
    $response->rows = array();
    foreach ($books as $key => $book) {

        $response->rows[$key]['id'] = $book->getId();

        $response->rows[$key]['cell'] = array();
        $response->rows[$key]['cell'][] = $book->getId();
        $response->rows[$key]['cell'][] = $book->getTitle();
        $response->rows[$key]['cell'][] = $book->getPublisher();
        $response->rows[$key]['cell'][] = formatBookPrice($book) . ' &#8364';
        $response->rows[$key]['cell'][] = $book->getBooksellerId();
        $response->rows[$key]['cell'][] = $book->getRebate();
    }


    return json_encode($response);
}