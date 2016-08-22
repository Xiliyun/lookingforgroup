<?php $this->layout('layoutAdmin', ['title' => 'Espace administrateur'])?>
<?php $this->start('dashboard_section_account-info') ?>

<div class="containerbutton">
		<button type="button" class="btn btn-default"><a href="<?php echo $this->url('gestion_membres');?>" class="btn-text">Gestion des membres</a></button>

		<button type="button" class="btn btn-default"><a href="<?php echo $this->url('gestion_news');?>" class="btn-text">Gestion des news</a></button>
	</div>
		

<?php $this->stop('dashboard_section_account-info') ?>








