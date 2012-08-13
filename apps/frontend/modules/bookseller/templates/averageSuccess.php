<?php sfProjectConfiguration::getActive()->loadHelpers(array('Book'), 'book'); ?>

<?php if( isset($bookAverage) ): ?>
average book price: <?php echo roundBookPrice($bookAverage); ?>&#8364;
<?php if( $id ): ?>
, for bookseller #<?php echo $id; ?>
<?php endif; ?>
<br />
<?php endif; ?>

<?php if( isset($magazineAverage) ): ?>
average magazine price: <?php echo roundBookPrice($magazineAverage); ?>&#8364;
<?php if( $id ): ?>
, for bookseller #<?php echo $id; ?>
<?php endif; ?>
<?php endif; ?>
