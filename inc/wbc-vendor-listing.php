<!DOCTYPE html>
<html lang="en">
<head>
  <title>All Enquiries</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

  <h3>Vendor listing</h3>

<?php 

   $args = array(
    'role'    => 'vendor',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
    );
    $users = get_users( $args );
// echo '<pre>';
//     print_r($users);
// echo '</pre>';

                // [data] => stdClass Object
                // (
                //     [ID] => 2
                //     [user_login] => Amit
                //     [user_pass] => $P$BkVO8YWk6fALANP1Gp20zgNVu.XKFT.
                //     [user_nicename] => amit
                //     [user_email] => amitkanash@gmail.com
                //     [user_url] => http://webchefz.com
                //     [user_registered] => 2018-03-05 09:04:25
                //     [user_activation_key] => 1520240667:$P$BaJmR/veD7j906/0clICs1L1zNS47e/
                //     [user_status] => 0
                //     [display_name] => Amit Sharma
                // )

    // echo '<ul>';
    // foreach ( $users as $user ) {
    //     echo '<li>' . esc_html( $user->display_name ) . '[' . esc_html( $user->user_email ) . ']</li>';
    // }
    // echo '</ul>';

    ?>

<table id="allVendorListing" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th style="display: none;">#</th>               
                <th style="text-align:left">Vendor Name</th>
                <th style="text-align:left">Email</th>
                <th style="text-align:left">Country</th>
                <th style="text-align: center">Products</th>
                <th style="text-align:left">Registered On</th>
                <th style="text-align:left">Action</th>

               
            </tr>
        </thead>
        <!-- <tfoot>
           <tr>
                <th style="display: none;">#</th>               
                <th style="text-align:left">Vendor Name</th>
                <th style="text-align:left">Email</th>
                <th style="text-align:left">Country</th>                
                <th style="text-align: center">Products</th>
                <th style="text-align:left">Registered On</th>
                <th style="text-align:left">Action</th>

             
            </tr>
        </tfoot> -->

        <tbody>

    <?php 
       $i= 1;
      foreach ( $users as $user ) {
        echo "<tr>";
          echo '<td style="display:none;"></td>';       
            echo '<td style="text-align:left">' .$user->display_name  . '</td>';
            echo '<td style="text-align:left">' . $user->user_email  . '</td>'; 
            echo '<td style="text-align:left">' .  get_the_author_meta( 'country', $user->ID )  . '</td>';
            echo '<td style="text-align:center">' . count_user_posts( $user->ID , "product"  ) . '</td>';
            echo '<td style="text-align:left">' . $user->user_registered . '</td>';

          
            echo '<td><span class="changeStatus">
            <a  title="Edit Vendor" href="'.get_edit_user_link($user->ID).'"><span class="dashicons dashicons-edit" style="color:#393318"></span></a> | <a  title="Delete Vendor"  href="'.admin_url().'users.php?action=delete&user='.$user->ID.'&_wpnonce=9ce90343c1"><span class="dashicons dashicons-trash" style="color:#f82800"></span></a> 
          </td>';

          echo "</tr>";
          $i++;

        }
      ?>
    
      </tbody>
    </table>
<script type="text/javascript">
      $(document).ready(function() {
        $('#allVendorListing').DataTable( {
          "pagingType": "full_numbers"
        });
      });
</script>