<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use akupeduli\metronic\forms\LoginForm;
    use akupeduli\metronic\assets\core\GlobalMediaAsset;

    $media = GlobalMediaAsset::register($this);
?>
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--singin" id="m_login">
    <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
        <div class="m-stack m-stack--hor m-stack--desktop">
            <div class="m-stack__item m-stack__item--fluid">
                <div class="m-login__wrapper">
                    <div class="m-login__logo">
                        <?= Html::a( Html::img($media->baseUrl . "/img/logos/logo-2.png"), "#" ) ?>
                    </div>
                    <div class="m-login__signin">
                        <div class="m-login__head">
                            <h3 class="m-login__title">
                                Sign In To Admin
                            </h3>
                        </div>
                        <?php $form = ActiveForm::begin([
                                'errorCssClass' => 'has-danger',
                                'options' => [
                                    'class' => 'm-login__form m-form',
                                ],
                                'fieldConfig' => [
                                    'template'     => "{input}\n{error}",
                                    'labelOptions' => [
                                        'class' => 'form-group m-form__group'
                                    ],
                                    'inputOptions' => [
                                        'class' => 'form-control m-input'
                                    ],
                                    'errorOptions' => [
                                        'class' => 'form-control-feedback'
                                    ],
                                ],
                            ]);
                        ?>
                        <form class="m-login__form m-form" method="POST">
                            <?php
                            if ($loginForm->loginWith === LoginForm::WITH_EMAIL) {
                                echo $form->field($loginForm, 'email', [
                                    'options' => [
                                        'class' => 'form-group m-form__group',
                                    ],
                                    'inputOptions' => [
                                        'placeholder' => $loginForm->getAttributeLabel('email')
                                    ]
                                ]);
                            } else {
                                echo $form->field($loginForm, 'username', [
                                    'options' => [
                                        'class' => 'form-group m-form__group',
                                    ],
                                    'inputOptions' => [
                                        'class' => 'form-control m-input',
                                        'placeholder' => $loginForm->getAttributeLabel('username')
                                    ]
                                ]);
                            }
                        
                            echo $form->field($loginForm, 'password', [
                                'options' => [
                                    'class' => 'form-group m-form__group',
                                ],
                                'inputOptions' => [
                                    'class' => 'form-control m-input m-login__form-input--last',
                                    'placeholder' => $loginForm->getAttributeLabel('password')
                                ]
                            ])->passwordInput();
                            ?>
                            <div class="row m-login__form-sub">
                                <div class="col m--align-left">
                                    <label class="m-checkbox m-checkbox--focus">
                                        <input type="checkbox" name="remember"> Remember me
                                        <span></span>
                                    </label>
                                </div>
                                <?php if ($loginForm->enableForgotPassword): ?>
                                <div class="col m--align-right">
                                    <a href="<?= Url::to($loginForm->forgotPasswordUrl) ?>" class="m-link">
                                        Forget Password ?
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="m-login__form-action">
                                <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                    Sign In
                                </button>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
            <?php if ($loginForm->enableRegister): ?>
            <div class="m-stack__item m-stack__item--center">
                <div class="m-login__account">
                    <span class="m-login__account-msg">
                        Don't have an account yet ?
                    </span>
                    &nbsp;&nbsp;
                    <a href="<?= Url::to($loginForm->registerUrl) ?>" class="m-link m-link--focus m-login__account-link">
                        Sign Up
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1 m-login__content"
        style="background-image: url(<?= $media->baseUrl . "/img/bg/bg-4.jpg" ?>)">
        <div class="m-grid__item m-grid__item--middle">
            <h3 class="m-login__welcome">
                Join Our Community
            </h3>
            <p class="m-login__msg">
                Lorem ipsum dolor sit amet, coectetuer adipiscing
                <br>
                elit sed diam nonummy et nibh euismod
            </p>
        </div>
    </div>
</div>