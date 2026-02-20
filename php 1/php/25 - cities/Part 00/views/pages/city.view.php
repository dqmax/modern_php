<?php 
/**
 * @var WorldCityModel $city
 */
?>

<h1>
    <?php echo $city->city;?> (<?php echo $city->country?>)
</h1>

<table>
    <tbody>
        <tr>
            <th>City name: </th>
            <td><?php echo e($city->city)?></td>
        </tr>
        <tr>
            <th>Country name: </th>
            <td><?php echo e($city->country)?></td>
        </tr>
        <tr>
            <th>Population: </th>
            <td><?php echo e($city->population)?></td>
        </tr>
        <tr>
            <th>iso2: </th>
            <td><?php echo e($city->iso2)?></td>
        </tr>
    </tbody>
</table>