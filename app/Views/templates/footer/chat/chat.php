
    <div id="chat" class="collapse navbar-collapse navbar-fixed-bottom">
    	<ul class="nav navbar-nav navbar-right ">
			<!-- FORMULAIRE DE CONNEXION DIRECTEMENT DEPUIS LA PAGE D'ACCUEIL -->

		<li class="dropup">
         <a href="#" class="dropdown-toggle chat-dropup" data-toggle="dropdown"><span class="glyphicon glyphicon-comment">   </span><strong>      Chatbox</strong> <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li>

					<div class="row">
						<div class="col-md-12 ">

							<div class="panel chat-body">

								<div class="panel-heading chat-header">
									
									<strong>chat</strong>
								</div>

								<div class="panel-body msg-wgt-body">
									<!-- ICI S'AFFICHERA LES MESSAGES -->

									<?php if (!empty($messages)): ?>
									 	
										<?php foreach (array_reverse($messages) as $message):
													$id_user = $message['id_user'];
												    $msg = htmlentities($message['message'], ENT_NOQUOTES);
												    $username = ucfirst($message['username']);
												    $sent_on = $message['sent_on'];

										?>

										<div class="well chat-msg">
											<div class="header"><strong><a href="<?= $this->url('profil_user', ['id' => $id_user ]) ?>"><?= $username ?></a></strong> <small>(<span class="time"><?= $sent_on ?></span>)</small> :</div>

											<div><?= $msg?></div>
										</div>
										<?php endforeach ?>
									<?php endif ?>

								</div>

								<div class="panel-footer msg-wgt-footer" id="chat-input">

									<textarea class="form-control" id="chatMsg" placeholder="Ecrivez votre message ici puis appuyez sur entrée pour envoyer" rows="3"></textarea>
									<input type="submit" class="btn btn-block" name="submit" value="Envoyez votre message !" id="envoi">

									<input hidden id="root_path" value="<?= $_SERVER['W_BASE']; ?>">


								</div>
							</div>
							<!-- end panel -->
								




						</div>
					
					</div>

				</li>
	  	  	</ul>

    </div><!--/.navbar-collapse -->