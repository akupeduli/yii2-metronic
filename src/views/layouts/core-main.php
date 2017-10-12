<?php
/** @var \yii\web\View $this */
use yii\helpers\Html;
use akupeduli\metronic\Metronic;
use akupeduli\metronic\widgets\NavBar;
use akupeduli\metronic\assets\core\ModeAsset;
$this->beginContent(__DIR__ . '/base.php');
/** @var Metronic $metronic */
$metronic = Metronic::getComponent();
$media = ModeAsset::register($this);
?>
<!-- BEGIN: Header -->
<header class="m-grid__item m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop">
            <!-- BEGIN: Brand -->
            <div class="m-stack__item m-brand  m-brand--skin-dark ">
                <div class="m-stack m-stack--ver m-stack--general">
                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                        <a href="?page=index&demo=default" class="m-brand__logo-wrapper">
                            <img alt="" src="<?= $media->baseUrl . "/media/img/logo/logo_default_dark.png" ?>"/>
                        </a>
                    </div>
                    <div class="m-stack__item m-stack__item--middle m-brand__tools">
                        
                        <!-- BEGIN: Left Aside Minimize Toggle -->
                        <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
                            <span></span>
                        </a>
                        <!-- END -->
                        
                        <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                        <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <!-- END -->
                        
                        <?php if ($metronic->navbarLeftFile): ?>
                        <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <?php endif ?>

                        <?php if ($metronic->navbarRightFile): ?>
                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                            <i class="flaticon-more"></i>
                        </a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <!-- END: Brand -->
            <?= NavBar::widget([
                    'leftNav' => $metronic->navbarLeftFile,
                    'rightNav' => $metronic->navbarRightFile
                ])
            ?>
        </div>
    </div>
</header>
<!-- END: Header -->
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    <!-- BEGIN: Left Aside -->
    <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
    <div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-dark ">
        <!-- BEGIN: Aside Menu -->
        <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500" >
            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                <li class="m-menu__item " aria-haspopup="true">
                    <a href="?page=index&demo=default" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-line-graph"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">Dashboard</span>
                                <span class="m-menu__link-badge">
                                    <span class="m-badge m-badge--danger">2</span>
                                </span>
                            </span>
                        </span>
                    </a>
                </li>
                <li class="m-menu__section">
                    <h4 class="m-menu__section-text">Components</h4>
                    <i class="m-menu__section-icon flaticon-more-v3"></i>
                </li>
                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                    <a href="#" class="m-menu__link m-menu__toggle">
                        <i class="m-menu__link-icon flaticon-layers"></i>
                        <span class="m-menu__link-text">Base</span>
                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="m-menu__submenu">
                        <span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item " aria-haspopup="true"><a href="?page=components/base/dropdown&demo=default" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Dropdown</span></a></li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover"><a href="#" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Tabs</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="m-menu__submenu"><span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true"><a href="?page=components/base/tabs/bootstrap&demo=default" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Bootstrap Tabs</span></a></li>
                                        <li class="m-menu__item " aria-haspopup="true"><a href="?page=components/base/tabs/line&demo=default" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Line Tabs</span></a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- END: Aside Menu -->
    </div>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <?= $content ?>
    </div>
</div>
<!-- end:: Body -->
                
<!-- begin::Footer -->
<footer class="m-grid__item m-footer">
    <div class="m-container m-container--fluid m-container--full-height m-page__container">
        <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
            <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                <span class="m-footer__copyright">
                    <?= Yii::$app->params['metronic']['footer'] ?>
                </span>
            </div>
        </div>
    </div>
</footer>
<!-- end::Footer -->
<?php
$this->endContent();