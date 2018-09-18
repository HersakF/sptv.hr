<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => 'Polje mora biti prihvaćeno.',
    'active_url'           => 'Polje nije ispravan URL.',
    'after'                => 'Polje mora biti datum nakon :date.',
    'after_or_equal'       => 'The must be a date after or equal to :date.',
    'alpha'                => 'Polje smije sadržavati samo slova.',
    'alpha_dash'           => 'Polje smije sadržavati samo slova, brojeve i crtice.',
    'alpha_num'            => 'Polje smije sadržavati samo slova i brojeve.',
    'array'                => 'Polje mora biti niz.',
    'before'               => 'Polje mora biti datum prije :date.',
    'before_or_equal'      => 'The must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'Polje mora biti između :min - :max.',
        'file'    => 'Polje mora biti između :min - :max kilobajta.',
        'string'  => 'Polje mora biti između :min - :max znakova.',
        'array'   => 'Polje mora imati između :min - :max stavki.',
    ],
    'boolean'              => 'Polje mora biti false ili true.',
    'confirmed'            => 'Lozinke se ne podudaraju.',
    'date'                 => 'Polje nije ispravan datum.',
    'date_format'          => 'Polje ne podudara s formatom :format.',
    'different'            => 'Polja moraju biti različita.',
    'digits'               => 'Polje mora sadržavati :digits znamenki.',
    'digits_between'       => 'Polje mora imati između :min i :max znamenki.',
    'dimensions'           => 'The has invalid image dimensions.',
    'distinct'             => 'The field has a duplicate value.',
    'email'                => 'Polje mora biti ispravna e-mail adresa.',
    'exists'               => 'Odabrano polje nije ispravno.',
    'file'                 => 'Morate odabrafi datoteku.',
    'filled'               => 'Potrebno je ispuniti polje.',
    'image'                => 'Polje mora biti slika.',
    'in'                   => 'Odabrano polje nije ispravno.',
    'in_array'             => 'The field does not exist in :other.',
    'integer'              => 'Polje mora biti broj.',
    'ip'                   => 'Polje mora biti ispravna IP adresa.',
    'json'                 => 'The must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'Polje mora biti manje od :max.',
        'file'    => 'Polje mora biti manje od :max kilobajta.',
        'string'  => 'Polje mora sadržavati manje od :max znakova.',
        'array'   => 'Polje ne smije imati više od :max stavki.',
    ],
    'mimes'                => 'Polje mora biti datoteka tipa: :values.',
    'mimetypes'            => 'Polje mora biti datoteka tipa: :values.',
    'min'                  => [
        'numeric' => 'Polje mora biti najmanje :min.',
        'file'    => 'Polje mora biti najmanje :min kilobajta.',
        'string'  => 'Polje mora sadržavati najmanje :min znakova.',
        'array'   => 'Polje mora sadržavati najmanje :min stavki.',
    ],
    'not_in'               => 'Odabrano polje nije ispravno.',
    'numeric'              => 'Vrijednost polja treba biti broj.',
    'present'              => 'The field must be present.',
    'regex'                => 'Polje se ne podudara s formatom.',
    'required'             => 'Molimo ispunite polja.',
    'required_if'          => 'Polje je obavezno kada polje :other sadrži :value.',
    'required_unless'      => 'The field is required unless :other is in :values.',
    'required_with'        => 'Polje je obavezno kada postoji polje :values.',
    'required_with_all'    => 'Polje je obavezno kada postje polja :values.',
    'required_without'     => 'Polje je obavezno kada ne postoji polje :values.',
    'required_without_all' => 'Polje je obavezno kada nijedno od polja :values ne postoji.',
    'same'                 => 'Polja i :other se moraju podudarati.',
    'size'                 => [
        'numeric' => 'Polje mora biti :size.',
        'file'    => 'Polje mora biti :size kilobajta.',
        'string'  => 'Polje mora biti :size znakova.',
        'array'   => 'Polje mora sadržavati :size stavki.',
    ],
    'string'               => 'Vrijednost mora biti tekstualnog oblika.',
    'timezone'             => 'Neispravna vremenska zona.',
    'unique'               => 'Postoji korisnik sa istom e-mail adresom.',
    'uploaded'             => 'Došlo je do pogreške prilikom prijenosa datoteke.',
    'url'                  => 'Polje nije ispravnog formata.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'           => [
        //
    ],

];
