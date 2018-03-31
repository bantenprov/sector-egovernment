# Sector Egovernment

[![Join the chat at https://gitter.im/sector-egovernment/Lobby](https://badges.gitter.im/sector-egovernment/Lobby.svg)](https://gitter.im/sector-egovernment/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/sector-egovernment/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/sector-egovernment/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/sector-egovernment/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/sector-egovernment/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/sector-egovernment/v/stable)](https://packagist.org/packages/bantenprov/sector-egovernment)
[![Total Downloads](https://poser.pugx.org/bantenprov/sector-egovernment/downloads)](https://packagist.org/packages/bantenprov/sector-egovernment)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/sector-egovernment/v/unstable)](https://packagist.org/packages/bantenprov/sector-egovernment)
[![License](https://poser.pugx.org/bantenprov/sector-egovernment/license)](https://packagist.org/packages/bantenprov/sector-egovernment)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/sector-egovernment/d/monthly)](https://packagist.org/packages/bantenprov/sector-egovernment)
[![Daily Downloads](https://poser.pugx.org/bantenprov/sector-egovernment/d/daily)](https://packagist.org/packages/bantenprov/sector-egovernment)

10 Sectors in Indonsian's Egovernment
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
     * Package Service Providers...
     */
    Laravel\Tinker\TinkerServiceProvider::class,
    //....
    Bantenprov\SectorEgovernment\SectorEgovernmentServiceProvider::class,
```

#### Publish vendor :

```bash
$ php artisan vendor:publish --tag=sector-egovernment-seeds
$ php artisan vendor:publish --tag=sector-egovernment-assets
$ php artisan vendor:publish --tag=sector-egovernment-public
```

#### Lakukan auto dump :

```bash
$ composer dump-autoload
```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Lakukan seeding :

```bash
$ php artisan db:seed --class=BantenprovSectorEgovernmentSeeder
```

#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
function layout(name) {
  return function(resolve) {
    require(['./layouts/' + name + '.vue'], resolve);
  }
}

let routes = [
{
    path: '/',
    name: 'home',
    component: resolve => require(['./components/views/Home.vue'], resolve),
  },
 //==...   
  {
    path: '/sector-egovernment/:id',
    name: 'home',
    component: resolve => require(['./components/bantenprov/sector-egovernment/SectorEgovernment.show.vue'], resolve),
    meta: {
        title: "View Sector Egovernment"
    }
  },

  //==..
  {
    path: '/sign-in',
    name: 'sign-in',
    component: resolve => require(['./components/views/SignIn.vue'], resolve),
    meta: {
      title: "Sign in"
    }
  },
```


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
                title: "Sector Egovernment"
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
                title: "Add Sector Egovernment"
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
                title: "View Sector Egovernment"
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
                title: "Edit Sector Egovernment"
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

import SectorEgovernmentList from './components/bantenprov/sector-egovernment/partials/SectorEgovernmentList.vue';
Vue.component('sector-egovernment-list', SectorEgovernmentList);

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
