<?php

/**
 * UML diyagramında yer alan Form sınıfını oluşturmanız beklenmekte.
 * 
 * Sınıf içerisinde static olmayan `fields`, `action` ve `method`
 * özellikleri (property) olması gerekiyor.
 * 
 * Sınıf içerisinde static olan ve Form nesnesi döndüren `createPostForm`,
 * `createGetForm` ve `createForm` methodları bulunmalı. Bu metodlar isminde de
 * belirtilen metodlarda Form nesneleri oluşturmalı.
 * 
 * Sınıf içerisinde bir "private" başlatıcı (constructor) bulunmalı. Bu başlatıcı
 * içerisinden `action` ve `method` değerleri alınıp ilgili property'lere değerleri
 * aktarılmalıdır.
 * 
 * Sınıf içerisinde static "olmayan" aşağıdaki metodlar bulunmalıdır.
 *   - `addField` metodu `fields` property dizisine değer eklemelidir.
 *   - `setMethod` metodu `method` propertysinin değerini değiştirmelidir.
 *   - `render` metodu form'un ilgili alanlarını HTML çıktı olarak verip bir buton çıktıya eklemelidir.
 * 
 * Sonuç ekran görüntüsüne `result.png` dosyasından veya `result.html` dosyasından ulaşabilirsiniz.
 * `app.php` çalıştırıldığında `result.html` ile aynı çıktıyı verecek şekilde geliştirme yapmalısınız.
 * 
 * > **Not: İsteyenler `app2.php` ve `form2.php` isminde dosyalar oluşturup sınıfa farklı özellikler kazandırabilir.
 */
class Form
{//sınıf özellikleri 
 
  private string $action;
  private string $method;
  public $fields = array();

  private function __construct(string $action,string $method){//action ve method değerleri atandı
    $this->action = $action;
    $this->method = $method;
  }
    
   public static function createForm(string $action,string $method): Form{//dışardan gelen metoda göre nesne oluştur
     return new static($action,$method);
   }
   public static function createGetForm(string $action): Form{
     return new static($action,"GET");
   }
   public static function createPostForm(string $action): Form{
      return new static($action,"POST");
   }
   public function addFields($fields) : void {
            $this->fields[] = $fields;
   }
   public function setMethod(string $method): void{//method değişkeninin değeri değiştirildi
     $this->method=$method;
   }
   public function render(): void{
     echo "<form method = '". $this->method."' action = '". $this->action."'";
      
     foreach ($this->fields as $field) {
       echo "<label for='".$field["name"]." '>".$field["label"]."</label>";
       echo "<input type='text' name='".$field["name"]." ' value='".$field["defaultValue"]."'/>";
     }
        echo "<button type='submit'>Gönder</button>";
        echo "</form>";
    }
}
