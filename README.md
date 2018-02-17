# Sector E-Government

4 Sectors Indonesian's E-Government
- G2G Goverment to Goverment
- G2E Goverment to Employee
- G2C Goverment to Citizen
- G2B Goverment to Business

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
~~~
bash
$ git clone https://github.com/bantenprov/sector-egovernment.git
~~~

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


#### Lakukan publish assets :

```bash
$ php artisan vendor:publish --tag=sector-egovernment-assets
```

#### Lakukan publish json file :

```bash
$ php artisan vendor:publish --tag=sector-egovernment-public
```


#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Publish database seeder :

```bash
$ php artisan vendor:publish --tag=sector-egovernment-seeds
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
#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript


  {
    path: '/dashboard/sector-egovernment',
    components: {
      main: resolve => require(['./components/views/bantenprov/sector-egovernment/DashboardSectorGovernment.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Sector Egoverment"
    }
  }

//==
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

    	//===
        {
          name: 'Sector Government',
          link: '/dashboard/sector-egovernment',
          icon: 'fa fa-angle-double-right'
        }

        //== ...
        {
            name: 'Sector Government',
            link: '/admin/sector-egovernment',
            icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},

#### Tambahkan components resources/assets/js/components.js :

~~~javasript

import SectorGovernment from './components/bantenprov/sector-government/SectorGovernment.chart.vue';
Vue.component('echarts-sector-government', SectorGovernment);

import SectorGovernmentKota from './components/bantenprov/sector-government/SectorGovernmentKota.chart.vue';
Vue.component('echarts-sector-government-kota', SectorGovernmentKota);

import SectorGovernmentTahun from './components/bantenprov/sector-government/SectorGovernmentTahun.chart.vue';
Vue.component('echarts-sector-government-tahun', SectorGovernmentTahun);

import SectorGovernmentAdminShow from './components/bantenprov/sector-government/SectorGovernmentAdmin.show.vue';
Vue.component('admin-view-sector-government-tahun', SectorGovernmentAdminShow);

//== Echarts Angka Partisipasi Kasar

import SectorGovernmentBar01 from './components/views/bantenprov/sector-government/SectorGovernmentBar01.vue';
Vue.component('sector-government-bar-01', SectorGovernmentBar01);

import SectorGovernmentBar02 from './components/views/bantenprov/sector-government/SectorGovernmentBar02.vue';
Vue.component('sector-government-bar-02', SectorGovernmentBar02);

//== mini bar charts
import SectorGovernmentBar03 from './components/views/bantenprov/sector-government/SectorGovernmentBar03.vue';
Vue.component('sector-government-bar-03', SectorGovernmentBar03);

import SectorGovernmentPie01 from './components/views/bantenprov/sector-government/SectorGovernmentPie01.vue';
Vue.component('sector-government-pie-01', SectorGovernmentPie01);

import SectorGovernmentPie02 from './components/views/bantenprov/sector-government/SectorGovernmentPie02.vue';
Vue.component('sector-government-pie-02', SectorGovernmentPie02);

//== mini pie charts
import SectorGovernmentPie03 from './components/views/bantenprov/sector-government/SectorGovernmentPie03.vue';
Vue.component('sector-government-pie-03', SectorGovernmentPie03);

~~~
