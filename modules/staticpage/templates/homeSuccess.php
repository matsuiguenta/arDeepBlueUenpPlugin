<div id="homepage-hero" class="row">

  <?php $cacheKey = 'homepage-nav-'.$sf_user->getCulture() ?>
  <?php if (!cache($cacheKey)): ?>
    <div class="span6" id="homepage-nav">
      <p><?php echo __('Browse by') ?></p>
      <ul>
        <?php $icons = array(
          'browseInformationObjects' => '/images/icons-large/icon-archival.png',
          'browseActors' => '/images/icons-large/icon-people.png',
          'browseRepositories' => '/images/icons-large/icon-institutions.png',
          'browseSubjects' => '/images/icons-large/icon-subjects.png',
          'browseFunctions' => '/images/icons-large/icon-functions.png',
          'browsePlaces' => '/images/icons-large/icon-places.png',
          'browseDigitalObjects' => '/images/icons-large/icon-media.png') ?>
        <?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID) ?>
        <?php if ($browseMenu->hasChildren()): ?>
          <?php foreach ($browseMenu->getChildren() as $item): ?>
            <li>
              <a href="<?php echo url_for($item->getPath(array('getUrl' => true, 'resolveAlias' => true))) ?>">
                <?php if (isset($icons[$item->name])): ?>
                  <?php echo image_tag($icons[$item->name], array('width' => 42, 'height' => 42, 'alt' => '')) ?>
                <?php endif; ?>
                <?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?>
              </a>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
    <?php cache_save($cacheKey) ?>
  <?php endif; ?>

  <div class="span4" id="intro">
  
    <?php if ('pt_BR' == $sf_user->getCulture()): ?>
	
      <h2>
        <span class="title">ACERVO HISTÓRICO</span>
        O que é o Lorem Ipsum?
      </h2>
      <p> O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente com os programas de publicação como o Aldus PageMaker que incluem versões do Lorem Ipsum.</p>
    <?php else: ?>
      <h2>
        <span class="title">CEDHIS UENP</span>
        Lorem ipsum
      </h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis sapien sit amet ante maximus dictum. Nulla lobortis risus neque, eget imperdiet libero placerat id. Mauris ut sodales dui. Quisque interdum velit at porttitor tempor. Nulla in est risus. Proin cursus arcu eget scelerisque dignissim. Fusce non metus sodales, dignissim dolor et, accumsan elit. Cras quis tincidunt ante, non porttitor justo. Quisque tellus lorem, suscipit tincidunt massa at, aliquam convallis risus. Phasellus dignissim in tortor at dictum. Curabitur efficitur urna sed magna suscipit malesuada ut in risus. Nunc euismod elementum convallis. Maecenas volutpat fermentum neque, malesuada mattis dui sagittis at. Donec cursus ipsum a velit rhoncus, vitae vehicula velit maximus.</p> 
    <?php endif; ?>
	
  </div>

</div>
<!--
<div id="homepage" class="row">
  <div class="span12">
	<?php if (!include_slot('content')): ?>
      <div id="content" role="main">
        <?php echo $sf_content ?>
      </div>
    <?php endif; ?>
	</div>

  <div class="span4">
    <?php echo get_component('default', 'popular', array('limit' => 10, 'sf_cache_key' => $sf_user->getCulture())) ?>
  </div>

  <div class="span8" id="virtual-exhibit">
    <a href="http://museu.uenp.edu.br">
      <h3>
        <?php echo __('Virtual exhibits') ?><br />
        <span class="title">Museu UENP</span>
        <span class="small">Universidade Estadual do Norte do Paraná</span>
      </h3>
      <div>&nbsp;</div>
    </a>
  </div>

</div>
  -->