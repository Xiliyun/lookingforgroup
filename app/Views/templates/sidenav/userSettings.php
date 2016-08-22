 <h2>Menu du compte</h2>
        <ul class="nav nav-pills nav-stacked">
          <li><a href="<?= $this->url('profil_settings',['id' => $w_user['id_user']]) ?>">General</a></li>
          <li><a href="<?= $this->url('profil_accountInfo',['id' => $w_user['id_user']]) ?>">Votre compte</a></li>
          <!-- Pseudo, email -->
          <li><a href="<?= $this->url('profil_userInfo',['id' => $w_user['id_user']]) ?>">Vos informations personnelles</a></li>
          <!-- nom, prenom, age, orientation sexuelle, pourquoi je suis ici -->
          <li><a href="<?= $this->url('profil_userGaming',['id' => $w_user['id_user']]) ?>">Votre vie de gamer</a></li>
          <!-- genre préférés -->
        </ul>
        

      