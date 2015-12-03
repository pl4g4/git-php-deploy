<?php 

/*
*
* @autor pl4g4
*
*/

if($_GET['token'] != 'pl4g4'){
        die('No Access');
}

$gitUrl = 'git@bitbucket.org:user/repo.git';
$gitRepoFolder = /var/www/domain/public_html/public/repo/.git
$targetFolder = '/var/www/domain/public_html/';
$repoFolder = '/var/www/domain/public_html/public/repo/';

try{
        print_r('<h1>Beginning Deployment...</h1><br />');
        exec('git clone -b development '. $gitUrl, $output);
        print_r('<h3>Repository cloned, deleting .git directory</h3><br />');
        exec('rm -rf '.$gitFolder, $output);
        print_r('<h3>Removed .git directory, copying code from temporary location</h3><br />');
        exec('rsync -a '. $repoFolder . $targetFolder ,$output);
        print_r('<h3>Copied code from temporary location, removing temporary location</h3><br />');
        exec('rm -rf '. $repoFolder, $output);
        print_r('<h3>Deleted temporary location, fixing permissions...</h3><br />');
        exec('chown -R www-data:www-data '. $targetFolder, $output);
        print_r('<h3>Fixed owner permissions</h3><br />');
        exec('chmod -R og-rx '.$targetFolder.' vendor');
        print_r('<h3>Secure deployment...</h3><br />');
        print_r('<h2>Finished deployment</h2>');
}catch(Exception $e){
        print_r($e);
}

?>
