<div class="login-container">
    <div class="users form content">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center"><?= __('Inscription') ?></h2>
            </div>
            <div class="card-body">
                <?= $this->Form->create() ?>
                <fieldset>
                    <legend class="text-muted text-center"><?= __('Veuillez saisir votre nom, email et mot de passe') ?></legend>

                    <div class="form-group">
                        <?= $this->Form->control('name', [
                            'label' => __('Nom complet'),
                            'class' => 'form-control',
                            'placeholder' => __('Jean Dupont')
                        ]) ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('email', [
                            'label' => __('Email'),
                            'class' => 'form-control',
                            'placeholder' => __('votre@email.com')
                        ]) ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('password', [
                            'type' => 'password',
                            'label' => __('Mot de passe'),
                            'class' => 'form-control',
                            'placeholder' => __('Votre mot de passe')
                        ]) ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('password_confirm', [
                            'type' => 'password',
                            'label' => __('Confirmer le mot de passe'),
                            'class' => 'form-control',
                            'placeholder' => __('Répétez le mot de passe')
                        ]) ?>
                    </div>
                </fieldset>

                <div class="form-group text-center">
                    <?= $this->Form->button(__("S'inscrire"), [
                        'class' => 'btn btn-primary btn-lg btn-block'
                    ]) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>