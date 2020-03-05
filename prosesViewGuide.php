<table class="">
    <thead>
        <tr>
            <th>Guide Name</th>
            <?php
                date_default_timezone_set('Asia/Jakarta');
                
                //mendapatkan tgl kemarin
                $tglskr = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
                $tglkemarin = date("Y-m-d", $tglskr);

                //mendapatkan tgl 30 hari kemarin
                $tgl_30_hari_lalu = mktime(0, 0, 0, date("m"), date("d") + 30, date("Y"));
                $tgllalu = date("Y-m-d", $tgl_30_hari_lalu);

                $tgl_skr = new DateTime($tglkemarin, new DateTimeZone('Asia/Jakarta'));
                $tgl_lalu = new DateTime($tgllalu, new DateTimeZone('Asia/Jakarta'));

                //looping 
                do {
                    echo '<th>'.$tgl_skr->format("d-m-Y").'</th>';
                    $tgl_skr->modify("+1 day");
                } while ($tgl_skr <= $tgl_lalu);

            ?>
        </tr>
    </thead>
    <tbody>
        <?php
            include ('connectSQL.php');
            
            if(isset($keyword)){ // Jika veriabel $keyword ada (user telah mengklik tombol search)
                $param = '%'.$keyword.'%';
                $sql = $pdo->prepare("SELECT * FROM driver WHERE type = 'G' AND name = :na ORDER BY name ASC");
                $sql->bindParam(':na', $param);
                $sql->execute(); // Eksekusi querynya
            }
            else
            {
                $sql = $pdo->prepare("SELECT * FROM driver WHERE type = 'G' ORDER BY name ASC");
                $sql->execute();
            }

            while( $row = $sql->fetch())
            {

        ?>
        <tr>
            <th><?php echo $row['name'];?></th>
            <?php
                $activitiesGuide = $pdo->prepare("SELECT * FROM agenda ORDER BY tanggalActivities ASC");
                $activitiesGuide->execute();
                $today = date('Y-m-d');
                //$todayFix = new DateTime($today, new DateTimeZone('Asia/Jakarta'));
                while($data = $activitiesGuide->fetch()){
                    $activitasSekarang = date("Y-m-d", strtotime($data['tanggalActivities']));
                    if($row['name'] != $data['nama'])
                    {
                    }
                    else
                    {
                        if($today == $activitasSekarang){
                            echo '<td>'.$data['activities'].'</td>';
                        }
                        else
                        {
                            if($today != $activitasSekarang)
                                {
                                    $selisih = ((abs(strtotime($activitasSekarang) - strtotime($today)))/(60*60*24));
                                    for($i=1; $i<$selisih; $i++)
                                    {
                                        echo '<td>tidak ada jadwal</td>';
                                    }
                                }
                                else{
                                    echo '<td>'.$data['activities'].'</td>';
                                }
                            
                            $todayFix = date('Y-m-d', strtotime('+'.$selisih.' days', strtotime($today)));
                            
                        }
                    }
                }
            ?>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>