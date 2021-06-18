# FindART

<p align="center"><img src="./src/assets/img/findart_logo.png"></p>

Aplikasi berbasi web untuk mencari ART dan pekerjaan ART. 

## Requirements
1. PHP >= 5.4
2. MariaDb/Mysql
3. Apache

## Instalasi

1. Clone repository
	- path/to/webserver/root> `git clone https://github.com/Lucky7Tb/FindART.git findart`
2. Konfigurasi database.
	 - Import database `src->database->find_art.sql`
   - Konfigurasi database untuk aplikasi `src->config->db.php`
   - Konfigurasi baseUrl di `src->config->app.php` dan `src->assets->js->app.js` menjadi `http://localhost/findart`
3. Jalankan webserver.
4. Buka di browser 'http://localhost/findart'
5. Selesai
