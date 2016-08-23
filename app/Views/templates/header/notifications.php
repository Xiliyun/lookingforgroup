<?php 
	$new_notifs_count = 0 ;
	foreach ($all_notifications as $notification)
	{
		if($notification['status'] == 0) {$new_notifs_count++;} 


	}

	use Model\Notifications\CalculDate;
	$calcul_date = new CalculDate;



?>

        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notifications">
			<?php if ($new_notifs_count != 0): ?>
				<div class="ring-container">
				    <div class="ringring"></div>
				    <div class="circle"></div>
				    <i class="fa fa-bell-o" aria-hidden="true"></i>

				</div>

			<?php else: ?>
				<i class="fa fa-bell-o fa-1x" aria-hidden="true"></i>
			<?php endif ?>

        	</a>

			<ul class="dropdown-menu notifications-dropdown">
				<!-- ici on affichera les notifications -->
				<?php if (!empty($all_notifications)): ?>

					<div class="notification-heading">
						<h4 class="">notifications <span class="badge"><?= $new_notifs_count?></span> </h4>
					</div>
   					<li class="divider"></li>
   					<?php $new_notifs_count = 0; ?>
					<div class="notifications-wrapper">
						<?php foreach ($all_notifications as $notification): ?>
							<?php 
								$phrase_temps_ecoule = $calcul_date->calcul($notification['date']);

							?>
							<?php if($notification['status'] == 0): ?>
							<!-- 1) vérifier si le status est à 0 ou 1, si le status est à 0,  -->
						    <a class="content" href="#">
						       <div class="notification-item new-notification">
						      	<small>Il y a <?= $phrase_temps_ecoule ?> </small>
						       	   <?= $notification['details_notification'] ?>
						      	</div>
						    </a>
						    <?php elseif($notification['status'] == 1): ?>

						    <a class="content" href="#">
						       <div class="notification-item old-notification">
						       	<small>Il y a <?= $phrase_temps_ecoule ?></small>

						       	   <?= $notification['details_notification'] ?>
						      	</div>
						    </a>
							<?php endif; ?>

						<?php endforeach ?>	

					</div> <!-- END NOTIFICATION WRAPPER -->

				<?php else: ?>
				    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notifications"><i class="fa fa-bell-o" aria-hidden="true"></i></a>
					<ul class="dropdown-menu notifications-dropdown">

						<li>Il n'y a pas de notifications à afficher</li>
				<?php endif ?>
				<input hidden id="root_path" value="<?= $_SERVER['W_BASE']; ?>">

	        </ul>
