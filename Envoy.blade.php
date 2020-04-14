@servers(['web' => 'deployer@stg.dapen.perhutani.id -p 2212'])

@setup
    $repository = 'git@gitlab.com:kantor-pusat/dapen.git';
    $releases_dir = '/home/deployer/stg/stg.dapen.perhutani.id/web/releases';
    $app_dir = '/home/deployer/stg/stg.dapen.perhutani.id/web';
    $current_dir = '/home/deployer/stg/stg.dapen.perhutani.id/web/current';
    $release = date('YmdHis');
    $new_release_dir = $releases_dir .'/'. $release;
@endsetup

@story('deploy')
    backup
    clone_repository
    linking_vendor
    run_composer
    update_symlinks
    migrate
    clear_cache
@endstory

@task('backup')
    rm -rf /home/deployer/stg/stg.dapen.perhutani.id/web/backups/codebase/*
    mv {{ $releases_dir }}/* /home/deployer/stg/stg.dapen.perhutani.id/web/backups/codebase
@endtask

@task('clone_repository')
    echo 'Cloning repository'
    [ -d {{ $releases_dir }} ] || mkdir {{ $releases_dir }}
    git clone -b develop --depth 1 {{ $repository }} {{ $new_release_dir }}
@endtask

@task('linking_vendor')
    echo "Linking vendor directory"
    rm -rf {{ $new_release_dir }}/storage
    ln -nfs {{ $app_dir }}/vendor {{ $new_release_dir }}/vendor
@endtask

@task('run_composer')
    echo "Starting deployment ({{ $release }})"
    cd {{ $new_release_dir }}
    composer install --ignore-platform-reqs --no-scripts -q -o
@endtask

@task('update_symlinks')
    echo "Linking storage directory"
    rm -rf {{ $new_release_dir }}/storage
    ln -nfs {{ $app_dir }}/storage {{ $new_release_dir }}/storage

    echo 'Linking .env file'
    ln -nfs {{ $app_dir }}/.env {{ $new_release_dir }}/.env

    echo 'Linking current release ln -nfs {{ $new_release_dir }} {{ $app_dir }}/current'
    ln -nfs {{ $new_release_dir }} {{ $app_dir }}/current
@endtask

@task('migrate')
    cd {{ $current_dir }}
    php artisan migrate
@endtask

@task('clear_cache')
    echo "rebuild symlink & clearing cache"
    cd {{ $current_dir }}
    php artisan storage:link
    php artisan cache:clear
    php artisan config:clear
    sudo chmod -R ug+rwx storage bootstrap/cache
@endtask
