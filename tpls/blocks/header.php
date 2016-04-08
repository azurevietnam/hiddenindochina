<?php
/**
* @package   T3 Blank
* @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
* @license   GNU General Public License version 2 or later; see LICENSE.txt
*/
defined('_JEXEC') or die;
// get params
$sitename  = $this->params->get('sitename');
$slogan    = $this->params->get('slogan', '');
$logotype  = $this->params->get('logotype', 'text');
$logoimage = $logotype == 'image' ? $this->params->get('logoimage', T3Path::getUrl('images/logo.png', '', true)) : '';
$logoimgsm = ($logotype == 'image' && $this->params->get('enable_logoimage_sm', 0)) ? $this->params->get('logoimage_sm', T3Path::getUrl('images/logo-sm.png', '', true)) : false;
if (!$sitename) {
	$sitename = JFactory::getConfig()->get('sitename');
}
$logosize = 'col-sm-2';
if ($headright = $this->countModules('head-search or languageswitcherload')) {
	$logosize = 'col-sm-2';
}
?>
<!-- HEADER -->
<header id="t3-header">
	<div class="t3-header container">
		<div class="top-bar">
			<!--TOP BAR-->
			<?php if ($this->countModules('languageswitcherload')) : ?>
			<!-- LANGUAGE SWITCHER -->
			<div class="languageswitcherload">
				<jdoc:include type="modules" name="<?php $this->_p('languageswitcherload') ?>" style="raw" />
			</div>
			<!-- //LANGUAGE SWITCHER -->
			<?php endif ?>
			<!--END TOP BAR-->
		</div>
		<div class="head">
			<div class="row">
				<!-- LOGO -->
				<div class="col-xs-12 <?php echo $logosize ?> logo">
					<div class="logo-<?php echo $logotype, ($logoimgsm ? ' logo-control' : '') ?>">
						<a href="<?php echo JURI::base(true) ?>" title="<?php echo strip_tags($sitename) ?>">
							<?php if($logotype == 'image'): ?>
							<img class="logo-img" src="<?php echo JURI::base(true) . '/' . $logoimage ?>" alt="<?php echo strip_tags($sitename) ?>" />
							<?php endif ?>
							<?php if($logoimgsm) : ?>
							<img class="logo-img-sm" src="<?php echo JURI::base(true) . '/' . $logoimgsm ?>" alt="<?php echo strip_tags($sitename) ?>" />
							<?php endif ?>
							<span><?php echo $sitename ?></span>
						</a>
						<small class="site-slogan"><?php echo $slogan ?></small>
					</div>
				</div>
				<!-- //LOGO -->
				<div class="col-md-10 col-sm-12">
					<?php if ($this->countModules('head-search')) : ?>
					<!-- HEAD SEARCH -->
					<div class="head-search <?php $this->_c('head-search') ?>">
						<jdoc:include type="modules" name="<?php $this->_p('head-search') ?>" style="raw" />
					</div>
					<!-- //HEAD SEARCH -->
					<?php endif ?>
				</div>
			</div>
		</div>
		<div class="main-menu">
			<!-- MAIN NAVIGATION -->
			<nav id="t3-mainnav" class="wrap navbar navbar-default t3-mainnav">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<?php if ($this->getParam('navigation_collapse_enable', 1) && $this->getParam('responsive', 1)) : ?>
					<?php $this->addScript(T3_URL.'/js/nav-collapse.js'); ?>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".t3-navbar-collapse">
					<i class="fa fa-bars"></i>
					</button>
					<?php endif ?>
					<?php if ($this->getParam('addon_offcanvas_enable')) : ?>
					<?php $this->loadBlock ('off-canvas') ?>
					<?php endif ?>
				</div>
				<?php if ($this->getParam('navigation_collapse_enable')) : ?>
				<div class="t3-navbar-collapse navbar-collapse collapse"></div>
				<?php endif ?>
				<div class="t3-navbar navbar-collapse collapse">
					<jdoc:include type="<?php echo $this->getParam('navigation_type', 'megamenu') ?>" name="<?php echo $this->getParam('mm_type', 'mainmenu') ?>" />
				</div>
			</nav>
			<!-- //MAIN NAVIGATION -->
		</div>
	</header>
	<!-- //HEADER -->