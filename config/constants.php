<?php

return [

'admin_folder' => define('ADMIN_FOLDER','admin'),

'admin_url' => define('ADMIN_URL',url(ADMIN_FOLDER)),
//'static_public_url' => define('STATIC_PUBLIC_URL',BASE_URL),


'paginate_limit' => define('PAGINATE_LIMIT',20),

'ADMIN_CONTACT_MAIL' => 'ankita@adglobal360.com',

'ADMIN_SENDER' => [
                'email' => 'ankita@adglobal360.com',
                'name' => 'Team',
    ], 


'CONS_STATUS_ARRAY' => [               
                '1' => 'Active',
                '2' => 'Inactive',
                
    ], 

    'CONS_MAINCATEGORY_ARRAY' => [
                '1' => 'Existing Products',
                '2' => ' Pipeline Products',
    ],  

  'CONS_BANNER_TYPE_ARRAY' => [
        'HomePage' => 'HomePage',
        
              
    ],  

'CONS_THERAPEUTIC_IDS_ARRAY' => [               
               '0' => '',
               '1' => 'VET',
                '2' => 'PET',
                '3' => 'POULTRY',
    ],   


    'CONS_VETERINARY_CATEGORY_ARRAY' => [  
                'VET' => 'VET',
                'PET' => 'PET',
                'POULTRY' => 'POULTRY',
    ], 



'CONS_FAQ_TYPE_ARRAY' => [
                'General' => 'General',                
                
    ],

'CONS_RATING_ARRAY' => [
            '5' => '5 Star',
            '4' => '4 Star',
            '3' => '3 Star',
            '2' => '2 Star',
            '1' => '1 Star',
            
    ],


 'CONS_SOCIALWALLS_TYPE_ARRAY' => [
            'Facebook' => 'Facebook',
            'Instagram' => 'Instagram',
            'Twitter' => 'Twitter',         
            
    ],


 'CONS_FORMAT_TYPE_ARRAY' => [
            'image' => 'Image',
            'video' => 'Video',                   
            
    ],

'CONS_YES_NO_ARRAY' => [
            'No' => 'No',
            'Yes' => 'Yes',                   
            
    ],

  'CONS_CONTACT_TYPE_ARRAY' => [
                'ContactPage' => 'ContactPage',
                'MankindAlumni' => 'MankindAlumni',
                 
                
                
    ],

'CONS_CONTACT_STATUS_ARRAY' => [
                'Active' => 'Active',
                'Inactive' => 'Inactive',
    ],  

// Config::get('constants.CONS_STOCK_TYPE_ARRAY') sample code call
];