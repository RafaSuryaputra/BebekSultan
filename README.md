## Panduan Deployment Aplikasi

### 1. Siapkan tools untuk menyiapkan server web, ada beberapa tools yang bisa digunakan:
- [XAMPP](https://www.apachefriends.org/)
- [Laragon](https://laragon.org/)
- [MAMP](https://www.mamp.info/en/mamp/windows/)
- [EasyPHP](https://www.easyphp.org/)
- [Winginx](https://winginx.com/en/)
- [WAMPServer](https://sourceforge.net/projects/wampserver/files/)

### 2. Tools lainnya
- [IDE Visual Studio Code](https://code.visualstudio.com/download) (opsional ada IDE alternatif lain)
- [Composer](https://getcomposer.org/download/)
- [NodeJS](https://nodejs.org/en/download/current) (opsional)

> PHP version: 8.1, MySQL: 8.0.30

### 3. Install dan Update dependencies Composer
bash
composer update

bash
composer install

> *Note:* Penting untuk dicatat bahwa sebelum mengkloning proyek Laravel, langkah awal yang harus dilakukan adalah menjalankan perintah composer update diikuti oleh composer install. Ini penting karena proses composer update memperbarui versi dependensi ke versi terbaru yang kompatibel dengan proyek saat ini. Setelah itu, composer install akan menginstal semua dependensi yang diperlukan berdasarkan versi yang telah diperbarui. Dengan demikian, proses ini memastikan bahwa proyek akan berjalan dengan lancar dan menghindari masalah kompatibilitas dengan versi dependensi yang lebih lama.

### 4. Generate App Key
bash
php artisan key:generate

> *Note:* 
Langkah ini sangat penting pada saat deployment karena perintah php artisan key:generate menghasilkan kunci aplikasi yang penting untuk keamanan Laravel. Kunci ini digunakan untuk enkripsi cookie dan sesi, sehingga sangat vital untuk menjaga keamanan aplikasi. Tanpa kunci yang dihasilkan, aplikasi mungkin menjadi rentan terhadap serangan keamanan. Sehingga, menjalankan perintah ini pada tahap deployment sangatlah penting untuk memastikan bahwa kunci aplikasi yang unik dan aman telah digenerate.

### 5. Konfigurasi .env aplikasi 
Atur konfigurasi aplikasi, seperti nama database, Api key Third Party dan sebagainya, yang tersimpan dalam file .env.
Contoh:  DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD, DB_PORT
> *Note:* Jika .env tidak ada maka buat file dengan nama .env pada top level lalu gunakan isi .env.example untuk konfigurasi default

### 6. Melakukan Migration Database
bash
php artisan migrate 


### 7. Create Symbolic link

Digunakan untuk membuat tautan simbolis antara direktori publik dengan penyimpanan file pribadi.

bash
php artisan link:storage


### 8. Kompilasi dan Persiapan Aplikasi 

> *Note:* Jika dalam proses pemgembangan
npm run dev biasanya digunakan untuk memulai proses pengembangan (development process). Ini akan mengaktifkan alur kerja pengembangan lokal yang memungkinkan Anda untuk mengedit file CSS dan JavaScript Anda dengan cepat dan melihat perubahan secara langsung dalam browser anda tanpa perlu membangun ulang secara manual setiap kali terjadi perubahan.
bash
npm run dev


>*Note:* Ketika aplikasi Anda siap untuk produksi,

npm run build digunakan untuk membangun aplikasi web dengan mengkompilasi kode sumbernya ke dalam format yang lebih efisien dan siap untuk dideploy ke lingkungan produksi. Ini termasuk penggabungan file, minifikasi kode, dan optimisasi lainnya untuk meningkatkan kinerja dan mengurangi ukuran file.

bash
npm run build


>*Note:* Jika dalam mode Production
npm run production adalah perintah yang digunakan untuk membangun aplikasi dalam mode produksi. Ini berarti bahwa alat penyiapan seperti Webpack akan mengoptimalkan aset dan mengonfigurasi aplikasi agar siap untuk digunakan di lingkungan produksi. Hasilnya adalah versi aplikasi yang dioptimalkan untuk kinerja dan efisiensi maksimal saat dijalankan dalam lingkungan produksi. Proses ini memastikan bahwa aplikasi siap untuk dideploy ke server produksi setelah menjalankan npm run production.

### 8. Run App

bash
php artisan serve
