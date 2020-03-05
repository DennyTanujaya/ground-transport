<table class="">
    <thead>
        <tr>
            <th>Service Type</th>
            <th>Service Date</th>
            <th>Name Of Client</th>
            <th>Pax</th>
            <th>TP Code</th>
            <th>Agent</th>
            <th>Movement</th>
            <th>Activities ( Tours )</th>
            <th>Pickup</th>
            <th>Dropoff</th>
            <th>Language</th>
            <th>Pickup Time</th>
            <th>Guide Name</th>
            <th>Driver Name</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include ('connectSQL.php');
            date_default_timezone_set('Asia/Jakarta');
            if(isset($keyword)){ // Jika veriabel $keyword ada (user telah mengklik tombol search)
                $param = $keyword;
                $sql = $pdo->prepare("SELECT * FROM operation WHERE service = 'AV' AND slStatus = 'OK' AND serviceDate = :se OR clientName = :na OR bookingReference = :tp OR supplier = :su OR agent = :ag OR activities = :mo ORDER BY serviceDate DESC, agent ASC");
                $sql->bindParam(':se', $param);
                $sql->bindParam(':tp', $param);
                $sql->bindParam(':ag', $param);
                $sql->bindParam(':na', $param);
                $sql->bindParam(':mo', $param);
                $sql->bindParam(':su', $param);
                $sql->execute(); // Eksekusi querynya
            }
            else
            {
                $sql = $pdo->prepare("SELECT * FROM operation WHERE service = 'AV' AND slStatus = 'OK' ORDER BY serviceDate DESC, agent ASC");
                $sql->execute();
            }

            while( $row = $sql->fetch())
            {
                if($row['area'] == "DPS")
                {
                    if($row['service'] == "AV")
                    {

        ?>
        <tr>
            <td><?php echo $row['service'];?></td>
            <td>
                <?php
                    $serviceDate = date("d/m/Y", strtotime($row['serviceDate'])); 
                        echo $serviceDate;
                ?>
            </td>
            <td><?php echo $row['clientName']; ?></td>
            <td><?php echo $row['pax'];?></td>
            <td><?php echo $row['bookingReference']; ?></td>
            <td><?php echo $row['agent']; ?></td>
            <td><?php echo $row['activities']; ?></td>
            <td>
            </td>
            <td><?php echo $row['hotel']; ?></td>
            <td><?php echo $row['dropoff']; ?></td>
            <td><?php echo $row['language']; ?></td>
            <td><?php echo $row['pickup']; ?></td>
            <td><?php echo $row['guideName']; ?></td>
            <td><?php echo $row['driverName']; ?></td>
            <td><?php echo $row['remarks']; ?></td>
            <td valign="middle">
                <a href="editData.php?&id=<?php echo $row['bslID']; ?>" class="btn btn-primary">Edit</button>
            </td>
        </tr>
        <?php
                    }
                }
            }
        ?>
    </tbody>
</table>