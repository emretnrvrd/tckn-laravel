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
