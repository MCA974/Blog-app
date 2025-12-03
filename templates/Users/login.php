<div class="login-container">
    <div class="users form content">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center"><?= __('Connexion') ?></h2>
            </div>
            <div class="card-body">
                <?= $this->Form->create() ?>
                <fieldset>
                    <legend class="text-muted text-center"><?= __('Veuillez saisir votre email et mot de passe') ?></legend>

                    <div class="form-group">
                        <?=
                        $this->Form->control('email', [
                            'label' => __('Email'),
                            'class' => 'form-control',
                            'placeholder' => __('votre@email.com')
                        ])
                        ?>
                    </div>

                    <div class="form-group">
                        <?=
                        $this->Form->control('password', [
                            'label' => __('Mot de passe'),
                            'class' => 'form-control',
                            'placeholder' => __('Votre mot de passe')
                        ])
                        ?>
                    </div>
                </fieldset>

                <div class="form-group">
                    <?=
                    $this->Form->button(__('Se connecter'), [
                        'class' => 'btn btn-primary btn-lg btn-block centered-btn'
                    ])
                    ?>

                        <?= $this->Form->end() ?>

                    <div class="link-container">
                        <?=
                        $this->Html->link('S\'inscrire',
                                ['controller' => 'Users', 'action' => 'add'],
                                ['class' => '']
                        )
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        padding: 20px;
        background-color: #f8f9fa;
    }

    .link-container {
        text-align: center;
        margin-top: 15px
    }


    .users.form.content {
        width: 100%;
        max-width: 400px;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem 1rem;
        text-align: center;
    }

    .card-header h2 {
        margin: 0;
        font-weight: 300;
        font-size: 1.8rem;
    }

    .card-body {
        padding: 2rem;
        background: white;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 12px 15px;
        font-size: 14px;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 5px;
        font-size: 16px;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
    }

    .centered-btn {
        max-width: 300px;
        margin: 0 auto;
        display: block;
    }


    legend {
        font-size: 14px;
        margin-bottom: 1.5rem;
        border: none;
    }

    .text-muted {
        color: #6c757d !important;
    }

    /* Responsive */
    @media (max-width: 576px) {
        .card-body {
            padding: 1.5rem;
        }

        .login-container {
            min-height: 70vh;
        }
    }
</style>