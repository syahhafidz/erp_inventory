
    <?php foreach($role_detail as $row){?>
    <tr>
        <td><?php echo $row['username']?></td>
        <td><?php echo $row['hak_akses']?></td>
        <td><?php echo $row['status'] == 1 ? 'Active' : 'Non Active' ?></td>
    </tr>
    <?php } ?>
