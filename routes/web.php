<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\FrontendControllers\HomeController::class, 'index']);

Auth::routes();
//sitemap
Route::get('/sitemap', [App\Http\Controllers\FrontendControllers\SitemapController::class, 'index']);
//Page module
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/newsletter', [App\Http\Controllers\FrontendControllers\HomeController::class, 'newsletter']);
Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index']);

Route::post('/admin/bulk_delete_action', [App\Http\Controllers\Admin\AjaxController::class, 'bulk_delete_action']);
Route::post('/admin/bulk_active_action', [App\Http\Controllers\Admin\AjaxController::class, 'bulk_active_action']);
Route::post('/admin/bulk_inactive_action', [App\Http\Controllers\Admin\AjaxController::class, 'bulk_inactive_action']);

Route::get('/admin/getstate', [App\Http\Controllers\Admin\AjaxController::class, 'getstate']);
Route::get('/admin/getcity', [App\Http\Controllers\Admin\AjaxController::class, 'index']);
Route::get('/getstate', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getstate']);
Route::get('/getcity', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getcity']);
Route::get('/admin/editgetstate', [App\Http\Controllers\Admin\AjaxController::class, 'editgetstate']);
Route::get('/admin/editgetcity', [App\Http\Controllers\Admin\AjaxController::class, 'editgetcity']);
Route::get('/admin/pages', [App\Http\Controllers\Admin\PagesController::class, 'index']);
Route::get('/admin/addPage', [App\Http\Controllers\Admin\PagesController::class, 'index']);
Route::any('/admin/savePage', [App\Http\Controllers\Admin\PagesController::class, 'savePage']);
Route::any('/admin/listPage', [App\Http\Controllers\Admin\PagesController::class, 'listPage']);
Route::any('/admin/editPage/{id}', [App\Http\Controllers\Admin\PagesController::class, 'editPage']);
Route::any('/admin/updatePage/{id}', [App\Http\Controllers\Admin\PagesController::class, 'updatePage']);
Route::any('/admin/deletePage/{id}', [App\Http\Controllers\Admin\PagesController::class, 'deletePage']);

// Banner Module
Route::get('/admin/Banner', [App\Http\Controllers\Admin\BannerController::class, 'index']);
Route::post('/admin/saveBanner', [App\Http\Controllers\Admin\BannerController::class, 'saveBanner']);
Route::any('/admin/listBanner', [App\Http\Controllers\Admin\BannerController::class, 'listBanner']);
Route::any('/admin/editBanner/{id}', [App\Http\Controllers\Admin\BannerController::class, 'editBanner']);
Route::any('/admin/updateBanner/{id}', [App\Http\Controllers\Admin\BannerController::class, 'updateBanner']);
Route::any('/admin/deleteBanner/{id}', [App\Http\Controllers\Admin\BannerController::class, 'deleteBanner']);

// Newsletter Module
Route::get('/admin/Newsletter', [App\Http\Controllers\Admin\NewsletterController::class, 'index']);
Route::any('/admin/deletenewsletter/{id}', [App\Http\Controllers\Admin\NewsletterController::class, 'delete']);

// Enquires Module
Route::get('/admin/Enquiries', [App\Http\Controllers\Admin\EnquiresController::class, 'index']);
Route::any('/admin/deleteenquiries/{id}', [App\Http\Controllers\Admin\EnquiresController::class, 'delete']);
Route::any('/admin/deleteleadsenquiries/{id}', [App\Http\Controllers\Admin\EnquiresController::class, 'deleteleads']);

// Brochureenquiry Module
Route::get('/admin/Brochureenquiry', [App\Http\Controllers\Admin\EnquiresController::class, 'brochureenquiry']);

// Windowdoorconsult Module
Route::get('/admin/Windowdoorconsult', [App\Http\Controllers\Admin\EnquiresController::class, 'windowdoorconsult']);

// Interiorsconsult Module
Route::get('/admin/Interiorsconsult', [App\Http\Controllers\Admin\EnquiresController::class, 'interiorsconsult']);

// Customercomplaint Module
Route::get('/admin/Customercomplaint', [App\Http\Controllers\Admin\EnquiresController::class, 'customercomplaint']);

// Reachbusiness Module
Route::get('/admin/Reachbusiness', [App\Http\Controllers\Admin\EnquiresController::class, 'reachbusiness']);

// projectsettings Module
Route::get('/admin/projectsettings', [App\Http\Controllers\Admin\ProjectsettingController::class, 'index']);
Route::post('/admin/projectsettingsave', [App\Http\Controllers\Admin\ProjectsettingController::class, 'save']);

// Colorotpin Module
Route::get('/admin/Coloroption', [App\Http\Controllers\Admin\ColoroptionController::class, 'index']);
Route::any('/admin/Coloroption/list', [App\Http\Controllers\Admin\ColoroptionController::class, 'list']);
Route::any('/admin/Coloroption/window-list', [App\Http\Controllers\Admin\ColoroptionController::class, 'windowlist']);
Route::any('/admin/Coloroption/door-list', [App\Http\Controllers\Admin\ColoroptionController::class, 'doorlist']);
Route::get('/admin/Coloroption/{id}', [App\Http\Controllers\Admin\ColoroptionController::class, 'index']);
Route::post('/admin/Coloroption/save', [App\Http\Controllers\Admin\ColoroptionController::class, 'save']);
Route::any('/admin/Coloroption/list/{id}', [App\Http\Controllers\Admin\ColoroptionController::class, 'list']);
Route::any('/admin/Coloroption/edit/{id}', [App\Http\Controllers\Admin\ColoroptionController::class, 'edit']);
Route::any('/admin/Coloroption/update/{id}', [App\Http\Controllers\Admin\ColoroptionController::class, 'update']);
Route::any('/admin/Coloroption/delete/{id}', [App\Http\Controllers\Admin\ColoroptionController::class, 'delete']);

// Aboutfenesta Module

Route::get('/admin/aboutfenesta', [App\Http\Controllers\Admin\AboutController::class, 'index']);
Route::get('/admin/ourinfrastructure', [App\Http\Controllers\Admin\AboutController::class, 'ourinfrastructure']);
Route::get('/admin/ourvalues', [App\Http\Controllers\Admin\AboutController::class, 'ourvalues']);
Route::get('/admin/ourleadership', [App\Http\Controllers\Admin\AboutController::class, 'ourleadership']);
Route::get('/admin/businessportfolio', [App\Http\Controllers\Admin\AboutController::class, 'businessportfolio']);
Route::get('/admin/lifefenesta', [App\Http\Controllers\Admin\AboutController::class, 'lifefenesta']);

Route::get('/admin/addAbout/{id}', [App\Http\Controllers\Admin\AboutController::class, 'add']);
Route::post('/admin/saveAbout', [App\Http\Controllers\Admin\AboutController::class, 'save']);

Route::any('/admin/editAbout/{id}', [App\Http\Controllers\Admin\AboutController::class, 'edit']);
Route::any('/admin/updateAbout/{id}', [App\Http\Controllers\Admin\AboutController::class, 'update']);
Route::any('/admin/deleteAbout/{id}', [App\Http\Controllers\Admin\AboutController::class, 'delete']);

// Handlelock Module
Route::get('/admin/Handlelock', [App\Http\Controllers\Admin\HandlelockController::class, 'index']);
Route::any('/admin/Handlelock/list', [App\Http\Controllers\Admin\HandlelockController::class, 'list']);
Route::any('/admin/Handlelock/window-list', [App\Http\Controllers\Admin\HandlelockController::class, 'windowlist']);
Route::any('/admin/Handlelock/door-list', [App\Http\Controllers\Admin\HandlelockController::class, 'doorlist']);
Route::get('/admin/Handlelock/{id}', [App\Http\Controllers\Admin\HandlelockController::class, 'index']);
Route::post('/admin/Handlelock/save', [App\Http\Controllers\Admin\HandlelockController::class, 'save']);
Route::any('/admin/Handlelock/list/{id}', [App\Http\Controllers\Admin\HandlelockController::class, 'list']);
Route::any('/admin/Handlelock/edit/{id}', [App\Http\Controllers\Admin\HandlelockController::class, 'edit']);
Route::any('/admin/Handlelock/update/{id}', [App\Http\Controllers\Admin\HandlelockController::class, 'update']);
Route::any('/admin/Handlelock/delete/{id}', [App\Http\Controllers\Admin\HandlelockController::class, 'delete']);

// end to end Module
Route::get('/admin/endtoend/{type}', [App\Http\Controllers\Admin\EndtoendController::class, 'index']);
Route::post('/admin/endtoend/save', [App\Http\Controllers\Admin\EndtoendController::class, 'save']);
Route::any('/admin/endtoend/list/{type}', [App\Http\Controllers\Admin\EndtoendController::class, 'list']);
Route::any('/admin/endtoend/edit/{id}', [App\Http\Controllers\Admin\EndtoendController::class, 'edit']);
Route::any('/admin/endtoend/update/{id}', [App\Http\Controllers\Admin\EndtoendController::class, 'update']);
Route::any('/admin/endtoend/delete/{id}', [App\Http\Controllers\Admin\EndtoendController::class, 'delete']);

// WindowDoor Module
Route::get('/admin/Windowdoor', [App\Http\Controllers\Admin\WindowdoorController::class, 'index']);
Route::post('/admin/save', [App\Http\Controllers\Admin\WindowdoorController::class, 'save']);
Route::any('/admin/list', [App\Http\Controllers\Admin\WindowdoorController::class, 'list']);
Route::any('/admin/edit/{id}', [App\Http\Controllers\Admin\WindowdoorController::class, 'edit']);
Route::any('/admin/update/{id}', [App\Http\Controllers\Admin\WindowdoorController::class, 'update']);
Route::any('/admin/delete/{id}', [App\Http\Controllers\Admin\WindowdoorController::class, 'delete']);

// Brochure Module
Route::get('/admin/Brochure', [App\Http\Controllers\Admin\BrochureController::class, 'index']);
Route::post('/admin/Brochuresave', [App\Http\Controllers\Admin\BrochureController::class, 'save']);
Route::any('/admin/Brochurelist', [App\Http\Controllers\Admin\BrochureController::class, 'list']);
Route::any('/admin/Brochureedit/{id}', [App\Http\Controllers\Admin\BrochureController::class, 'edit']);
Route::any('/admin/Brochureupdate/{id}', [App\Http\Controllers\Admin\BrochureController::class, 'update']);
Route::any('/admin/Brochuredelete/{id}', [App\Http\Controllers\Admin\BrochureController::class, 'delete']);

// Window Module
Route::get('/admin/Window/typelist', [App\Http\Controllers\Admin\WindowController::class, 'typelist']);
Route::get('/admin/Window/typeadd', [App\Http\Controllers\Admin\WindowController::class, 'typeadd']);
Route::post('/admin/typesave', [App\Http\Controllers\Admin\WindowController::class, 'typesave']);
Route::any('/admin/typeedit/{id}', [App\Http\Controllers\Admin\WindowController::class, 'typeedit']);
Route::any('/admin/typeupdate/{id}', [App\Http\Controllers\Admin\WindowController::class, 'typeupdate']);
Route::any('/admin/Window/typedelete/{id}', [App\Http\Controllers\Admin\WindowController::class, 'typedelete']);

// Window Type Module
Route::get('/admin/Window/type', [App\Http\Controllers\Admin\WindowController::class, 'list']);
Route::get('/admin/Window/type/{id}', [App\Http\Controllers\Admin\WindowController::class, 'list']);
Route::get('/admin/Window/add', [App\Http\Controllers\Admin\WindowController::class, 'add']);
Route::get('/admin/Window/add/{id}', [App\Http\Controllers\Admin\WindowController::class, 'add']);
Route::post('/admin/Window/save', [App\Http\Controllers\Admin\WindowController::class, 'save']);
Route::any('/admin/Window/edit/{id}', [App\Http\Controllers\Admin\WindowController::class, 'edit']);
Route::any('/admin/Window/update/{id}', [App\Http\Controllers\Admin\WindowController::class, 'update']);
Route::any('/admin/Window/delete/{id}', [App\Http\Controllers\Admin\WindowController::class, 'delete']);

// Window Apllication Module
Route::get('/admin/Window/byapplication', [App\Http\Controllers\Admin\WindowController::class, 'byapplicationlist']);
Route::get('/admin/Window/byapplicationadd', [App\Http\Controllers\Admin\WindowController::class, 'byapplicationadd']);
Route::post('/admin/Window/byapplicationsave', [App\Http\Controllers\Admin\WindowController::class, 'byapplicationsave']);
Route::any('/admin/Window/byapplicationedit/{id}', [App\Http\Controllers\Admin\WindowController::class, 'byapplicationedit']);
Route::any('/admin/Window/byapplicationupdate/{id}', [App\Http\Controllers\Admin\WindowController::class, 'byapplicationupdate']);
Route::any('/admin/Window/byapplicationdelete/{id}', [App\Http\Controllers\Admin\WindowController::class, 'byapplicationdelete']);

// Door Module
Route::get('/admin/Door/typelist', [App\Http\Controllers\Admin\DoorController::class, 'typelist']);
Route::get('/admin/Door/typeadd', [App\Http\Controllers\Admin\DoorController::class, 'typeadd']);
Route::post('/admin/Door/typesave', [App\Http\Controllers\Admin\DoorController::class, 'typesave']);
Route::any('/admin/Door/typeedit/{id}', [App\Http\Controllers\Admin\DoorController::class, 'typeedit']);
Route::any('/admin/Door/typeupdate/{id}', [App\Http\Controllers\Admin\DoorController::class, 'typeupdate']);
Route::any('/admin/Door/typedelete/{id}', [App\Http\Controllers\Admin\DoorController::class, 'typedelete']);

// Door  Type Module
Route::get('/admin/Door/type', [App\Http\Controllers\Admin\DoorController::class, 'list']);
Route::get('/admin/Door/type/{id}', [App\Http\Controllers\Admin\DoorController::class, 'list']);
Route::get('/admin/Door/add', [App\Http\Controllers\Admin\DoorController::class, 'add']);
Route::get('/admin/Door/add/{id}', [App\Http\Controllers\Admin\DoorController::class, 'add']);
Route::post('/admin/Door/save', [App\Http\Controllers\Admin\DoorController::class, 'save']);
Route::any('/admin/Door/edit/{id}', [App\Http\Controllers\Admin\DoorController::class, 'edit']);
Route::any('/admin/Door/update/{id}', [App\Http\Controllers\Admin\DoorController::class, 'update']);
Route::any('/admin/Door/delete/{id}', [App\Http\Controllers\Admin\DoorController::class, 'delete']);

// Door  application Module
Route::get('/admin/Door/byapplication', [App\Http\Controllers\Admin\DoorController::class, 'byapplicationlist']);
Route::get('/admin/Door/byapplicationadd', [App\Http\Controllers\Admin\DoorController::class, 'byapplicationadd']);
Route::post('/admin/Door/byapplicationsave', [App\Http\Controllers\Admin\DoorController::class, 'byapplicationsave']);
Route::any('/admin/Door/byapplicationedit/{id}', [App\Http\Controllers\Admin\DoorController::class, 'byapplicationedit']);
Route::any('/admin/Door/byapplicationupdate/{id}', [App\Http\Controllers\Admin\DoorController::class, 'byapplicationupdate']);
Route::any('/admin/Door/byapplicationdelete/{id}', [App\Http\Controllers\Admin\DoorController::class, 'byapplicationdelete']);

//Clientele Module
Route::get('/admin/Clientele', [App\Http\Controllers\Admin\ClienteleController::class, 'clientele']);
Route::post('/admin/saveClientele', [App\Http\Controllers\Admin\ClienteleController::class, 'saveClientele']);
Route::any('/admin/listClientele', [App\Http\Controllers\Admin\ClienteleController::class, 'listClientele']);
Route::any('/admin/editClientele/{id}', [App\Http\Controllers\Admin\ClienteleController::class, 'editClientele']);
Route::any('/admin/updateClientele/{id}', [App\Http\Controllers\Admin\ClienteleController::class, 'updateClientele']);
Route::any('/admin/deleteClientele/{id}', [App\Http\Controllers\Admin\ClienteleController::class, 'deleteClientele']);

//Gallery Module
Route::get('/admin/galleryImages', [App\Http\Controllers\Admin\BannerController::class, 'galleryImages']);
Route::post('/admin/saveGallery', [App\Http\Controllers\Admin\BannerController::class, 'saveGallery']);
Route::any('/admin/listGalleryImages', [App\Http\Controllers\Admin\BannerController::class, 'listGalleryImages']);
Route::any('/admin/editGalleryImage/{id}', [App\Http\Controllers\Admin\BannerController::class, 'editGalleryImage']);
Route::any('/admin/updateGalleryImage/{id}', [App\Http\Controllers\Admin\BannerController::class, 'updateGalleryImage']);
Route::any('/admin/deleteGalleryImage/{id}', [App\Http\Controllers\Admin\BannerController::class, 'deleteGalleryImage']);

// Blog Module
//Route::get('/admin/Blog', [App\Http\Controllers\Admin\BlogController::class, 'index']);
//Route::post('/admin/saveBlog', [App\Http\Controllers\Admin\BlogController::class, 'saveBLog']);
//Route::any('/admin/listBlog', [App\Http\Controllers\Admin\BlogController::class, 'listBlog']);
//Route::any('/admin/editBlog/{id}', [App\Http\Controllers\Admin\BlogController::class, 'editBlog']);
//Route::any('/admin/updateBlog/{id}', [App\Http\Controllers\Admin\BlogController::class, 'updateBlog']);
//Route::any('/admin/deleteBlog/{id}', [App\Http\Controllers\Admin\BlogController::class, 'deleteBlog']);

    // section Blog  module

    Route::get('/admin/blog-post', [App\Http\Controllers\Admin\BlogPostCtrlAdmin::class, 'index']);
    Route::get('/admin/blog-post/view/{id}', [App\Http\Controllers\Admin\BlogPostCtrlAdmin::class, 'view']);
    Route::get('/admin/blog-post/new', [App\Http\Controllers\Admin\BlogPostCtrlAdmin::class, 'add']);
    Route::post('/admin/blog-post/save',  [App\Http\Controllers\Admin\BlogPostCtrlAdmin::class, 'save']);
    Route::get('/admin/blog-post/export',  [App\Http\Controllers\Admin\BlogPostCtrlAdmin::class, 'export']); 

    Route::get('/admin/blog-page', [App\Http\Controllers\Admin\BlogPageCtrlAdmin::class, 'index']);
    Route::get('/admin/blog-page/view/{id}', [App\Http\Controllers\Admin\BlogPageCtrlAdmin::class, 'view']);
    Route::get('/admin/blog-page/new', [App\Http\Controllers\Admin\BlogPageCtrlAdmin::class, 'add']);
    Route::post('/admin/blog-page/save',  [App\Http\Controllers\Admin\BlogPageCtrlAdmin::class, 'save']);
    Route::get('/admin/blog-page/export',  [App\Http\Controllers\Admin\BlogPageCtrlAdmin::class, 'export']); 

    Route::get('/admin/blog-category', [App\Http\Controllers\Admin\BlogCategoryCtrlAdmin::class, 'index']);
    Route::get('/admin/blog-category/view/{id}', [App\Http\Controllers\Admin\BlogCategoryCtrlAdmin::class, 'view']);
    Route::get('/admin/blog-category/new', [App\Http\Controllers\Admin\BlogCategoryCtrlAdmin::class, 'add']);
    Route::post('/admin/blog-category/save', [App\Http\Controllers\Admin\BlogCategoryCtrlAdmin::class, 'save']);
    Route::get('/admin/blog-category/export',[App\Http\Controllers\Admin\BlogCategoryCtrlAdmin::class, 'export']); 

    Route::get('/admin/blog-tag', [App\Http\Controllers\Admin\BlogTagCtrlAdmin::class, 'index'] );
    Route::get('/admin/blog-tag/view/{id}',[App\Http\Controllers\Admin\BlogTagCtrlAdmin::class, 'view'] );
    Route::get('/admin/blog-tag/new', [App\Http\Controllers\Admin\BlogTagCtrlAdmin::class, 'add']);
    Route::post('/admin/blog-tag/save', [App\Http\Controllers\Admin\BlogTagCtrlAdmin::class, 'save']);
    Route::get('/admin/blog-tag/export', [App\Http\Controllers\Admin\BlogTagCtrlAdmin::class, 'export']); 

    // contact admin
    Route::get('/admin/blog-comment', [App\Http\Controllers\Admin\BlogCommentCtrlAdmin::class, 'index'] );             
    Route::get('/admin/blog-comment/view/{id}',[App\Http\Controllers\Admin\BlogCommentCtrlAdmin::class, 'view'] );
    Route::post('/admin/blog-comment/save', [App\Http\Controllers\Admin\BlogCommentCtrlAdmin::class, 'save']);
    Route::get('/admin/blog-comment/export',[App\Http\Controllers\Admin\BlogCommentCtrlAdmin::class, 'export']);


// Newz Module
Route::get('/admin/News', [App\Http\Controllers\Admin\NewsController::class, 'index']);
Route::post('/admin/saveNews', [App\Http\Controllers\Admin\NewsController::class, 'saveNews']);
Route::any('/admin/listNews', [App\Http\Controllers\Admin\NewsController::class, 'listNews']);
Route::any('/admin/editNews/{id}', [App\Http\Controllers\Admin\NewsController::class, 'editNews']);
Route::any('/admin/updateNews/{id}', [App\Http\Controllers\Admin\NewsController::class, 'updateNews']);
Route::any('/admin/deleteNews/{id}', [App\Http\Controllers\Admin\NewsController::class, 'deleteNews']);

// Award Module
Route::get('/admin/Award', [App\Http\Controllers\Admin\AwardaccreditationController::class, 'index']);
Route::post('/admin/saveAward', [App\Http\Controllers\Admin\AwardaccreditationController::class, 'saveAward']);
Route::any('/admin/listAward', [App\Http\Controllers\Admin\AwardaccreditationController::class, 'listAward']);
Route::any('/admin/editAward/{id}', [App\Http\Controllers\Admin\AwardaccreditationController::class, 'editAward']);
Route::any('/admin/updateAward/{id}', [App\Http\Controllers\Admin\AwardaccreditationController::class, 'updateAward']);
Route::any('/admin/deleteAward/{id}', [App\Http\Controllers\Admin\AwardaccreditationController::class, 'deleteAward']);


// Meshgrill Module
Route::get('/admin/Meshgrill', [App\Http\Controllers\Admin\MeshgrillController::class, 'index']);
Route::post('/admin/saveMeshgrill', [App\Http\Controllers\Admin\MeshgrillController::class, 'saveMeshgrill']);
Route::any('/admin/listMeshgrill', [App\Http\Controllers\Admin\MeshgrillController::class, 'listMeshgrill']);
Route::any('/admin/editMeshgrill/{id}', [App\Http\Controllers\Admin\MeshgrillController::class, 'editMeshgrill']);
Route::any('/admin/updateMeshgrill/{id}', [App\Http\Controllers\Admin\MeshgrillController::class, 'updateMeshgrill']);
Route::any('/admin/deleteMeshgrill/{id}', [App\Http\Controllers\Admin\MeshgrillController::class, 'deleteMeshgrill']);


// Glass Module
Route::get('/admin/Glass', [App\Http\Controllers\Admin\GlassController::class, 'index']);
Route::post('/admin/saveGlass', [App\Http\Controllers\Admin\GlassController::class, 'saveGlass']);
Route::any('/admin/listGlass', [App\Http\Controllers\Admin\GlassController::class, 'listGlass']);
Route::any('/admin/editGlass/{id}', [App\Http\Controllers\Admin\GlassController::class, 'editGlass']);
Route::any('/admin/updateGlass/{id}', [App\Http\Controllers\Admin\GlassController::class, 'updateGlass']);
Route::any('/admin/deleteGlass/{id}', [App\Http\Controllers\Admin\GlassController::class, 'deleteGlass']);


// Trim Module
Route::get('/admin/Trim', [App\Http\Controllers\Admin\TrimoptionController::class, 'index']);
Route::post('/admin/saveTrim', [App\Http\Controllers\Admin\TrimoptionController::class, 'saveTrim']);
Route::any('/admin/listTrim', [App\Http\Controllers\Admin\TrimoptionController::class, 'listTrim']);
Route::any('/admin/editTrim/{id}', [App\Http\Controllers\Admin\TrimoptionController::class, 'editTrim']);
Route::any('/admin/updateTrim/{id}', [App\Http\Controllers\Admin\TrimoptionController::class, 'updateTrim']);
Route::any('/admin/deleteTrim/{id}', [App\Http\Controllers\Admin\TrimoptionController::class, 'deleteTrim']);

// Series Module
Route::get('/admin/Series', [App\Http\Controllers\Admin\SeriesController::class, 'index']);
Route::post('/admin/saveSeries', [App\Http\Controllers\Admin\SeriesController::class, 'saveSeries']);
Route::any('/admin/listSeries', [App\Http\Controllers\Admin\SeriesController::class, 'listSeries']);
Route::any('/admin/editSeries/{id}', [App\Http\Controllers\Admin\SeriesController::class, 'editSeries']);
Route::any('/admin/updateSeries/{id}', [App\Http\Controllers\Admin\SeriesController::class, 'updateSeries']);
Route::any('/admin/deleteSeries/{id}', [App\Http\Controllers\Admin\SeriesController::class, 'deleteSeries']);


/*+++++++++++++++++++++++++++++++++++++++++++++++
* Locate us Module 								|
* Line no 68-73 showroom Module 				|
* Line no 77-82 office Module 					|
* Line no 85-91 Partner Showroom Module 		|
*+++++++++++++++++++++++++++++++++++++++++++++++|
*/

Route::get('/admin/showroom', [App\Http\Controllers\Admin\LocateUsController::class, 'index']);
Route::get('/admin/addshowroom', [App\Http\Controllers\Admin\LocateUsController::class, 'addshowroom']);
Route::any('/admin/saveShowroom', [App\Http\Controllers\Admin\LocateUsController::class, 'saveShowroom']);
Route::any('/admin/editShowroom/{id}', [App\Http\Controllers\Admin\LocateUsController::class, 'editShowroom']);
Route::any('/admin/updateShowroom/{id}', [App\Http\Controllers\Admin\LocateUsController::class, 'updateShowroom']);
Route::any('/admin/deleteShowroom/{id}', [App\Http\Controllers\Admin\LocateUsController::class, 'deleteShowroom']);


	// offices
Route::get('/admin/office', [App\Http\Controllers\Admin\LocateUsController::class, 'officeList']);
Route::get('/admin/addOffice', [App\Http\Controllers\Admin\LocateUsController::class, 'addOffice']);
Route::any('/admin/saveOffice', [App\Http\Controllers\Admin\LocateUsController::class, 'saveOffice']);
Route::any('/admin/editOffice/{id}', [App\Http\Controllers\Admin\LocateUsController::class, 'editOffice']);
Route::any('/admin/updateOffice/{id}', [App\Http\Controllers\Admin\LocateUsController::class, 'updateOffice']);
Route::any('/admin/deleteOffice/{id}', [App\Http\Controllers\Admin\LocateUsController::class, 'deleteOffice']);


	// partner 
Route::get('/admin/partnerShowroom', [App\Http\Controllers\Admin\LocateUsController::class, 'partnerShowroomList']);
Route::get('/admin/addParterShowroom', [App\Http\Controllers\Admin\LocateUsController::class, 'addParterShowroom']);
Route::any('/admin/savePartnerShworoom', [App\Http\Controllers\Admin\LocateUsController::class, 'savePartnerShworoom']);
Route::any('/admin/editPartnerShowroom/{id}', [App\Http\Controllers\Admin\LocateUsController::class, 'editPartnerShowroom']);
Route::any('/admin/updatePartnerShowroom/{id}', [App\Http\Controllers\Admin\LocateUsController::class, 'updatePartnerShowroom']);
Route::any('/admin/deletePartnerShowroom/{id}', [App\Http\Controllers\Admin\LocateUsController::class, 'deletePartnerShowroom']);


// Testimonial Module
Route::get('/admin/Testimonials', [App\Http\Controllers\Admin\TestimonialsController::class, 'index']);
Route::post('/admin/saveTestimonial', [App\Http\Controllers\Admin\TestimonialsController::class, 'saveTestimonial']);
Route::any('/admin/listTestimonials', [App\Http\Controllers\Admin\TestimonialsController::class, 'listTestimonials']);
Route::any('/admin/editTestimonial/{id}', [App\Http\Controllers\Admin\TestimonialsController::class, 'editTestimonial']);
Route::any('/admin/updateTestimonial/{id}', [App\Http\Controllers\Admin\TestimonialsController::class, 'updateTestimonial']);
Route::any('/admin/deleteTestimonial/{id}', [App\Http\Controllers\Admin\TestimonialsController::class, 'deleteTestimonial']);



// Feature Benefit Module
Route::get('/admin/Featurebenefit', [App\Http\Controllers\Admin\FeaturebenefitController::class, 'index']);
Route::post('/admin/saveFeaturebenefit', [App\Http\Controllers\Admin\FeaturebenefitController::class, 'saveFeaturebenefit']);
Route::any('/admin/listFeaturebenefit', [App\Http\Controllers\Admin\FeaturebenefitController::class, 'listFeaturebenefit']);
Route::any('/admin/editFeaturebenefit/{id}', [App\Http\Controllers\Admin\FeaturebenefitController::class, 'editFeaturebenefit']);
Route::any('/admin/updateFeaturebenefit/{id}', [App\Http\Controllers\Admin\FeaturebenefitController::class, 'updateFeaturebenefit']);
Route::any('/admin/deleteFeaturebenefit/{id}', [App\Http\Controllers\Admin\FeaturebenefitController::class, 'deleteFeaturebenefit']);


// Greatfacade Module
Route::get('/admin/Greatfacade', [App\Http\Controllers\Admin\GreatfacadeController::class, 'index']);
Route::post('/admin/saveGreatfacade', [App\Http\Controllers\Admin\GreatfacadeController::class, 'saveGreatfacade']);
Route::any('/admin/listGreatfacade', [App\Http\Controllers\Admin\GreatfacadeController::class, 'listGreatfacade']);
Route::any('/admin/editGreatfacade/{id}', [App\Http\Controllers\Admin\GreatfacadeController::class, 'editGreatfacade']);
Route::any('/admin/updateGreatfacade/{id}', [App\Http\Controllers\Admin\GreatfacadeController::class, 'updateGreatfacade']);
Route::any('/admin/deleteGreatfacade/{id}', [App\Http\Controllers\Admin\GreatfacadeController::class, 'deleteGreatfacade']);


// Faq Module
Route::get('/admin/faq', [App\Http\Controllers\Admin\FaqController::class, 'index']);
Route::post('/admin/saveFaq', [App\Http\Controllers\Admin\FaqController::class, 'saveFaq']);
Route::any('/admin/listFaq', [App\Http\Controllers\Admin\FaqController::class, 'listFaq']);
Route::any('/admin/editFaq/{id}', [App\Http\Controllers\Admin\FaqController::class, 'editFaq']);
Route::any('/admin/updateFaq/{id}', [App\Http\Controllers\Admin\FaqController::class, 'updateFaq']);
Route::any('/admin/deleteFaq/{id}', [App\Http\Controllers\Admin\FaqController::class, 'deleteFaq']);


Route::get('/admin/faqAnswer', [App\Http\Controllers\Admin\FaqAnswerController::class, 'index']);
Route::post('/admin/saveFaqAnswer', [App\Http\Controllers\Admin\FaqAnswerController::class, 'saveFaqAnswer']);
Route::any('/admin/lisFaqAnswers', [App\Http\Controllers\Admin\FaqAnswerController::class, 'lisFaqAnswers']);
Route::any('/admin/editFaqAnswer/{id}', [App\Http\Controllers\Admin\FaqAnswerController::class, 'editFaqAnswer']);
Route::any('/admin/updateFaqAnswer/{id}', [App\Http\Controllers\Admin\FaqAnswerController::class, 'updateFaqAnswer']);
Route::any('/admin/deleteFaqAnswer/{id}', [App\Http\Controllers\Admin\FaqAnswerController::class, 'deleteFaqAnswer']);

// appreciation module

Route::get('/admin/appreciation', [App\Http\Controllers\Admin\AppreciationsController::class, 'index']);
Route::post('/admin/saveAppreciation', [App\Http\Controllers\Admin\AppreciationsController::class, 'saveAppreciation']);
Route::any('/admin/listAppreciation', [App\Http\Controllers\Admin\AppreciationsController::class, 'listAppreciation']);
Route::any('/admin/editAppreciation/{id}', [App\Http\Controllers\Admin\AppreciationsController::class, 'editAppreciation']);
Route::any('/admin/updateAppreciation/{id}', [App\Http\Controllers\Admin\AppreciationsController::class, 'updateAppreciation']);
Route::any('/admin/deleteAppreciation/{id}', [App\Http\Controllers\Admin\AppreciationsController::class, 'deleteAppreciation']);

// fenesta world module

Route::get('/admin/fenestaWorld', [App\Http\Controllers\Admin\FenestaWorldController::class, 'index']);
Route::post('/admin/saveFenestaWorld', [App\Http\Controllers\Admin\FenestaWorldController::class, 'saveFenestaWorld']);
Route::any('/admin/listFenestaWorld', [App\Http\Controllers\Admin\FenestaWorldController::class, 'listFenestaWorld']);
Route::any('/admin/editFenestaWorld/{id}', [App\Http\Controllers\Admin\FenestaWorldController::class, 'editFenestaWorld']);
Route::any('/admin/updateFenestaWorld/{id}', [App\Http\Controllers\Admin\FenestaWorldController::class, 'updateFenestaWorld']);
Route::any('/admin/deleteFenestaWorld/{id}', [App\Http\Controllers\Admin\FenestaWorldController::class, 'deleteFenestaWorld']);

// solutions module

//Route::get('/admin/Solutions', [App\Http\Controllers\Admin\SolutionsController::class, 'index']);
//Route::post('/admin/saveSolutions', [App\Http\Controllers\Admin\SolutionsController::class, 'save']);
//Route::any('/admin/listSolutions', [App\Http\Controllers\Admin\SolutionsController::class, 'list']);
//Route::any('/admin/editSolutions/{id}', [App\Http\Controllers\Admin\SolutionsController::class, 'edit']);
//Route::any('/admin/updateSolutions/{id}', [App\Http\Controllers\Admin\SolutionsController::class, 'update']);
//Route::any('/admin/deleteSolutions/{id}', [App\Http\Controllers\Admin\SolutionsController::class, 'delete']);

Route::get('/admin/qualityinnovations', [App\Http\Controllers\Admin\SolutionsController::class, 'list']);

Route::get('/admin/servicesinfrastructure', [App\Http\Controllers\Admin\SolutionsController::class, 'servicesinfrastructure']);
Route::get('/admin/brandheritage', [App\Http\Controllers\Admin\SolutionsController::class, 'brandheritage']);
Route::get('/admin/greensustainability', [App\Http\Controllers\Admin\SolutionsController::class, 'greensustainability']);

Route::get('/admin/addSolutions/{id}', [App\Http\Controllers\Admin\SolutionsController::class, 'index']);
Route::post('/admin/saveSolutions', [App\Http\Controllers\Admin\SolutionsController::class, 'save']);

Route::any('/admin/editSolutions/{id}', [App\Http\Controllers\Admin\SolutionsController::class, 'edit']);
Route::any('/admin/updateSolutions/{id}', [App\Http\Controllers\Admin\SolutionsController::class, 'update']);
Route::any('/admin/deleteSolutions/{id}', [App\Http\Controllers\Admin\SolutionsController::class, 'delete']);


// sitevisiter module

Route::get('/admin/site-visiter', [App\Http\Controllers\Admin\SitevisterController::class, 'index']);

Route::get('/admin/site-visiter/detail/{id}', [App\Http\Controllers\Admin\SitevisterController::class, 'detail']);

Route::get('/admin/site-visiter/export',  [App\Http\Controllers\Admin\SitevisterController::class, 'export']); 

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');


Route::get('/blog', [App\Http\Controllers\FrontendControllers\BlogController::class, 'index']);
Route::post('/blog', [App\Http\Controllers\FrontendControllers\BlogController::class, 'getLoadMore']);
Route::get('/blog/tag/{tag_slug}', [App\Http\Controllers\FrontendControllers\BlogController::class, 'tag']);
Route::get('/blog/{post_slug}', [App\Http\Controllers\FrontendControllers\BlogController::class, 'postdetail']);
Route::get('/related-blog/{post_slug}', [App\Http\Controllers\FrontendControllers\BlogController::class, 'relatedpostdetail']);
Route::get('/blog/category/{cat_slug}', [App\Http\Controllers\FrontendControllers\BlogController::class, 'category']);
Route::get('/blog/category/{cat_slug}/{post_slug}', [App\Http\Controllers\FrontendControllers\BlogController::class, 'category']);
Route::post('blog/commentPost', [App\Http\Controllers\FrontendControllers\BlogController::class, 'commentPost']); 
 
Route::get('/blog/{year}/{month}', [App\Http\Controllers\FrontendControllers\BlogController::class, 'blogbymonth']);
 
// cms page route

// Colors-Finish page route
Route::get('/{parent_slug}/colors-finish', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'colors_finish']);

Route::get('/{parent_slug}/mesh-grill', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'mesh_grill']);

