 <?php  
      $k = $_POST['id'];
      $k = trim($k);
      $con = mysqli_connect("localhost","root","","file_management");
      $sql = "SELECT uf.id,uf.name,uf.size,uf.month,uf.email,uf.admin_status,uf.timers,uf.download,uf.fileno,uf.location_address,uf.branch,uf.file_department,uf.link,l.id_location,l.location_address,l.branch FROM upload_files uf JOIN location l ON uf.location_address = l.id_location WHERE l.location_address ='$k'";
      $res = mysqli_query($con, $sql);
       $cnt=1;
      while ($rows = mysqli_fetch_array($res)) {
     ?>
       <tr>
         <td> <?php echo $cnt; ?></td>
         <td> <?php echo $rows ['fileno']; ?></td>
         <td> <?php echo $rows ['name']; ?></td>
         <td> <?php echo $rows ['month']; ?></td>
         <td> <?php echo $rows ['file_department']; ?></td>
       </tr>

  <?php 
  $cnt=$cnt+1;
       }
       

   ?>


