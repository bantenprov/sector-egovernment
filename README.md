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

#### Lakukan auto dump :

```bash
$ composer dump-autoload
```

#### Lakukan seeding :

```bash
$ php artisan db:seed --class=BantenprovSectorEgovernmentSeeder
```

#### Lakukan publish component vue :

```bash
$ php artisan vendor:publish --tag=sector-egovernment-assets
$ php artisan vendor:publish --tag=sector-egovernment-public
```
#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
    path: '/dashboard',
    redirect: '/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/dashboard/sector-egovernment',
            components: {
                main: resolve => require(['./components/views/bantenprov/sector-egovernment/DashboardSectorEgovernment.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Sector Egovernment"
            }
        },
        //== ...
    ]
},
```

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
                main: resolve => require(['./components/bantenprov/sector-egovernment/SectorEgovernment.index.vue'], resolve),
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
                main: resolve => require(['./components/bantenprov/sector-egovernment/SectorEgovernment.add.vue'], resolve),
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
                main: resolve => require(['./components/bantenprov/sector-egovernment/SectorEgovernment.show.vue'], resolve),
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
                main: resolve => require(['./components/bantenprov/sector-egovernment/SectorEgovernment.edit.vue'], resolve),
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
    name: 'Dashboard',
    icon: 'fa fa-dashboard',
    childType: 'collapse',
    childItem: [
        //== ...
        {
            name: 'Sector Egovernment',
            link: '/dashboard/sector-egovernment',
            icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
            name: 'Sector Egovernment',
            link: '/admin/sector-egovernment',
            icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript
import SectorEgovernment from './components/bantenprov/sector-egovernment/SectorEgovernment.chart.vue';
Vue.component('echarts-sector-egovernment', SectorEgovernment);

import SectorEgovernmentKota from './components/bantenprov/sector-egovernment/SectorEgovernmentKota.chart.vue';
Vue.component('echarts-sector-egovernment-kota', SectorEgovernmentKota);

import SectorEgovernmentTahun from './components/bantenprov/sector-egovernment/SectorEgovernmentTahun.chart.vue';
Vue.component('echarts-sector-egovernment-tahun', SectorEgovernmentTahun);

import SectorEgovernmentAdminShow from './components/bantenprov/sector-egovernment/SectorEgovernmentAdmin.show.vue';
Vue.component('admin-view-sector-egovernment-tahun', SectorEgovernmentAdminShow);

//== Echarts Angka Partisipasi Kasar

import SectorEgovernmentBar01 from './components/views/bantenprov/sector-egovernment/SectorEgovernmentBar01.vue';
Vue.component('sector-egovernment-bar-01', SectorEgovernmentBar01);

import SectorEgovernmentBar02 from './components/views/bantenprov/sector-egovernment/SectorEgovernmentBar02.vue';
Vue.component('sector-egovernment-bar-02', SectorEgovernmentBar02);

//== mini bar charts
import SectorEgovernmentBar03 from './components/views/bantenprov/sector-egovernment/SectorEgovernmentBar03.vue';
Vue.component('sector-egovernment-bar-03', SectorEgovernmentBar03);

import SectorEgovernmentPie01 from './components/views/bantenprov/sector-egovernment/SectorEgovernmentPie01.vue';
Vue.component('sector-egovernment-pie-01', SectorEgovernmentPie01);

import SectorEgovernmentPie02 from './components/views/bantenprov/sector-egovernment/SectorEgovernmentPie02.vue';
Vue.component('sector-egovernment-pie-02', SectorEgovernmentPie02);

//== mini pie charts
import SectorEgovernmentPie03 from './components/views/bantenprov/sector-egovernment/SectorEgovernmentPie03.vue';
Vue.component('sector-egovernment-pie-03', SectorEgovernmentPie03);
```
