<?php foreach ($data['tickets'] as $eventName => $tickets) : ?>
<h1><?= $eventName ?></h1>
<table width="100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Qty</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($tickets as $ticket) : ?>
    <tr>
        <td><?= $ticket['name'] ?></td>
        <td><?= $ticket['email'] ?></td>
        <td><?= $ticket['qty'] ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endforeach; ?>

<style>
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>