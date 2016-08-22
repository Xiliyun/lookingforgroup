
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