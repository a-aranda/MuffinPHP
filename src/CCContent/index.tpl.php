<h1>Content</h1>
<p>Create, edit and view content.</p>

<h2>All content</h2>
<?php if($contents != null):?>
  <ul>
  <?php foreach($contents as $val):?>
    <li><?=$val['id']?>, <?=esc($val['title'])?> by <?=$val['owner']?> <a href='<?=create_url("content/edit/{$val['id']}")?>'>edit</a> <a href='<?=create_url("page/view/{$val['id']}")?>'>view</a>
  <?php endforeach; ?>
  </ul>
<?php else:?>
  <p>No content exists.</p>
<?php endif;?>

<!-- <div style="background:#d2e9f4;">
<h2>CText validation</h2>
<h3>Clickable Test</h3>
<p><?=$testData['clickable']?></p>
<h3>Markdown Test</h3>
<p><?=$testData['markdown']?></p>
<h3>Smartpants Test</h3>
<p><?=$testData['smartpants']?></p>
</div> -->
<h2>Actions</h2>
<ul>
  <li><a href='<?=create_url('content/init')?>'>Init database, create tables and sample content</a>
  <li><a href='<?=create_url('content/create')?>'>Create new content</a>
  <li><a href='<?=create_url('blog')?>'>View as blog</a>
</ul>