Route::get('/{parent_slug}/glass', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'glass']);
// cms page route
Route::get('/{parent_slug}/handles', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'handles']);


   
Route::get('/door/internal-doors', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'internal_doors']);

Route::get('/window', [App\Http\Controllers\FrontendControllers\WindowdoorController::class, 'windows_doors']);
Route::get('/window/{child_slug}', [App\Http\Controllers\FrontendControllers\WindowdoorController::class, 'product']);
Route::get('/window/{parent_slug}/{child_slug}', [App\Http\Controllers\FrontendControllers\WindowdoorController::class, 'product_details']);
// cms page route
Route::get('/door', [App\Http\Controllers\FrontendControllers\WindowdoorController::class, 'windows_doors']);
Route::get('/door/{child_slug}', [App\Http\Controllers\FrontendControllers\WindowdoorController::class, 'product']);
Route::get('/door/{parent_slug}/{child_slug}', [App\Http\Controllers\FrontendControllers\WindowdoorController::class, 'product_details']);
// cms page route
Route::get('/customer-reviews', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'customer_reviews']);
Route::get('/trims', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'trims']);
Route::get('/series', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'series']);


Route::get('/locate-us', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);
Route::get('/locate-us/{parent_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);
//Route::get('/locate-us/{parent_slug}/{child_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);
Route::get('/locate-us/signature-studio/{parent_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);
Route::get('/locate-us/partner-showroom/{parent_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);
Route::get('/locate-us/fenesta-offices/{parent_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);
Route::get('/locate-us/international-market/{parent_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);
Route::get('/locate-us/signature-studio/{parent_slug}/{child_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);
Route::get('/locate-us/partner-showroom/{parent_slug}/{child_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);
Route::get('/locate-us/international-market/{parent_slug}/{child_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);
//Route::get('/locate-us/fenesta-offices/{parent_slug}/{child_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);
Route::get('/locate-us/signature-studio/{parent_slug}/{child_slug}/{slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);
Route::get('/locate-us/partner-showroom/{parent_slug}/{child_slug}/{slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);
//Route::get('/locate-us/fenesta-offices/{parent_slug}/{child_slug}/{slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'locate_us_child']);



Route::get('/news-media', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'news_media']);
Route::get('/news-media/{child_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'news_pages']);
Route::get('/awards-accreditations', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'award_accreditation']);
Route::get('/style-benefits', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'style_benefits']);
Route::get('/showcase/{child_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'showcase_gc']);
Route::get('/great-facade', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'great_facade']);

// cms page route
Route::get('/brochure', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'brochure']);
Route::post('/submit-brochure', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'submit_brochure']);
Route::post('/submit-enquiry', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'submit_enquiry']);
Route::post('/submit-enquiry-now', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'submit_enquiry_now']);
Route::post('/verify-otp', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'verify_otp']);
Route::post('/resend-otp', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'resend_otp']);
Route::post('/submit-complaint', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'submit_complaint']);
Route::post('/search-auto-data', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'search_auto_data']);
Route::get('/about-us', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'about_fenesta']);
Route::get('/about-dcm', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'about_dcm']);
Route::get('/features-benefits', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'features_benefits']);
Route::get('/features-benefits/{child_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'features_benefits']);

// cms page route
Route::get('/getlocateusblockstudio', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getlocateusblockstudio']);
Route::get('/getblockbycity', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getblockbycity']);
Route::get('/getcitybystate', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getcitybystate']);
Route::get('/getlocateusstudio', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getlocateusstudio']);
Route::get('/getlocateuscitystudio', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getlocateuscitystudio']);
Route::get('/getlocateusblockpartner', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getlocateusblockpartner']);
Route::get('/getblockbycitypartner', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getblockbycitypartner']);
Route::get('/getcitybystatepartner', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getcitybystatepartner']);
Route::get('/getcitybystatepartnerlll', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getcitybystatepartnerlll']);
Route::get('/getlocateuspartner', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getlocateuspartner']);
Route::get('/getlocateuscitypartner', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getlocateuscitypartner']);

Route::get('/getlocateusblockoffice', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getlocateusblockoffice']);
Route::get('/getlocateusblockofficehome', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getlocateusblockofficehome']);
Route::get('/getblockbycityoffice', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getblockbycityoffice']);
Route::get('/getcitybystateoffice', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getcitybystateoffice']); 
Route::get('/getlocateusoffice', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getlocateusoffice']);
Route::get('/getlocateusofficehome', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getlocateusofficehome']);
Route::get('/getlocateuscityoffice', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getlocateuscityoffice']);
Route::get('/getlocateuscityofficehome', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getlocateuscityofficehome']);
Route::get('/getvideo', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'getvideo']);
Route::post('/ajax_user_count', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'ajax_user_count']);

Route::post('/showcasedata', [App\Http\Controllers\FrontendControllers\AjaxController::class, 'index']);
Route::get('/quality-innovation', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'why_services']);
Route::get('/services-infrastructure', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'why_services']);
Route::get('/brand-heritage', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'why_services']);
Route::get('/green-sustainability', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'why_services']);
//Route::get('/knowledge-center/{child_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'knowledge_center']);

Route::get('/design', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'design']);    
Route::get('/material', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'material']);    
Route::get('/enquire-now', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'enquire_now']);    
Route::get('/thank-you', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'thankyou']);    
Route::get('/{parent_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'pages']);    
Route::get('/{parent_slug}/{child_slug}', [App\Http\Controllers\FrontendControllers\CmspageController::class, 'pages']);