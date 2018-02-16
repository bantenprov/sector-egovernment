# Sector E-Government

10 Sectors in Indonsian's E-Government
- Sektor Sarana dan Prasarana
- Sektor Pemerintahan
- Sektor Pembangunan
- Sektor Pelayanan
- Sektor Legislatif
- Sektor Kewilayahan
- Sektor Keuangan
- Sektor Kepegawaian
- Sektor Kemasyarakatan
- Sektor Administrasi dan Manajemen

### Install via composer

- Development snapshot
```bash

$ composer require bantenprov/sector-egovernment:dev-master
```
- Latest release:

```bash
$ composer require bantenprov/sector-egovernment
```

### Download via github

```bash
$ git clone https://github.com/bantenprov/sector-egovernment.git
```

#### Edit `config/app.php` :

```php
'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\SectorEgovernment\SectorEgovernmentServiceProvider::class,

```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Publish database seeder :

```bash
$ php artisan vendor:publish --tag=sector-egovernment-seeds
```

Jika untuk update

```bash
$ php artisan vendor:publish --tag=sector-egovernment-seeds --force
```

#### Lakukan Auto Dump :

```bash
$ composer dump-autoload
```

#### Lakukan Seeding :

```bash
$ php artisan db:seed --class=Bantenprov_SectorEgovernmentSeeder
```

#### Lakukan publish component vue :

```bash
$ php artisan vendor:publish --tag=sector-egovernment-assets
```

Jika untuk update

```bash
$ php artisan vendor:publish --tag=sector-egovernment-assets --force
```

#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
    path: '/admin',
    redirect: '/admin/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/admin/sector-egovernment',
            components: {
                main: resolve => require(['./components/bantenprov/sector-egovernment/index.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Sector Government"
            }
        },
        {
            path: '/admin/sector-egovernment/create',
            components: {
                main: resolve => require(['./components/bantenprov/sector-egovernment/create.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Add Sector Government"
            }
        },
        {
            path: '/admin/sector-egovernment/:id',
            components: {
                main: resolve => require(['./components/bantenprov/sector-egovernment/show.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "View Sector Government"
            }
        },
        {
            path: '/admin/sector-egovernment/:id/edit',
            components: {
                main: resolve => require(['./components/bantenprov/sector-egovernment/edit.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Edit Sector Government"
            }
        },
        //== ...
    ]
},

```

#### Edit menu `resources/assets/js/menu.js`

```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
            name: 'Sector Government',
            link: '/admin/sector-egovernment',
            icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
