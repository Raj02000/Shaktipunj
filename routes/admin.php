<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\AdminHomePageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerImageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\OurServiceController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\QuickLinkController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UniversityController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('change-password', [AuthController::class, 'showChangePasswordForm'])->name('change.password');
Route::post('update-password', [AuthController::class, 'changePassword'])->name('update.password');

// Events
Route::get('event', [EventController::class, 'index'])->name('event.index');
Route::get('event/show/{event}', [EventController::class, 'show'])->name('event.show');
Route::get('event/create', [EventController::class, 'create'])->name('event.add');
Route::post('event/store', [EventController::class, 'store'])->name('event.store');
Route::get('event/edit/{event}', [EventController::class, 'edit'])->name('event.edit');
Route::post('event/update/{event}', [EventController::class, 'update'])->name('event.update');
Route::get('event/delete/{event}', [EventController::class, 'destroy'])->name('event.delete');

// Testimonials
Route::get('testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
Route::get('testimonial/show/{testimonial}', [TestimonialController::class, 'show'])->name('testimonial.show');
Route::get('testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.add');
Route::post('testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');
Route::get('testimonial/edit/{testimonials}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
Route::post('testimonial/update/{testimonial}', [TestimonialController::class, 'update'])->name('testimonial.update');
Route::get('testimonial/delete/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonial.delete');

// Blogs
Route::get('blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/create', [BlogController::class, 'create'])->name('blog.add');
Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('blog/show/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get('blog/edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('blog/update/{blog}', [BlogController::class, 'update'])->name('blog.update');
Route::get('blog/delete/{blog}', [BlogController::class, 'delete'])->name('blog.delete');

// destination
Route::get('destination', [DestinationController::class, 'index'])->name('destination.index');
Route::get('destination/create', [DestinationController::class, 'create'])->name('destination.add');
Route::post('destination/create', [DestinationController::class, 'store'])->name('destination.store');
Route::get('destination/view/{destination}', [DestinationController::class, 'show'])->name('destination.show');
Route::get('destination/edit/{destination}', [DestinationController::class, 'edit'])->name('destination.edit');
Route::get('destination/change-publish/{id}', [DestinationController::class, 'changePublish'])->name('destination.changePublish');
Route::post('destination/update/{destination}', [DestinationController::class, 'update'])->name('destination.update');
Route::get('destination/delete/{destination}', [DestinationController::class, 'destroy'])->name('destination.delete');

// trip
Route::get('trip', [TripController::class, 'index'])->name('trip.index');
Route::get('trip/create', [TripController::class, 'create'])->name('trip.add');
Route::post('trip/create', [TripController::class, 'store'])->name('trip.store');
Route::get('trip/view/{trip}', [TripController::class, 'show'])->name('trip.show');
Route::get('trip/edit/{trip}', [TripController::class, 'edit'])->name('trip.edit');
Route::post('trip/update/{trip}', [TripController::class, 'update'])->name('trip.update');
Route::get('trip/delete/{trip}', [TripController::class, 'destroy'])->name('trip.delete');

// page
Route::get('page', [PageController::class, 'index'])->name('page.index');
Route::get('page/create', [PageController::class, 'create'])->name('page.add');
Route::post('page/edit-team/{page}', [PageController::class, 'editTeams'])->name('page.edit-team');
Route::get('page-gallery/create', [PageController::class, 'createGallery'])->name('page-gallery.add');
Route::post('page/create', [PageController::class, 'store'])->name('page.store');
Route::post('page-gallery/create', [PageController::class, 'storeGallery'])->name('page-gallery.store');
Route::get('page/view/{page}', [PageController::class, 'show'])->name('page.show');
Route::get('page/edit/{page}', [PageController::class, 'edit'])->name('page.edit');
Route::get('page-gallery/edit/{page}', [PageController::class, 'edit'])->name('page-gallery.edit');
Route::post('page/update/{page}', [PageController::class, 'update'])->name('page.update');
Route::post('page-gallery/update/{page}', [PageController::class, 'updateGallery'])->name('page-gallery.update');
Route::get('page/delete/{page}', [PageController::class, 'destroy'])->name('page.delete');

Route::post('page/{model}/change-page-order', [PageController::class, 'changeDisplayOrder'])->name('change-page-order');

// partner
Route::get('partner', [PartnerController::class, 'index'])->name('partner.index');
Route::get('partner/create', [PartnerController::class, 'create'])->name('partner.add');
Route::post('partner/create', [PartnerController::class, 'store'])->name('partner.store');
Route::get('partner/view/{partner}', [PartnerController::class, 'show'])->name('partner.show');
Route::get('partner/edit/{partner}', [PartnerController::class, 'edit'])->name('partner.edit');
Route::post('partner/update/{partner}', [PartnerController::class, 'update'])->name('partner.update');
Route::get('partner/delete/{partner}', [PartnerController::class, 'destroy'])->name('partner.delete');

// quick links
Route::get('quick-link', [QuickLinkController::class, 'index'])->name('quick-link.index');
Route::get('quick-link/create', [QuickLinkController::class, 'create'])->name('quick-link.add');
Route::post('quick-link/create', [QuickLinkController::class, 'store'])->name('quick-link.store');
Route::get('quick-link/view/{link}', [QuickLinkController::class, 'show'])->name('quick-link.show');
Route::get('quick-link/edit/{link}', [QuickLinkController::class, 'edit'])->name('quick-link.edit');
Route::post('quick-link/update/{link}', [QuickLinkController::class, 'update'])->name('quick-link.update');
Route::get('quick-link/delete/{link}', [QuickLinkController::class, 'destroy'])->name('quick-link.delete');

// package
Route::get('package', [PackageController::class, 'index'])->name('package.index');
Route::get('package/create', [PackageController::class, 'create'])->name('package.add');
Route::post('package/create', [PackageController::class, 'store'])->name('package.store');
Route::get('package/update-review/{package}', [PackageController::class, 'editReview'])->name('package.edit-review');
Route::post('package/update-review/{package}', [PackageController::class, 'updateReview'])->name('package.update-review');
Route::get('package/view/{package}', [PackageController::class, 'show'])->name('package.show');
Route::get('package/edit/{package}', [PackageController::class, 'edit'])->name('package.edit');
Route::post('package/update/{package}', [PackageController::class, 'update'])->name('package.update');
Route::get('package/delete/{package}', [PackageController::class, 'destroy'])->name('package.delete');
Route::get('package/gallery-item/remove', [PackageController::class, 'galleryItemRemove'])->name('removePackageGalleryItem');

// reviews
Route::get('review', [ReviewController::class, 'index'])->name('review.index');
Route::get('review/show/{review}', [ReviewController::class, 'show'])->name('review.show');
Route::get('review/{review}/changeStatus/{status}', [ReviewController::class, 'changeStatus'])->name('review.changeStatus');
Route::post('review/{review}/update-and-change-status', [ReviewController::class, 'changeDateAndAccept'])->name('review.updateAndChangeStatus');
Route::get('review/edit/{review}', [ReviewController::class, 'edit'])->name('review.edit');
Route::post('review/update/{review}', [ReviewController::class, 'update'])->name('review.update');
Route::get('review/change-publish/{id}', [ReviewController::class, 'changePublish'])->name('review.changePublish');
Route::get('review/delete/{review}', [ReviewController::class, 'destroy'])->name('review.delete');

// Services
Route::get('services', [ServiceController::class, 'index'])->name('services.index');
Route::get('services/show/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::get('services/create', [ServiceController::class, 'create'])->name('services.add');
Route::post('services/store', [ServiceController::class, 'store'])->name('services.store');
Route::get('services/edit/{service}', [ServiceController::class, 'edit'])->name('services.edit');
Route::post('services/update/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::get('services/delete/{service}', [ServiceController::class, 'destroy'])->name('services.delete');

// tags
Route::get('tag', [TagController::class, 'index'])->name('tag.index');
Route::get('tag/show/{tag}', [TagController::class, 'show'])->name('tag.show');
Route::get('tag/create', [TagController::class, 'create'])->name('tag.add');
Route::post('tag/store', [TagController::class, 'store'])->name('tag.store');
Route::get('tag/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
Route::post('tag/update/{tag}', [TagController::class, 'update'])->name('tag.update');
Route::get('tag/change-publish/{id}', [TagController::class, 'changePublish'])->name('tag.changePublish');
Route::get('tag/delete/{tag}', [TagController::class, 'destroy'])->name('tag.delete');

// category
Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/show/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.add');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::get('category/change-publish/{id}', [CategoryController::class, 'changePublish'])->name('category.changePublish');
Route::post('category/assign-package/{category}', [CategoryController::class, 'assignPackage'])->name('category.assignPackage');
Route::post('category/detach-package/{category}', [CategoryController::class, 'detachPackage'])->name('category.detachPackage');
Route::post('category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::get('category/delete/{category}', [CategoryController::class, 'destroy'])->name('category.delete');

// Our Services
Route::get('our-services', [OurServiceController::class, 'index'])->name('our-services.index');
Route::get('our-services/show/{ourService}', [OurServiceController::class, 'show'])->name('our-services.show');
Route::get('our-services/add', [OurServiceController::class, 'create'])->name('our-services.add');
Route::post('our-services/store', [OurServiceController::class, 'store'])->name('our-services.store');
Route::get('our-services/edit/{ourService}', [OurServiceController::class, 'edit'])->name('our-services.edit');
Route::post('our-services/update/{ourService}', [OurServiceController::class, 'update'])->name('our-services.update');
Route::get('our-services/delete/{ourService}', [OurServiceController::class, 'destroy'])->name('our-services.delete');

// University
Route::get('university', [UniversityController::class, 'index'])->name('university.index');
Route::get('university/add', [UniversityController::class, 'create'])->name('university.add');
Route::post('university/store', [UniversityController::class, 'store'])->name('university.store');
Route::get('university/show/{university}', [UniversityController::class, 'show'])->name('university.show');
Route::get('university/edit/{university}', [UniversityController::class, 'edit'])->name('university.edit');
Route::post('university/update/{university}', [UniversityController::class, 'update'])->name('university.update');
Route::get('university/delete/{university}', [UniversityController::class, 'destroy'])->name('university.delete');

// FAQ
Route::get('faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('faq/show/{faq}', [FaqController::class, 'show'])->name('faq.show');
Route::get('faq/create', [FaqController::class, 'create'])->name('faq.add');
Route::post('faq/store', [FaqController::class, 'store'])->name('faq.store');
Route::get('faq/edit/{faq}', [FaqController::class, 'edit'])->name('faq.edit');
Route::post('faq/update/{faq}', [FaqController::class, 'update'])->name('faq.update');
Route::get('faq/delete/{faq}', [FaqController::class, 'destroy'])->name('faq.delete');

Route::get('core-value', [AdminHomePageController::class, 'coreValue'])->name('admin.core-value.index');
Route::get('core-value/show/{value}', [AdminHomePageController::class, 'coreShow'])->name('admin.core-value.show');
Route::get('core-value/{value}/edit', [AdminHomePageController::class, 'coreValueEdit'])->name('admin.core-value.edit');
Route::post('core-value/update/{value}', [AdminHomePageController::class, 'coreValueUpdate'])->name('admin.core-value.update');

Route::get('achievements', [AdminHomePageController::class, 'achievements'])->name('admin.achievements.index');
Route::get('achievements/{achievement}/edit', [AdminHomePageController::class, 'achievementsEdit'])->name('admin.achievements.edit');
Route::post('achievements/{achievement}/update', [AdminHomePageController::class, 'achievementsUpdate'])->name('admin.achievements.update');

Route::get('about', [AdminHomePageController::class, 'about'])->name('about.index');
Route::get('about/{about}/edit', [AdminHomePageController::class, 'aboutEdit'])->name('admin.about.edit');
Route::post('about/{about}/update', [AdminHomePageController::class, 'aboutUpdate'])->name('admin.about.update');

Route::get('organization', [AdminHomePageController::class, 'organization'])->name('organization.index');
Route::get('organization/edit', [AdminHomePageController::class, 'organizationEdit'])->name('admin.organization.edit');
Route::post('organization/{organization}/update', [AdminHomePageController::class, 'organizationUpdate'])->name('admin.organization.update');

// Banner Image
Route::get('banner-image', [BannerImageController::class, 'index'])->name('banner-image.index');
Route::get('banner-image/show/{bannerImage}', [BannerImageController::class, 'show'])->name('banner-image.show');
Route::get('banner-image/create', [BannerImageController::class, 'create'])->name('banner-image.add');
Route::post('banner-image/store', [BannerImageController::class, 'store'])->name('banner-image.store');
Route::get('banner-image/edit/{bannerImage}', [BannerImageController::class, 'edit'])->name('banner-image.edit');
Route::post('banner-image/update/{bannerImage}', [BannerImageController::class, 'update'])->name('banner-image.update');
Route::get('banner-image/delete/{bannerImage}', [BannerImageController::class, 'destroy'])->name('banner-image.delete');

//contact
Route::get('contact/index', [EnquiryController::class, 'contactIndex'])->name('contact.index');
Route::get('contact/show/{contact}', [EnquiryController::class, 'contactShow'])->name('contact.show');

Route::get('bookings/index', [BookingsController::class, 'index'])->name('bookings.index');
Route::get('bookings/show/{bookings}', [BookingsController::class, 'show'])->name('bookings.show');

// activities
Route::get('activities', [ActivitiesController::class, 'index'])->name('activities.index');
Route::get('activities/create', [ActivitiesController::class, 'create'])->name('activities.add');
Route::post('activities/create', [ActivitiesController::class, 'store'])->name('activities.store');
Route::get('activities/view/{activities}', [ActivitiesController::class, 'show'])->name('activities.show');
Route::get('activities/edit/{activities}', [ActivitiesController::class, 'edit'])->name('activities.edit');
Route::post('activities/update/{activities}', [ActivitiesController::class, 'update'])->name('activities.update');
Route::get('activities/delete/{activities}', [ActivitiesController::class, 'destroy'])->name('activities.delete');


// newsletter
Route::get('/newsletter', [NewsLetterController::class, 'index'])->name('newsletter.index');
