<?php
namespace Deployer;

require 'recipe/statamic.php';

set('application', 'MerilynTohv-final-TA22');
set('remote_user', 'virt118419');
set('http_user', 'virt118419');
set('keep_releases', 2);

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

host('ta22tohv.itmajakas.ee')
    ->setHostname('ta22tohv.itmajakas.ee')
    ->set('http_user', 'virt118419')
    ->set('deploy_path', '~/domeenid/www.ta22tohv.itmajakas.ee/ttkgrupp')
    ->set('branch', 'master');

set('repository', 'git@github.com:merilyntohv/MerilynTohv-final-TA22.git');

//tasks
task('opcache:clear', function () {
    run('killall php82-cgi || true');
})->desc('Clear opcache');

task('build:node', function (){
    cd('{{release_path}}');
    run('npm i');
    run('npx vite build');
    run('rm -rf node_modules');
});

task('deploy',[
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'build:node',
    'deploy:publish',
    'opcache:clear',
    'artisan:cache:clear'
]);

// Hosts

after('deploy:failed', 'deploy:unlock');
