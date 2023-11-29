  <main id="main" class="main">

	<div class="pagetitle">
	  <h1>Dashboard</h1>
	  <nav>
		<ol class="breadcrumb">
		  <li class="breadcrumb-item active">Dashboard</li>
	   </ol>
	  </nav>
	</div><!-- End Page Title -->

	<section class="section dashboard" class="my-5">
	  <div class="row">

		<div class="col-md-12">
		  <div class="row">
		  	<?= $web_app->getCard( 'Total Reported Faults', $total_faults, 'bi-collection', 'success' ) ?>
		  	<?= $web_app->getCard( 'Total Completed Faults', $total_completed_faults, 'bi-check-circle-fill', 'success' ) ?>
		  	<?= $web_app->getCard( 'Total Pending Faults', $total_pending_faults, 'bi-question-circle-fill', 'warning' ) ?>
		  </div>
		</div>

	  </div>
	</section>
  </main><!-- End #main -->