
# Verde Techonology Case 

Bu case üzerinde öncelikli olarak çalışmalarıma migration oluşturarak başladım. Migration oluştururken veritabanı hızlı sorgulama için ise gerekli kolonlara index atadım. Sonrasında resource Controllerlar oluşturdum. Bunlar products,offers ve orders içindi. Sonrasında ilgili controller'ların modellerini oluşturdum. Ardından "https://jwt-auth.readthedocs.io/en/develop/laravel-installation/" adresinden her zaman kullandığım jwt token mantığını kurdum. Bir kullanıcı ekledim ve login route'larını oluşturdum. Login işlemlerini gerçekleştirdikten sonra, controller'ı yazmaya başladım. Burada adaptor paterndesign kullanmak istedim ve Http altında Services adında bir klasör oluşturdum. Bu klasör içerisinde ise interfaces ve repository klasörleri oluşturup, ilgili dosyaların kurulumunu gerçekleştirdim. Burada amacım veritabanı işlemlerini ve diğer yapılabilecek işlemlerin tek bir kısımda yapılmasıydı. Sonrasında request ve resource mantığını kullanarak api ile gelecek olan verilerin validasyonu ve geri dönüşleri için products,offers ve orders için dosyalarımı oluşturdum ve controller için crud işlemlerini gerçekleştirdim. Ardından taskın 3. maddesi olan job kısmını yaptım. Burada gene products,offers ve orders için joblar ve command oluşturmasını gerçekleştirdim. Kernel dosyasında ise istenilen özelliklere göre bir listeleme yaptım. Ardıdan projeyi indirenlerin kullanabilmesi adına basic bir user seed tanımladım. 

Note ! 
 Task için yalnızca rate limit ayarlaması kısmını yapamadım!

## Local kurulumu

Projeyi İndirme  

~~~bash  
  git clone https://github.com/tunakdu/verde_technology_case.git
~~~

Projenin klasörüne giriş  

~~~bash  
  cd verde_technology_case
~~~

Bağımlılıkların yüklenmesi 

~~~bash  
composer install
~~~

Env Dosyasının Değiştirilmesi 

~~~bash  
rename .env.example / .env
~~~

Sail ile docker kurulumu  

~~~bash  
./vendor/bin/sail up
~~~

Migrationların çalıştırılması

~~~bash  
sail artisan migrate
~~~

Admin user oluşturulması

~~~bash  
sail artisan db:seed
~~~

Postman Link

~~~bash  
https://www.postman.com/tunakdu/workspace/verde-teknology-task
~~~


Product için komut 

~~~bash  
sail artisan api:product-data-command
~~~

Offer için komut 

~~~bash  
sail artisan api:offer-data-command
~~~

Order için komut 

~~~bash  
sail artisan api:order-data-command
~~~
