![Logo](https://repository-images.githubusercontent.com/633114975/460961eb-db77-4f3d-baa7-2877d6f610b6)

    
# TC Kimlik Doğrulama, Sorgulama ve Üretme

<div align="center">
  <a href="https://github.com/emretnrvrd/tckn-php/blob/main/LICENSE"> 
    <img src="https://img.shields.io/badge/License-MIT-green.svg">
  </a>
  <a href="https://github.com/emretnrvrd/tckn-php/blob/main/composer.json"> 
    <img src="https://img.shields.io/badge/Laravel->=9.0-blue">
  </a>
</div>

## Açıklama

TC kimlik numarası için en kapsamlı pakettir. TC kimlik numaralarını algoritmik olarak doğrulamak, API aracılığıyla kimlik bilgilerini sorgulamak ve test amacıyla rastgele TC kimlik numaraları üretme işlevlerini içerir.

## İlişkili Projeler

Bu dökümantasyonda sadece laravel ile ilgili kısım anlatılmıştır. Eğer Laravel kullanmıyorsanız veya daha detaylı bilgiler için kaynak paket olan <b>[PHP - TCKN](https://github.com/emretnrvrd/tckn-php)</b> paketine gözatabilirsiniz.
  
## Kurulum 

```bash 
  composer require emretnrvrd/tckn-laravel
```
    

## Opsiyonel Ayarlar 

#### Hariç Tutulmak İstenen Tc kimlik Numaraları

Bazı durumlarda Tc kimlik numaralarını bu doğrulamadan hariç tutmak isteyebilirsiniz. Bunun için öncelikle aşağıdaki komutu çalıştırarak config dosyasını publish etmeniz gerekmektedir.

```bash 
  php artisan vendor:publish --provider="Emretnrvrd\TcknLaravel\Providers\TcknServiceProvider" --tag="config"
```

<i><b>config</b></i> klasörünün altında <i><b>tckn.php</b></i> oluşacaktır. Bu dosyada bulunan <i><b>expected_ids</b></i> kısmına girdiğiniz her numara doğrulamadan hariç tutulacaktır. Örnek dosya şu şekildedir;

```php 
  <?php

return [
    /*
    |--------------------------------------------------------------------------
    | Hariç Tutulan TC Kimlik Numaraları
    |--------------------------------------------------------------------------
    |
    | E-Fatura gibi bazı resmi işlem durumlarında TC Kimlik Numara bilgisi istenmektedir.
    | Fakat bu resmi olarak zorunlu tutulmamaktadır. TC Kimlik Numarası
    | paylaşılmak istenmediği durumlarda "11111111111" olarak sisteme girilmelidir.
    | Bu gibi durumlarda doğrulamadan başarılı olarak geçmesini istediğiniz
    | veya test etmek amacıyla hariç tutmak istediğiniz TC Kimlik Numaralarını
    | aşağıda bulunan "expected_ids" ekleyebilirsiniz.
    |
    */

    "expected_ids" => [
        // "11111111111"
    ]
];
```
#### Hata Mesajlarını Özelleştirme Veya Birden Fazla Dilde Kullanma 

Hata mesajlarını değiştirmek veya birden fazla dil kullandığınız senaryoda müdahale etmek isterseniz lang dosyalarını aşağıdaki gibi publish etmelisiniz.

```bash 
  php artisan vendor:publish --provider="Emretnrvrd\TcknLaravel\Providers\TcknServiceProvider" --tag="lang"
```
Aşağıdaki gibi <i><b>lang</b></i> klasörünün altına dosyalar eklenmiş olacaktır. Buradaki varsayılan hata mesajlarını değiştirerek yada yeni dil dosyaları oluşturarak özelleştirebilirsiniz.

```bash 

  .
  ├── ...
  ├── lang
  │   ├── vendor
  │       ├── tckn-laravel
  │           ├── en
  │               ├── validation.php
  │           ├── tr
  │               ├── validation.php
  └── ...

```

## Kullanım
Bu kısımda sadece laravel ile ilgili kısım için kullanım örneği bulunmaktadır. Detaylı kullanım için <b>[PHP - TCKN](https://github.com/emretnrvrd/tckn-php)</b> paketine gözatabilirsiniz
<br>

```bash 
  public function index(Request $request){
  
      $validator = Validator::make($request->all(), [
          'tc_verification_number' => "tckn",
      ]);
      
  }
  
  /*----- YADA ------*/
  
  use Emretnrvrd\TcknLaravel\Rules\TcknValidationRule;

  public function index(Request $request){
  
      $validator = Validator::make($request->all(), [
          'tc_verification_number' => [new TcknValidationRule],
      ]);
      
  }
  
  
```


## Lisans

[MIT](https://github.com/emretnrvrd/tckn-php/blob/main/LICENSE)

  
## Geri Bildirim

Herhangi bir geri bildiriminiz varsa, bana emretanriverdi28@gmail.com yada [@emretnrvrdi](https://twitter.com/emretnrvrdi) twitter adresinden bana ulaşabilirsiniz.

  
