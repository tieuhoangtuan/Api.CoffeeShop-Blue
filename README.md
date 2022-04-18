# 🔥 Hướng dẫn cài đặt Api.CoffeeShop-Blue 🔥

## 👌Prerequisites 

- [Cài đặt XAMPP](https://www.apachefriends.org/download.html).
- [Cài đặt Composer](https://getcomposer.org/).

## 💪Cài đặt Api.CoffeeShop-Blue 

- Mở XAMP Control panel và start [apache] và [mysql].
- Tạo cơ sở dữ liệu trên MySQL.
- Tải project hoặc clone project về máy.
- Mở folder Api.CoffeeShop-Blue trên IDE.
- Đổi tên file “.env.example” thành “.env”.
- Điền thông tin biến ``DB_DATABASE`` bằng tên cơ sở dữ liệu vừa mới tạo và thông tin ``DB_USERNAME``, ``DB_PASSWORD`` nếu có. 
- Đặt ``COFFEE_IMAGE_PATH`` là đường dẫn đến folder ``public\images\coffees\`` thuộc folder CoffeeShop-Blue.
- Mở terminal và cd đến folder Api.CoffeeShop-Blue.
- Trên terminal gõ lệnh:
    + php artisan key:generate
    + Composer require laravel/passport
    + php artisan migrate
    + php artisan passport:install
- Sau khi hoàn tất, gõ lệnh php artisan serve để start sever.
-----
## 👉 Sau khi cài đặt Api.CoffeeShop-Blue, tải hoặc clone source chính CoffeeShop-Blue tại [link](https://github.com/ManTT-12/CoffeeShop-Blue) này.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
