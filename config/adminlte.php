<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'title' => 'Admin Panel',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */
//img-circle
    'logo' => '<b>Admin </b> ',
    'logo_img' => 'vendor/adminlte/dist/img/adminlogo.png',
    'logo_img_class' => 'brand-image  elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'bg-gradient-dark',
    'classes_auth_header' => '',
    'classes_auth_body' => 'bg-gradient-dark',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'text-light',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => false,
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'menu' => [
        [
            'text' => 'search',
            'search' => false,
            'topnav' => false,
        ],
        /*[
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],*/
        [
            'text'        => 'Dashboard',
            'url'         => '/home',
            'icon'        => 'far fa-fw fa fa-home',
            'label_color' => 'success',
        ],
        
        [
            'text'        => 'pages',
            'url'         => 'admin/listPage',
            'icon'        => 'far fa-fw fa-file',
//            'submenu'     => [
//                [
//                    'text' => 'Add Page',
//                    'url'  => 'admin/addPage',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Page',
//                    'url'   => 'admin/listPage',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
            'label_color' => 'success',
        ],
        [
            'text'        => 'Home Page Sections',
            'url'         => 'admin/Banner',
            'icon'        => 'far fa-fw fa fa-home',
            'submenu'     => [
                
                [
                    'text' => 'Banner Section',
                    'url'   => 'admin/listBanner',
                    'icon' => 'far fa-fw fa-address-card',
                ],
//                [
//                    'text' => ' Window & Door Section',
//                    'url'   => 'admin/list',
//                    'icon' => 'far fa-fw fa fa-window-restore',
//                ],  
//                [
//                    'text' => 'What`s New Section',
//                    'url'   => 'admin/listFenestaWorld',
//                    'icon' => 'far fa-fw fa fa-globe',
//                ],
//                 [
//                    'text' => 'Images Gallery Section',
//                    'url'   => 'admin/listGalleryImages',
//                    'icon' => 'far fa-fw fa fa-image',
//                ],
              
                [
                    'text' => 'End-to-end Solutions',
                    'url'   => 'admin/endtoend/list/1',
                    'icon' => 'far fa-fw fa fa-tasks',
                ],
                [
                    'text' => 'Durable safe services',
                    'url'   => 'admin/endtoend/list/2',
                    'icon' => 'far fa-fw fa fa-tasks',
                ],
//                [
//                    'text' => 'Partner Showroom',
//                    'url'   => 'admin/partnerShowroom',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
            ],
            'label_color' => 'success',
        ],
        [
            'text'        => 'About Fenesta & DCM',
            'url'         => 'admin/aboutfenesta',
            'icon'        => 'far fa-fw fa fa-home',
            'submenu'     => [
                
                [
                    'text' => 'About Fenesta',
                    'url'   => 'admin/aboutfenesta',
                    'icon' => 'far fa-fw fa-address-card',
                ],
                [
                    'text' => 'Our Infrastructure',
                    'url'   => 'admin/ourinfrastructure',
                    'icon' => 'far fa-fw fa fa-list',
                ],
                [
                    'text' => 'Our Values',
                    'url'   => 'admin/ourvalues',
                    'icon' => 'far fa-fw fa fa-globe',
                ],
                [
                    'text' => 'Our Leadership',
                    'url'   => 'admin/ourleadership',
                    'icon' => 'far fa-fw fa fa-users',
                ],
                [
                    'text' => 'Business Portfolio',
                    'url'   => 'admin/businessportfolio',
                    'icon' => 'far fa-fw fa fa-globe',
                ],
                [
                    'text' => 'Life @ Fenesta',
                    'url'   => 'admin/lifefenesta',
                    'icon' => 'far fa-fw fa fa-globe',
                ],
            ],
            'label_color' => 'success',
        ],
//        [
//            'text'        => 'Banner Manager',
//            'url'         => 'admin/Banner',
//            'icon'        => 'far fa-fw fa-image',
//            'submenu'     => [
//                [
//                    'text' => 'Add Banner',
//                    'url'  => 'admin/Banner',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Banner',
//                    'url'   => 'admin/listBanner',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
//            'label_color' => 'success',
//        ],
        [
            'text'        => 'Blog',
            'url'         => 'admin/blog-post',
            'icon'        => 'far fa-fw fas fa-blog',
            'submenu'     => [
//                [
//                    'text' => 'Add Blog',
//                    'url'  => 'admin/Blog',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Blogs',
//                    'url'   => 'admin/listBlog',
//                    'icon' => 'far fa-fw fa fa-list',
//                ], 
              
                [

                    'text' => 'List Blogs',
                    'url'   => 'admin/blog-post',
                    'icon' => 'far fa-fw fa fa-bold',
                ],
                [

                    'text' => 'Page Blogs',
                    'url'   => 'admin/blog-page',
                    'icon' => 'far fa-fw fa fa-file',
                ],
                [

                    'text' => 'Blog Category',
                    'url'   => 'admin/blog-category',
                    'icon' => 'far fa-fw fa fa-code',
                ],
//                [
//
//                    'text' => 'Blog Tags',
//                    'url'   => 'admin/blog-tag',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
                [

                    'text' => 'Blog comments',
                    'url'   => 'admin/blog-comment',
                    'icon' => 'far fa-fw fa fa-comment',
                ],
            ],
            'label_color' => 'success',
        ],

        [
            'text'        => 'Locate Us',
            'url'         => '#',
            'icon'        => 'far fa-fw fas fa-map-marker',
            'submenu'     => [
                [
                    'text' => 'Signature Studios',
                    'url'  => 'admin/showroom',
                    'icon' => 'far fa-fw fa fa-circle',
                ],
                [
                    'text' => 'Fenesta Offices',
                    'url'   => 'admin/office',
                    'icon' => 'far fa-fw fa fa-building ',
                ],
                [
                    'text' => 'Partner Showroom',
                    'url'   => 'admin/partnerShowroom',
                    'icon' => 'far fa-fw fa fa-podcast',
                ],
            ],
            'label_color' => 'success',
        ],

        [
            'text'        => 'News and Media',
            'url'         => 'admin/listNews',
            'icon'        => 'far fa-fw fas fa-newspaper',
//            'submenu'     => [
//                [
//                    'text' => 'Add News',
//                    'url'  => 'admin/News',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List News',
//                    'url'   => 'admin/listNews',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
            'label_color' => 'success',
        ],
           [
            'text'        => 'Why Fenesta',
            'url'         => 'admin/qualityinnovations',
            'icon'        => 'far fa-fw fas fa-location-arrow',
            'submenu'     => [
         [
                    'text' => 'Quality & Innovations',
                    'url'   => 'admin/qualityinnovations',
                    'icon' => 'far fa-fw fa fa-tasks',
                ],
         [
                    'text' => 'Services & Infrastructure',
                    'url'   => 'admin/servicesinfrastructure',
                    'icon' => 'far fa-fw fa fa-server',
                ],
         [
                    'text' => 'Brand & Heritage',
                    'url'   => 'admin/brandheritage',
                    'icon' => 'far fa-fw fa fa-microchip',
                ],
         [ 
                    'text' => 'Green & Sustainability',
                    'url'   => 'admin/greensustainability',
                    'icon' => 'far fa-fw fa fa-tree',
                ],
                
                    ],
            'label_color' => 'success',
        ],
        [
            'text'        => 'Awards & Accreditations',
            'url'         => 'admin/listAward',
            'icon'        => 'far fa-fw fas fa-trophy',
//            'submenu'     => [
//                [
//                    'text' => 'Add Awards & Accreditations',
//                    'url'  => 'admin/Award',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Awards & Accreditations',
//                    'url'   => 'admin/listAward',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
            'label_color' => 'success',
        ],
             
        [
            'text'        => 'Options',
            'url'         => 'admin/Meshgrill',
            'icon'        => 'far fa-fw fas fa-cog',
            'submenu'     => [
                [
                    'text' => ' Mesh & Grill Option',
                    'url'  => 'admin/listMeshgrill',
                    'icon' => 'far fa-fw fa fa-signal',
                ],
                [
                    'text' => 'Glass Option',
                    'url'  => 'admin/listGlass',
                    'icon' => 'far fa-fw fa fa-tv',
                ],
                [
                    'text' => 'Trim Option',
                    'url'   => 'admin/listTrim',
                    'icon' => 'far fa-fw fa fa-times-circle',
                ],
                [
                    'text' => 'Series ',
                    'url'   => 'admin/listSeries',
                    'icon' => 'far fa-fw fa fa-database',
                ],
 [
                    'text' => 'Feature benefits',
                    'url'   => 'admin/listFeaturebenefit',
                    'icon' => 'far fa-fw fa fa-tag',
                ],
//                [
//                    'text' => 'List Mesh & Grill Option',
//                    'url'   => 'admin/listMeshgrill',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
            ],
            'label_color' => 'success',
        ],
        
//        [
//            'text'        => 'Mesh & Grill Option',
//            'url'         => 'admin/Meshgrill',
//            'icon'        => 'far fa-fw fas fa-newspaper',
//            'submenu'     => [
//                [
//                    'text' => 'Add Mesh & Grill Option',
//                    'url'  => 'admin/Meshgrill',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Mesh & Grill Option',
//                    'url'   => 'admin/listMeshgrill',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
//            'label_color' => 'success',
//        ], [
//            'text'        => 'Glass Option',
//            'url'         => 'admin/Glass',
//            'icon'        => 'far fa-fw fas fa-newspaper',
//            'submenu'     => [
//                [
//                    'text' => 'Add Glass Option',
//                    'url'  => 'admin/Glass',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Glass Option',
//                    'url'   => 'admin/listGlass',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
//            'label_color' => 'success',
//        ],
//        [
//            'text'        => 'Trim Option',
//            'url'         => 'admin/Trim',
//            'icon'        => 'far fa-fw fas fa-newspaper',
//            'submenu'     => [
//                [
//                    'text' => 'Add Trim Option',
//                    'url'  => 'admin/Trim',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Trim Option',
//                    'url'   => 'admin/listTrim',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
//            'label_color' => 'success',
//        ],
        
//        [
//            'text'        => 'Series',
//            'url'         => 'admin/Series',
//            'icon'        => 'far fa-fw fas fa-newspaper',
//            'submenu'     => [
//                [
//                    'text' => 'Add Series',
//                    'url'  => 'admin/Series',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Series ',
//                    'url'   => 'admin/listSeries',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
//            'label_color' => 'success',
//        ],
//        [
//            'text'        => 'Feature Benefits',
//            'url'         => 'admin/Featurebenefit',
//            'icon'        => 'far fa-fw fas fa-quote-left',
//            'submenu'     => [
//                [
//                    'text' => 'Add Feature benefits',
//                    'url'  => 'admin/Featurebenefit',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Feature benefits',
//                    'url'   => 'admin/listFeaturebenefit',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
//            'label_color' => 'success',
//        ],
        [
            'text'        => 'Testimonials',
            'url'         => 'admin/listTestimonials',
            'icon'        => 'far fa-fw fas fa-quote-left',
//            'submenu'     => [
//                [
//                    'text' => 'Add Testimonial',
//                    'url'  => 'admin/Testimonials',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Testimonials',
//                    'url'   => 'admin/listTestimonials',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
            'label_color' => 'success',
        ],
        [
            'text'        => 'Great Facade',
            'url'         => 'admin/listGreatfacade',
            'icon'        => 'far fa-fw fas fa-rss',
//            'submenu'     => [
//                [
//                    'text' => 'Add Great Facade',
//                    'url'  => 'admin/Greatfacade',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Great Facade',
//                    'url'   => 'admin/listGreatfacade',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
            'label_color' => 'success',
        ],
        [
            'text'        => 'FAQ',
            'url'         => 'admin/listFaq',
            'icon'        => 'fa fa-question-circle',
//            'submenu'     => [
//                [
//                    'text' => 'Add FAQ',
//                    'url'  => 'admin/faq',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List FAQ',
//                    'url'   => 'admin/listFaq',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
               /* [
                    'text' => 'FAQ Answer',
                    'url'   => 'admin/faqAnswer',
                    'icon' => 'fa fa-reply',
                ],*/
//            ],
            'label_color' => 'success',
        ],

        [
            'text'        => 'Client Appreciations',
            'url'         => 'admin/listAppreciation',
            'icon'        => 'fa fa-thumbs-up',
//            'submenu'     => [
//                [
//                    'text' => 'Add Appreciations',
//                    'url'  => 'admin/appreciation',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Appreciations',
//                    'url'   => 'admin/listAppreciation',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
            'label_color' => 'success',
        ],

//        [
//            'text'        => 'Fenesta World',
//            'url'         => 'admin/fenestaWorld',
//            'icon'        => 'fa fa-globe',
//            'submenu'     => [
//                [
//                    'text' => 'Add Fenesta World',
//                    'url'  => 'admin/fenestaWorld',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Fenesta World',
//                    'url'   => 'admin/listFenestaWorld',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
//            'label_color' => 'success',
//        ],

        [
            'text'        => 'Image Gallery ',
            'url'         => 'admin/listGalleryImages',
            'icon'        => 'far fa-fw fa-image',
//            'submenu'     => [
//                [
//                    'text' => 'Add Images',
//                    'url'  => 'admin/galleryImages',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Images',
//                    'url'   => 'admin/listGalleryImages',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
            'label_color' => 'success',
        ],
        [
            'text'        => 'Clientele ',
            'url'         => 'admin/listClientele',
            'icon'        => 'far fa-fw fa-compass',
//            'submenu'     => [
//                [
//                    'text' => 'Add Clientele',
//                    'url'  => 'admin/Clientele',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Clientele',
//                    'url'   => 'admin/listClientele',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
            'label_color' => 'success',
        ],
        [
            'text'        => 'Brochure',
            'url'         => 'admin/Brochurelist',
            'icon'        => 'far fa-fw fa fa-fax',
//            'submenu'     => [
// [
//                    'text' => 'Add Brochure',
//                    'url'  => 'admin/Brochure',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
// [
//                    'text' => 'List Brochure',
//                    'url'  => 'admin/Brochurelist',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//                
//            ],
            'label_color' => 'success',
        ], 
//        [
//            'text'        => 'Handles And Locks',
//            'url'         => 'admin/Handlelock/list',
//            'icon'        => 'far fa-fw fa fa-lock',
//            'submenu'     => [
// [
//                    'text' => 'Handles And Locks',
//                    'url'  => 'admin/Handlelock/list',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//                
//            ],
//            'label_color' => 'success',
//        ], 
        [
            'text'        => 'Windows',
            'url'         => 'admin/Window',
            'icon'        => 'far fa-fw fa fa-window-restore',
            'submenu'     => [      
                [
                    'text' => 'Color Option',
                    'url'  => 'admin/Coloroption/window-list',
                    'icon' => 'far fa-fw fa fa-cloud',
                ],    
                [
                    'text' => 'Handles And Locks',
                    'url'  => 'admin/Handlelock/window-list',
                    'icon' => 'far fa-fw fa fa-lock',
                ],      
                [
                    'text' => 'Type',
                    'url'  => 'admin/Window/type',
                    'icon' => 'far fa-fw fa fa-keyboard',
                ],       
                [
                    'text' => 'By Application',
                    'url'  => 'admin/Window/byapplication',
                    'icon' => 'far fa-fw fa fa-info-circle',
                ], 
                [
                    'text' => 'Windows Product',
                    'url'  => 'admin/Window/typelist',
                    'icon' => 'far fa-fw fa fa-podcast',
                ],
                
            ],
            'label_color' => 'success',
        ], 
        [
            'text'        => 'Doors',
            'url'         => 'admin/door',
            'icon'        => 'far fa-fw fa fa-window-restore',
            'submenu'     => [
                 [
                    'text' => 'Color Option',
                    'url'  => 'admin/Coloroption/door-list',
                    'icon' => 'far fa-fw fa fa-cloud',
                ],  
                  [
                    'text' => 'Handles And Locks',
                    'url'  => 'admin/Handlelock/door-list',
                    'icon' => 'far fa-fw fa fa-lock',
                ],     
                  [
                    'text' => 'Type',
                    'url'  => 'admin/Door/type',
                    'icon' => 'far fa-fw fa fa-keyboard',
                ], [
                    'text' => 'By Application',
                    'url'  => 'admin/Door/byapplication',
                    'icon' => 'far fa-fw fa fa-info',
                ], 
                [
                    'text' => 'Doors Product',
                    'url'  => 'admin/Door/typelist',
                    'icon' => 'far fa-fw fa fa-podcast',
                ],
                
            ],
            'label_color' => 'success',
        ],
//        [
//            'text'        => 'Solutions ',
//            'url'         => 'admin/Solutions',
//            'icon'        => 'far fa-fw fa-image',
//            'submenu'     => [
//                [
//                    'text' => 'Add Solution',
//                    'url'  => 'admin/Solutions',
//                    'icon' => 'far fa-fw fa fa-plus',
//                ],
//                [
//                    'text' => 'List Solutions',
//                    'url'   => 'admin/listSolutions',
//                    'icon' => 'far fa-fw fa fa-list',
//                ],
//            ],
//            'label_color' => 'success',
//        ],
        [
            'text'        => 'Enquiries ',
            'url'         => 'admin/Solutions',
            'icon'        => 'far fa-fw fa-envelope',
            'submenu'     => [
                [
                    'text' => 'Enquiries',
                    'url'  => 'admin/Enquiries',
                    'icon' => 'far fa-fw fa fa-envelope-open',
                ],
                [
                    'text' => 'Newsletter Enquiries',
                    'url'  => 'admin/Newsletter',
                    'icon' => 'far fa-fw fa fa-newspaper',
                ],
                [
                    'text' => 'Request a Brochure',
                    'url'  => 'admin/Brochureenquiry',
                    'icon' => 'far fa-fw fa fa-fax',
                ],
                [
                    'text' => 'For Window & Door Consult',
                    'url'  => 'admin/Windowdoorconsult',
                    'icon' => 'far fa-fw fa fa-calendar',
                ],
                [
                    'text' => 'For Interiors & Architecture Consult',
                    'url'  => 'admin/Interiorsconsult',
                    'icon' => 'far fa-fw fa fa-calendar-check',
                ],
                [
                    'text' => 'Customer Complaint',
                    'url'  => 'admin/Customercomplaint',
                    'icon' => 'far fa-fw fa fa-address-book',
                ],
                [
                    'text' => 'Reach the Business Head',
                    'url'  => 'admin/Reachbusiness',
                    'icon' => 'far fa-fw fa fa-building',
                ],
                
            ], 
            'label_color' => 'success',
        ],
        [
            'text' => 'Project Setting',
            'url'  => 'admin/projectsettings',
            'icon' => 'fas fa-fw fa-cogs',
        ],
     /*   ['header' => 'account_settings'],
        [
            'text' => 'profile',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
        ],
        [
            'text'    => 'multilevel',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
                [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
            ],
        ],*/
        /*['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
            'url'        => '#',
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
            'url'        => '#',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
            'url'        => '#',
        ],*/
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    */

    'livewire' => false,
];
