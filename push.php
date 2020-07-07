<?php
$remote = 'origin';
$branch = 'master';

exec('git add .');
exec('git commit -m "new files"');
exec('git push ' . $remote . ' ' . $branch . ' --tags --force');

 ?>
