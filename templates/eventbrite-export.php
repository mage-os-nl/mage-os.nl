<?php foreach ($data['tickets'] as $eventName => $tickets) : ?>
<h1><?= $eventName ?></h1>
<table width="100%">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Qty</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    <?php foreach($tickets as $ticket) : ?>
    <tr>
        <td><?= $i ?></td>
        <td><?= $ticket['name'] ?></td>
        <td><?= $ticket['email'] ?></td>
        <td><?= $ticket['qty'] ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endforeach; ?>

<style>
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>