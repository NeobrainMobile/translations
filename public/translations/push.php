<?php
$remote = 'origin';
$branch = 'master';

exec('git --git-dir=.gitone add .');
exec('git --git-dir=.gitone commit -m "new strings on the way"');
exec('git --git-dir=.gitone push ' . $remote . ' ' . $branch . ' --tags --force');

?>
