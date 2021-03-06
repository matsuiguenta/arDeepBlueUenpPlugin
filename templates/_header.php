<?php echo get_component_slot('header') ?>

<?php echo get_component('default', 'updateCheck') ?>

<?php echo get_component('default', 'privacyMessage') ?>

<?php if ($sf_user->isAdministrator() && (string)QubitSetting::getByName('siteBaseUrl') === ''): ?>
  <div class="site-warning">
    <?php echo link_to(__('Please configure your site base URL'), 'settings/siteInformation', array('rel' => 'home', 'title' => __('Home'))) ?>
  </div>
<?php endif; ?>

<?php if ($sf_user->isAuthenticated()): ?>
  <div id="top-bar">
    <nav>
      <?php echo get_component('menu', 'userMenu') ?>
      <?php echo get_component('menu', 'quickLinksMenu') ?>
      <?php if (sfConfig::get('app_toggleLanguageMenu')): ?>
        <?php echo get_component('menu', 'changeLanguageMenu') ?>
      <?php endif; ?>
      <?php echo get_component('menu', 'mainMenu', array('sf_cache_key' => $sf_user->getCulture().$sf_user->getUserID())) ?>
    </nav>
  </div>
<?php endif; ?>

<div id="header">

  <div class="container">

    <div id="header-lvl1">
      <div class="row">
        <div class="span12">

          <?php if ('pt_BR' == $sf_user->getCulture()): ?>
            <a id="header-council" href="http://atom.uenp.edu.br"><?php echo image_tag('/plugins/arDeepBlueUenpPlugin/images/council.br.png', array('width' => '156', 'height' => '42', 'alt' => __('Centro de Documentação Histórica'))) ?></a>
          <?php else: ?>
            <a id="header-council" href="http://atom.uenp.edu.br"><?php echo image_tag('/plugins/arDeepBlueUenpPlugin/images/council.en.png', array('width' => '156', 'height' => '42', 'alt' => __('Centro de Documentação Histórica'))) ?></a>
          <?php endif; ?>

          <ul id="header-nav" class="nav nav-pills">

            <?php if ('pt_BR' == $sf_user->getCulture()): ?>
              <li><?php echo link_to(__('Home'), 'http://atom.uenp.edu.br') ?></li>
            <?php else: ?>
              <li><?php echo link_to(__('Home'), 'http://atom.uenp.edu.br') ?></li>
            <?php endif; ?>

            <?php if ('pt_BR' == $sf_user->getCulture()): ?>
              <li><?php echo link_to(__('Contato'), array('module' => 'staticpage', 'slug' => 'contact')) ?></li>
            <?php else: ?>
              <li><?php echo link_to(__('Contact us'), array('module' => 'staticpage', 'slug' => 'contact')) ?></li>
            <?php endif; ?>

            <?php foreach (array('en', 'pt_BR') as $item): ?>
              <?php if ($sf_user->getCulture() != $item): ?>
                <li><?php echo link_to(format_language($item, $item), array('sf_culture' => $item) + $sf_data->getRaw('sf_request')->getParameterHolder()->getAll()) ?></li>
                <?php break; ?>
              <?php endif; ?>
            <?php endforeach; ?>

            <?php if (!$sf_user->isAuthenticated()): ?>
              <li><?php echo link_to(__('Log in'), array('module' => 'user', 'action' => 'login')) ?></li>
            <?php endif; ?>

          </ul>

        </div>
      </div>
    </div>

    <div id="header-lvl2">
      <div class="row">

        <div id="logo-and-name" class="span6">
          <?php if ('pt_BR' == $sf_user->getCulture()): ?>
            <h1><?php echo link_to(image_tag('/plugins/arDeepBlueUenpPlugin/images/logo.png', array('alt' => __('AtoM CEDHIS UENP'))), 'http://atom.uenp.edu.br/index.php/?sf_culture=pt_BR', array('rel' => 'home')) ?></h1>
          <?php else: ?>
            <h1><?php echo link_to(image_tag('/plugins/arDeepBlueUenpPlugin/images/logo.png', array('alt' => __('AtoM CEDHIS UENP'))), 'http://atom.uenp.edu.br', array('rel' => 'home')) ?></h1>
          <?php endif; ?>
        </div>

        <div id="header-search" class="span6">
          <?php echo get_component('search', 'box') ?>

          <?php echo get_component('menu', 'clipboardMenu') ?>
        </div>

      </div>
    </div>

  </div>

</div>
