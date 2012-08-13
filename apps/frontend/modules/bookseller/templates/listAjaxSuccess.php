<?php if( isset($books) ) sfProjectConfiguration::getActive()->loadHelpers(array('Book'), 'book'); ?>
<?php if( isset($magazines) ) sfProjectConfiguration::getActive()->loadHelpers(array('Magazine'), 'magazine'); ?>

<table cellspacing="20">
<?php if( isset($books) ): ?>
    <thead>
    <tr>
      <th>title</th>
      <th>publisher</th>
      <th>price</th>
      <th>bookseller</th>
      <th>rebate</th>
    </tr></thead>
<?php foreach ($books as $book): ?>
    <tr>
        <td><?php echo $book->getTitle(); ?></td>
        <td><?php echo $book->getPublisher(); ?></td>
        <td><?php echo formatBookPrice($book->getRawValue()); ?>&#8364;</td>
        <td><?php echo $book->getBooksellerId(); ?></td>
        <td><?php echo $book->getRebate(); ?></td>
    </tr>
<?php endforeach; ?>
<?php endif; ?>
<?php if( isset($magazines) ): ?>
    <thead>
    <tr>
      <th>title</th>
      <th>publication date</th>
      <th>price</th>
      <th>bookseller</th>
      <th>sold out</th>
      <th>can be reordered</th>
      <th>rebate</th>
    </tr></thead>
<?php foreach ($magazines as $magazine): ?>
    <tr>
        <td><?php echo $magazine->getTitle(); ?></td>
        <td><?php echo $magazine->getDateOfPublication(); ?></td>
        <td><?php echo formatMagazinePrice($magazine->getRawValue()); ?>&#8364;</td>
        <td><?php echo $magazine->getBooksellerId(); ?></td>
        <td><?php echo ($magazine->getSoldOut() ? '+' : '-' ); ?></td>
        <td><?php echo ($magazine->getCanBeReordered() ? '+' : '-' ); ?></td>
        <td><?php echo $magazine->getRebate(); ?></td>
    </tr>
<?php endforeach; ?>
<?php endif; ?>
</table>
