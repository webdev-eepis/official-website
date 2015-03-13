<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--Start of Zopim Live Chat Script
	<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
	$.src='//v2.zopim.com/?2pmn2SmEosAyKjaY0JxG0oOTmwDNeDf7';z.t=+new Date;$.
	type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
	</script>
	<!--End of Zopim Live Chat Script-->
	
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
	<!-- <script type="text/javascript" src="https://mylivechat.com/chatinline.aspx?hccid=13753143"></script>-->
    <!--<script type='text/javascript'>(function () { var done = false;var script = document.createElement('script');script.async = true;script.type = 'text/javascript';script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript';document.getElementsByTagName('HEAD').item(0).appendChild(script);script.onreadystatechange = script.onload = function (e) {if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {var w = new PCWidget({ c: '9a53e2c2-1c55-41dd-ae51-71c3e1090002', f: true });done = true;}};})();</script>
	-->
		<div id="header">
			
			<div class="top2">
				<?php
            NavBar::begin([
                'brandLabel' => '<img src="'.Yii::$app->request->baseUrl.'/assets/main/images/logo.png" class="logo">',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-default',
                ],
            ]);
            $menuItems = [
                ['label' => 'HOME', 'url' => ['/site/index']],
                ['label' => 'ABOUT', 'url' => ['/site/about']],
                ['label' => 'BLOG', 'url' => ['/blog']],
            ];
			
			if(Yii::$app->user->isGuest){
				$menuItems2[] = ['label' => 'LOGIN', 'url' => ['/member/login'], 'options' => ['class' => 'menu-kiri']];
				$menuItems2[] = ['label' => 'REGISTER', 'url' => ['/member/register'], 'options' => ['class' => 'menu-kanan']];
			}else{
				$menuItems2[] = ['label' => Yii::$app->user->identity->username, 'url' => ['/site/login'], 'options' => ['class' => 'menu-kiri']];
				$menuItems2[] = ['label' => 'LOGOUT', 'url' => ['/member/logout'], 'options' => ['class' => 'menu-kanan']];
			}
			
			echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right menu-member'],
                'items' => $menuItems2,
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

			</div>
		</div>
		
    <div class="wrap">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
         
		
        <?= $content ?>
    </div>
	<!--<div id="spot-im-root"></div>-->
	<script type="text/javascript">//!function(t,o,p){function e(){var t=o.createElement("script");t.type="text/javascript",t.async=!0,t.src=("https:"==o.location.protocol?"https":"http")+":"+p,o.body.appendChild(t)}t.spotId="d18024c484ae922e4a6c4fae87aec125",t.spotName="",t.allowDesktop=!0,t.allowMobile=!1,t.containerId="spot-im-root",e()}(window.SPOTIM={},document,"//www.spot.im/embed/scripts/launcher.js");</script>
    <footer class="footer">
		<div id="contact-side">
		<div class="container">
			<!--<div class="title-side">CONTACT US</div>
			<form action="<?= Yii::$app->request->baseUrl."/contact" ?>" method="post">
			<div class="row" style="margin-top:50px">
				<div class="col-md-6">
					<input type="text" name="nama" placeholder="Name" required>
					<input type="email" name="email" placeholder="Email" required>
				</div>
				<div class="col-md-6">
					<textarea name="pesan" placeholder="Message" required></textarea>
				</div>
			</div>
			<input type="submit" class="submit" value="SEND MESSAGE">
			</form>-->
		</div>
		</div>
		<div class="bottom">
			<div class="container">
			<p class="pull-left">
				<?php
				echo Nav::widget([
					'options' => ['class' => 'navbar-nav'],
					'items' => $menuItems,
				]);
				?>
			</p>
			<p class="pull-right" style="padding: 5px 0;">&copy; <strong>WEBDEV EEPIS Community</strong> <?= date('Y') ?> All right reserved.</p>
			</div>
		</div>
    </footer>

    <?php $this->endBody() ?>
	
  <script type="text/javascript">

    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
		controlNav: false
      });
    });
  </script>
</body>
</html>
<?php $this->endPage() ?>
