<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

$this->title = 'Login to your account';
$this->params['breadcrumbs'][] = $this->title;
$this->params['meta_description'] = 'Log in to access your Yii2 application account.';
$this->params['meta_keywords'] = 'yii, yii2, login, sign in, authentication';
$htmlIcon = <<<HTML
{label}<div class="input-group"><span class="input-group-text" aria-hidden="true">%s</span>{input}</div>{error}{hint}
HTML;
$labelOptions = ['class' => 'form-label fw-semibold small'];
?>

<div class="container-fluid d-flex align-items-center justify-content-center min-vh-100">
    <div class="row justify-content-center w-100">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-10">

            <!-- Login Form Card -->
            <div class="card" id="loginCard">
                <div class="card-body p-5">
                    <!-- Brand Header -->
                    <div class="text-center mb-4">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <span class="brand-mark me-2" aria-hidden="true"></span>
                            <h3 class="mb-0 fw-bold text-dark">SILOLA</h3>
                        </div>
                        <p class="text-muted">Please sign in to your account</p>
                    </div>

                    <!-- Login Form -->
                    <?php $form = ActiveForm::begin(['id' => 'loginForm']); ?>
                    <div class="mb-3">
                        <?= $form->field($model, 'username', [
                            'options' => ['class' => 'mb-0'],
                            'template' => sprintf($htmlIcon, '&#128100;'),
                            'inputOptions' => [
                                'class' => 'form-control border-start-0 ps-0',
                                'placeholder' => 'username',
                                'autofocus' => true,
                                'required' => 'required'
                            ],
                        ])->textInput()->label('Your Username', $labelOptions) ?>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model, 'password', [
                            'options' => ['class' => 'mb-0'],
                            'template' => sprintf($htmlIcon, '&#128274;'),
                            'inputOptions' => [
                                'class' => 'form-control border-start-0 ps-0',
                                'placeholder' => 'Password',
                                'required' => 'required'
                            ],
                        ])->passwordInput()->label('Your Password', $labelOptions) ?>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>

                    <div class="d-grid mb-3">
                        <?= Html::submitButton(
                            '<i class="fas fa-sign-in-alt me-2"></i> Login',
                            [
                                'class' => 'btn login-btn btn-primary btn-lg rounded-3',
                                'name' => 'login-button',
                            ],
                        ) ?>
                    </div>
                    </form>
                    <?php ActiveForm::end(); ?>
                    <!-- Divider -->
                    <div class="text-center mb-3">
                        <span class="text-muted">Lupa Password?</span>
                        <a href="#" class="text-decoration-none ms-1" id="showRegisterForm" data-bs-toggle="modal" data-bs-target="#forgot-password">Ajukan permohonan reset password.</a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-4">
                <p class="text-light opacity-75 mb-2">
                    &copy; <?= date('Y') ?> UIN Syarif Hidayatullah Jakarta.
                </p>
                <div>
                    <a href="#" class="text-light text-decoration-none opacity-75 me-3">Privacy</a>
                    <a href="#" class="text-light text-decoration-none opacity-75 me-3">Terms</a>
                    <a href="https://github.com/agungsijawir" class="text-light text-decoration-none opacity-75" target="_blank">Support</a>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->render('@app/views/layouts/_render_core/_modal.php', []); ?>
