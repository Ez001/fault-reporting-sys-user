<main id="main" class="main">

   <div class="pagetitle">
      <h1 class="">Report Fault</h1>
      <div class="d-md-flex justify-content-between">
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
               <li class="breadcrumb-item">Report Fault</li>
            </ol>
         </nav>
      </div>
   </div><!-- End Page Title -->

   <section class="section">
      
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <div class="text-end mb-2 mt-2">
                     <button type="button" id="add_fault_btn" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addFaultModal" title="Add Fault">
                     <label for="add_fault_btn" class=""><i class="bi bi-plus-lg"></i> <span class="d-none d-md-inline">Add Fault</span></label>
                     </button>
                  </div>
                  <?php
                     echo $web_app->showAlert( $msg, true );
      
                     if ( $r_fault_arr ) 
                     {
                  ?>
                  <div class="mt-2">
                     <?php
                        echo "<table class='table table-responsive table-striped' id='my_datatable' style='width: 100%'>
                        <thead>
                           <tr>
                              <th>S/N</th>
                              <th>Fault</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S/N</th>
                              <th>Fault</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </tfoot>
                        <tbody>";

                        $sn = 0;
                        $tr_content = '';

                        //looping through records
                        foreach ( $r_fault_arr as $r_fault_data ) 
                        {
                           $id = $r_fault_data[ 'id' ];
                           $fault_id = $r_fault_data[ 'fault_id' ];
                           $fault = $faults->getById( [ $fault_id ] );
                           $description = $r_fault_data[ 'description' ];
                           $status = $r_fault_data[ 'status' ];

                           $sn++;
                           
                           $tr_content .=  "<tr>
                              <td class='fw-light'> $sn </td>
                              <td class='fw-light'> $fault </td>
                              <td class='fw-light'> $description </td>                              
                              <td class='fw-light'> $status </td>
                              <td class='fw-light'>

                              </td>
                           </tr>";
                        }

                        echo $tr_content .= '</tbody></table>';
                  
                     ?>
                  </div>
                  <?php
                     }
                  ?>
               </div>
            </div>
         </div>
      </div>
      
   </section>  
</main><!-- End #main -->

<!-- Start Dog Modal-->
<div class="modal fade" id="addFaultModal" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title"><strong>Add Fault</strong></h3>
            <button type="button" class="btn-close h2" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="" method="POST">
               <div class="mb-2">
                  <label for="fault" class="fw-bold">Faults <span class="text-danger">*</span></label>
                  <div>
                     <select name="fault" id="fault" required class="form-select">
                        <option value="#">Select Fault</option>
                        <?= $faults->loadFaults( $fault_arr, $web_app->persistData( 'fault', false, $clear ) )  ?>
                     </select>
                  </div>
               </div>
               <div class="mb-2">
                  <label for="description" class="fw-bold">Description <span class="text-danger">*</span></label>
                  <div>
                     <textarea name="description" id="description" class="form-control" maxlength="1000" required><?= $web_app->persistData( 'description', false, $clear ) ?></textarea>
                  </div>
               </div>
               <div class="text-center mt3">
                  <button name="add_btn" id="add_btn" class="btn btn-success">Add</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- End Dog Modal-->
