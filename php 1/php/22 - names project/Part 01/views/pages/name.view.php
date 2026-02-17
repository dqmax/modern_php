<?php  if (!empty($entries)): ?>

    <h1><?php echo $_GET['name']?></h1>
    
    <table>
    <tr>
        <thead>
            <th>Year</th>
            <th>Number of babies born</th>
        </thead>
    </tr>
        <tbody>
            <?php foreach($entries as $entry): ?>
                    <tr>
                        <td><?php echo $entry['year']; ?></td>
                        <td><?php  echo $entry['count']; ?></td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    No information provided
<?php endif; ?> 