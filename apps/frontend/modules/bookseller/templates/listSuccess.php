<?php use_javascript('vendor/jquery-1.7.2.min.js', sfWebResponse::FIRST) ?>
<?php use_javascript('vendor/jquery.jqGrid-4.4.0/jquery.jqGrid.min.js') ?>
<?php use_javascript('vendor/jquery.jqGrid-4.4.0/i18n/grid.locale-en.js') ?>
<?php use_javascript('bookseller/list.js') ?>
<?php use_stylesheet('vendor/jquery-ui/jquery-ui-1.8.22.custom/css/redmond/jquery-ui-1.8.22.custom.css') ?>
<?php use_stylesheet('vendor/jquery.jqGrid-4.4.0/ui.jqgrid.css') ?>

<h1>List bookseller books/magazines</h1>
<br/><br/>
<input type="text" id="bookseller_id" />
<select id="entity_type">
    <option value="book">book</option>
    <option value="magazine">magazine</option>
</select>
<table id="result_list"></table>