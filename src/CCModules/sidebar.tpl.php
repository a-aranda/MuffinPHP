<div class='sidebar'>
<h4><b class="muffin"></b>All modules</h4>
<p>All MuffinPHP modules.</p>
<ul>
<?php foreach($modules as $module): ?>
  <li><a href='<?=create_url("module/view/{$module['name']}")?>'><?=$module['name']?></a></li>
<?php endforeach; ?>
</ul>




<h4>MuffinPHP core</h4>
<p>MuffinPHP core modules.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if($module['isMuffinPHPCore']): ?>
  <li><a href='<?=create_url("module/view/{$module['name']}")?>'><?=$module['name']?></a></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>




<h4>MuffinPHP CMF</h4>
<p>MuffinPHP Content Management Framework (CMF) modules.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if($module['isMuffinPHPCMF']): ?>
  <li><a href='<?=create_url("module/view/{$module['name']}")?>'><?=$module['name']?></a></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>




<h4>Models</h4>
<p>A class is considered a model if its name starts with CM.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if($module['isModel']): ?>
  <li><a href='<?=create_url("module/view/{$module['name']}")?>'><?=$module['name']?></a></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>



<h4>Controllers</h4>
<p>Implements interface <code>IController</code>.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if($module['isController']): ?>
  <li><a href='<?=create_url("module/view/{$module['name']}")?>'><?=$module['name']?></a></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>




<h4>Manageable module</h4>
<p>Implements interface <code>IModule</code>.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if($module['isManageable']): ?>
  <li><a href='<?=create_url("module/view/{$module['name']}")?>'><?=$module['name']?></a></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>




<h4>Contains SQL</h4>
<p>Implements interface <code>IHasSQL</code>.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if($module['hasSQL']): ?>
  <li><a href='<?=create_url("module/view/{$module['name']}")?>'><?=$module['name']?></a></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>



<h4>More modules</h4>
<p>Modules that does not implement any specific MuffinPHP interface.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if(!($module['isController'] || $module['isMuffinPHPCore'] || $module['isMuffinPHPCMF'])): ?>
  <li><a href='<?=create_url("module/view/{$module['name']}")?>'><?=$module['name']?></a></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>
</div>