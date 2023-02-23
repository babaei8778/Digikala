<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\admin\user\RoleController;
use App\Http\Controllers\admin\notify\SMSController;
use App\Http\Controllers\Admin\Content\FAQController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\admin\content\PageController;
use App\Http\Controllers\admin\content\PostController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\OrderController;
use App\Http\Controllers\Admin\Market\StoreController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\admin\notify\EmailController;
use App\Http\Controllers\admin\ticket\TicketController;
use App\Http\Controllers\Admin\User\CustomerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Content\BannerController;
use App\Http\Controllers\Admin\Market\CommentController;
use App\Http\Controllers\Admin\Market\GalleryController;
use App\Http\Controllers\Admin\Market\PaymentController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Market\CategoryController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\DiscountController;
use App\Http\Controllers\Admin\Market\PropertyController;
use App\Http\Controllers\admin\setting\SettingController;
use App\Http\Controllers\admin\user\PermissionController;
use App\Http\Controllers\Admin\Market\GuaranteeController;
use App\Http\Controllers\Admin\Notify\EmailFileController;
use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Admin\Market\ProductColorController;
use App\Http\Controllers\Admin\Market\PropertyValueController;
use App\Http\Controllers\Customer\SalesProcess\CartController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\Admin\Ticket\TicketPriorityController;
use App\Http\Controllers\Auth\Customer\LoginRegisterController;
use App\Http\Controllers\Customer\SalesProcess\AddressController;
use App\Http\Controllers\Customer\SalesProcess\ProfileCompletionController;
use App\Http\Controllers\Customer\SalesProcess\PaymentController as CustomerPaymentController;
use App\Http\Controllers\Admin\Content\CommentController as ContentCommentController;
use App\Http\Controllers\Customer\Market\ProductController as MarketProductController;
use App\Http\Controllers\Admin\Content\CategoryController as ContentCategoryController;
use App\Http\Controllers\Customer\Profile\AddressController as ProfileAddressController;
use App\Http\Controllers\Customer\Profile\FavoriteController;
use App\Http\Controllers\Customer\Profile\OrderController as ProfileOrderController;
use App\Http\Controllers\Customer\Profile\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AdminDashboardController::class)->prefix('admin')->group(function () {
    

    Route::get('/', 'index')->name('admin.home');

    Route::prefix('market')->group(function () {

        //category
        Route::controller(CategoryController::class)->prefix('category')->group(function () {
            Route::get('/', 'index')->name('admin.market.category.index');
            Route::get('/create', 'create')->name('admin.market.category.create');
            Route::post('/store', 'store')->name('admin.market.category.store');
            Route::get('/edit/{productCategory}', 'edit')->name('admin.market.category.edit');
            Route::put('/update/{productCategory}', 'update')->name('admin.market.category.update');
            Route::delete('/destroy/{productCategory}', 'destroy')->name('admin.market.category.destroy');
        });

        //brand
        Route::controller(BrandController::class)->prefix('brand')->group(function () {
            Route::get('/', 'index')->name('admin.market.brand.index');
            Route::get('/create', 'create')->name('admin.market.brand.create');
            Route::post('/store', 'store')->name('admin.market.brand.store');
            Route::get('/edit/{brand}', 'edit')->name('admin.market.brand.edit');
            Route::put('/update/{brand}', 'update')->name('admin.market.brand.update');
            Route::delete('/destroy/{brand}', 'destroy')->name('admin.market.brand.destroy');
        });

        //comment
        Route::controller(CommentController::class)->prefix('comment')->group(function () {
            Route::get('/', 'index')->name('admin.market.comment.index');
            Route::get('/show/{comment}', 'show')->name('admin.market.comment.show');
            Route::post('/store', 'store')->name('admin.market.comment.store');
            Route::get('/edit/{id}', 'edit')->name('admin.market.comment.edit');
            Route::put('/update/{id}', 'update')->name('admin.market.comment.update');
            Route::delete('/destroy/{id}', 'destroy')->name('admin.market.comment.destroy');
            Route::get('/approved/{comment}', 'approved')->name('admin.market.comment.approved');
            Route::get('/status/{comment}', 'status')->name('admin.market.comment.status');
            Route::post('/answer/{comment}', 'answer')->name('admin.market.comment.answer');
        });

        //delivery
        Route::controller(DeliveryController::class)->prefix('delivery')->group(function () {
            Route::get('/', 'index')->name('admin.market.delivery.index');
            Route::get('/create', 'create')->name('admin.market.delivery.create');
            Route::post('/store', 'store')->name('admin.market.delivery.store');
            Route::get('/edit/{delivery}', 'edit')->name('admin.market.delivery.edit');
            Route::put('/update/{delivery}', 'update')->name('admin.market.delivery.update');
            Route::delete('/destroy/{delivery}', 'destroy')->name('admin.market.delivery.destroy');
            Route::get('/status/{delivery}', 'status')->name('admin.market.delivery.status');
        });

        //discount
        Route::controller(DiscountController::class)->prefix('discount')->group(function () {
            Route::get('/copan', 'copan')->name('admin.market.discount.copan');
            Route::get('/copan/create', 'copanCreate')->name('admin.market.discount.copan.create');
            Route::get('/common-discount', 'commonDiscount')->name('admin.market.discount.commonDiscount');
            Route::post('/common-discount/store', 'commonDiscountStore')->name('admin.market.discount.commonDiscount.store');
            Route::get('/common-discount/edit/{commonDiscount}', 'commonDiscountEdit')->name('admin.market.discount.commonDiscount.edit');
            Route::put('/common-discount/update/{commonDiscount}', 'commonDiscountUpdate')->name('admin.market.discount.commonDiscount.update');
            Route::delete('/common-discount/destroy/{commonDiscount}', 'commonDiscountDestroy')->name('admin.market.discount.commonDiscount.destroy');
            Route::get('/common-discount/create', 'commonDiscountCreate')->name('admin.market.discount.commonDiscount.create');
            Route::get('/amazing-sale', 'amazingSale')->name('admin.market.discount.amazingSale');
            Route::get('/amazing-sale/create', 'amazingSaleCreate')->name('admin.market.discount.amazingSale.create');
            Route::post('/amazing-sale/store', 'amazingSaleStore')->name('admin.market.discount.amazingSale.store');
            Route::get('/amazing-sale/edit/{amazingSale}', 'amazingSaleEdit')->name('admin.market.discount.amazingSale.edit');
            Route::put('/amazing-sale/update/{amazingSale}', 'amazingSaleUpdate')->name('admin.market.discount.amazingSale.update');
            Route::delete('/amazing-sale/destroy/{amazingSale}', 'amazingSaleDestroy')->name('admin.market.discount.amazingSale.destroy');
            Route::post('/copan/store', 'copanStore')->name('admin.market.discount.copan.store');
            Route::get('/copan/edit/{copan}', 'copanEdit')->name('admin.market.discount.copan.edit');
            Route::put('/copan/update/{copan}', 'copanUpdate')->name('admin.market.discount.copan.update');
            Route::delete('/copan/destroy/{copan}', 'copanDestroy')->name('admin.market.discount.copan.destroy');

        });

        //order
        Route::controller(OrderController::class)->prefix('order')->group(function () {
            Route::get('/', 'all')->name('admin.market.order.all');
            Route::get('/new-order', 'newOrders')->name('admin.market.order.newOrders');
            Route::get('/sending', 'sending')->name('admin.market.order.sending');
            Route::get('/unpaid', 'unpaid')->name('admin.market.order.unpaid');
            Route::get('/canceled', 'canceled')->name('admin.market.order.canceled');
            Route::get('/returned', 'returned')->name('admin.market.order.returned');
            Route::get('/show/{order}', 'show')->name('admin.market.order.show');
            Route::get('/show/{order}/detail', 'detail')->name('admin.market.order.show.detail');
            Route::get('/change-send-status/{order}', 'changeSendStatus')->name('admin.market.order.changeSendStatus');
            Route::get('/change-order-status/{order}', 'changeOrderStatus')->name('admin.market.order.changeOrderStatus');
            Route::get('/cancel-order/{order}', 'cancelOrder')->name('admin.market.order.cancelOrder');
        });

        //payment
        Route::controller(PaymentController::class)->prefix('payment')->group(function () {
            Route::get('/', 'index')->name('admin.market.payment.index');
            Route::get('/online', 'online')->name('admin.market.payment.online');
            Route::get('/offline', 'offline')->name('admin.market.payment.offline');
            Route::get('/cash', 'cash')->name('admin.market.payment.cash');
            Route::get('/canceled/{payment}', 'canceled')->name('admin.market.payment.canceled');
            Route::get('/returned/{payment}', 'returned')->name('admin.market.payment.returned');
            Route::get('/show/{payment}', 'show')->name('admin.market.payment.show');
        });

        //product
        Route::controller(ProductController::class)->prefix('product')->group(function () {
            Route::get('/', 'index')->name('admin.market.product.index');
            Route::get('/create', 'create')->name('admin.market.product.create');
            Route::post('/store', 'store')->name('admin.market.product.store');
            Route::get('/edit/{product}', 'edit')->name('admin.market.product.edit');
            Route::put('/update/{product}', 'update')->name('admin.market.product.update');
            Route::delete('/destroy/{product}', 'destroy')->name('admin.market.product.destroy');

            //gallery
            Route::get('/gallery/{product}', [GalleryController::class, 'index'])->name('admin.market.gallery.index');
            Route::get('/gallery/create/{product}', [GalleryController::class, 'create'])->name('admin.market.gallery.create');
            Route::post('/gallery/store/{product}', [GalleryController::class, 'store'])->name('admin.market.gallery.store');
            Route::delete('/gallery/destroy/{product}/{gallery}', [GalleryController::class, 'destroy'])->name('admin.market.gallery.destroy');

            //color
            Route::get('/color/{product}', [ProductColorController::class, 'index'])->name('admin.market.color.index');
            Route::get('/color/create/{product}', [ProductColorController::class, 'create'])->name('admin.market.color.create');
            Route::post('/color/store/{product}', [ProductColorController::class, 'store'])->name('admin.market.color.store');
            Route::delete('/color/destroy/{product}/{color}', [ProductColorController::class, 'destroy'])->name('admin.market.color.destroy');

            //guarantee
            Route::get('/guarantee/{product}', [GuaranteeController::class, 'index'])->name('admin.market.guarantee.index');
            Route::get('/guarantee/create/{product}', [GuaranteeController::class, 'create'])->name('admin.market.guarantee.create');
            Route::post('/guarantee/store/{product}', [GuaranteeController::class, 'store'])->name('admin.market.guarantee.store');
            Route::delete('/guarantee/destroy/{product}/{guarantee}', [GuaranteeController::class, 'destroy'])->name('admin.market.guarantee.destroy');
        });

        //property
        Route::controller(PropertyController::class)->prefix('property')->group(function () {
            Route::get('/', 'index')->name('admin.market.property.index');
            Route::get('/create', 'create')->name('admin.market.property.create');
            Route::post('/store', 'store')->name('admin.market.property.store');
            Route::get('/edit/{categoryAttribute}', 'edit')->name('admin.market.property.edit');
            Route::put('/update/{categoryAttribute}', 'update')->name('admin.market.property.update');
            Route::delete('/destroy/{categoryAttribute}', 'destroy')->name('admin.market.property.destroy');

            //value
            Route::controller(PropertyValueController::class)->prefix('value')->group(function () {
                Route::get('/value/{categoryAttribute}', 'index')->name('admin.market.value.index');
                Route::get('/value/create/{categoryAttribute}', 'create')->name('admin.market.value.create');
                Route::post('/value/store/{categoryAttribute}', 'store')->name('admin.market.value.store');
                Route::get('/value/edit/{categoryAttribute}/{value}', 'edit')->name('admin.market.value.edit');
                Route::put('/value/update/{categoryAttribute}/{value}', 'update')->name('admin.market.value.update');
                Route::delete('/value/destroy/{categoryAttribute}/{value}', 'destroy')->name('admin.market.value.destroy');
            });
        });

        //store
        Route::controller(StoreController::class)->prefix('store')->group(function () {
            Route::get('/', 'index')->name('admin.market.store.index');
            Route::get('/add-to-store/{product}', 'addToStore')->name('admin.market.store.add-to-store');
            Route::post('/store/{product}', 'store')->name('admin.market.store.store');
            Route::get('/edit/{product}', 'edit')->name('admin.market.store.edit');
            Route::put('/update/{product}', 'update')->name('admin.market.store.update');
        });
    });

    Route::controller(ContentCategoryController::class)->prefix('content')->group(function () {

        //category
        Route::prefix('category')->group(function () {
            Route::get('/', 'index')->name('admin.content.category.index');
            Route::get('/create', 'create')->middleware('role:operator,create-category')->name('admin.content.category.create');
            Route::post('/store', 'store')->name('admin.content.category.store');
            Route::get('/edit/{postCategory}', 'edit')->name('admin.content.category.edit');
            Route::put('/update/{postCategory}', 'update')->name('admin.content.category.update');
            Route::delete('/destroy/{postCategory}', 'destroy')->name('admin.content.category.destroy');
            Route::get('/status/{postCategory}', 'status')->name('admin.content.category.status');
        });

        //comment
        Route::controller(ContentCommentController::class)->prefix('comment')->group(function () {
            Route::get('/', 'index')->name('admin.content.comment.index');
            Route::get('/show/{comment}', 'show')->name('admin.content.comment.show');
            Route::delete('/destroy/{comment}', 'destroy')->name('admin.content.comment.destroy');
            Route::get('/approved/{comment}', 'approved')->name('admin.content.comment.approved');
            Route::get('/status/{comment}', 'status')->name('admin.content.comment.status');
            Route::post('/answer/{comment}', 'answer')->name('admin.content.comment.answer');
        });

        //faq
        Route::controller(FAQController::class)->prefix('faq')->group(function () {
            Route::get('/', 'index')->name('admin.content.faq.index');
            Route::get('/create', 'create')->name('admin.content.faq.create');
            Route::post('/store', 'store')->name('admin.content.faq.store');
            Route::get('/edit/{faq}', 'edit')->name('admin.content.faq.edit');
            Route::put('/update/{faq}', 'update')->name('admin.content.faq.update');
            Route::delete('/destroy/{faq}', 'destroy')->name('admin.content.faq.destroy');
            Route::get('/status/{faq}', 'status')->name('admin.content.faq.status');
        });
        //menu
        Route::controller(MenuController::class)->prefix('menu')->group(function () {
            Route::get('/', 'index')->name('admin.content.menu.index');
            Route::get('/create', 'create')->name('admin.content.menu.create');
            Route::post('/store', 'store')->name('admin.content.menu.store');
            Route::get('/edit/{menu}', 'edit')->name('admin.content.menu.edit');
            Route::put('/update/{menu}', 'update')->name('admin.content.menu.update');
            Route::delete('/destroy/{menu}', 'destroy')->name('admin.content.menu.destroy');
            Route::get('/status/{menu}', 'status')->name('admin.content.menu.status');
        });

        //page
        Route::controller(PageController::class)->prefix('page')->group(function () {
            Route::get('/', 'index')->name('admin.content.page.index');
            Route::get('/create', 'create')->name('admin.content.page.create');
            Route::post('/store', 'store')->name('admin.content.page.store');
            Route::get('/edit/{page}', 'edit')->name('admin.content.page.edit');
            Route::put('/update/{page}', 'update')->name('admin.content.page.update');
            Route::delete('/destroy/{page}', 'destroy')->name('admin.content.page.destroy');
            Route::get('/status/{page}', 'status')->name('admin.content.page.status');
        });

        //post
        Route::controller(PostController::class)->prefix('post')->group(function () {
            Route::get('/', 'index')->name('admin.content.post.index');
            Route::get('/create', 'create')->name('admin.content.post.create');
            // Route::post('/store', 'store')->name('admin.content.post.store')->middleware('can:create,App\Models\Content\Post');
            // Route::post('/store', 'store')->name('admin.content.post.store')->can('update', Post::class);
            Route::post('/store', 'store')->name('admin.content.post.store');
            Route::get('/edit/{post}', 'edit')->name('admin.content.post.edit');
            // Route::put('/update/{post}', 'update')->name('admin.content.post.update')->middleware('can:update,post');
            // Route::put('/update/{post}', 'update')->name('admin.content.post.update')->can('update', 'post');
            Route::put('/update/{post}', 'update')->name('admin.content.post.update');
            Route::delete('/destroy/{post}', 'destroy')->name('admin.content.post.destroy');
            Route::get('/status/{post}', 'status')->name('admin.content.post.status');
            Route::get('/commentable/{post}', 'commentable')->name('admin.content.post.commentable');
        });

        //banner
        Route::controller(BannerController::class)->prefix('banner')->group(function () {
            Route::get('/', 'index')->name('admin.content.banner.index');
            Route::get('/create', 'create')->name('admin.content.banner.create');
            Route::post('/store', 'store')->name('admin.content.banner.store');
            Route::get('/edit/{banner}', 'edit')->name('admin.content.banner.edit');
            Route::put('/update/{banner}', 'update')->name('admin.content.banner.update');
            Route::delete('/destroy/{banner}', 'destroy')->name('admin.content.banner.destroy');
            Route::get('/status/{banner}', 'status')->name('admin.content.banner.status');
        });
    });

    Route::prefix('user')->group(function () {

        //admin-user
        Route::controller(AdminUserController::class)->prefix('admin-user')->group(function () {
            Route::get('/', 'index')->name('admin.user.admin-user.index');
            Route::get('/create', 'create')->name('admin.user.admin-user.create');
            Route::post('/store', 'store')->name('admin.user.admin-user.store');
            Route::get('/edit/{admin}', 'edit')->name('admin.user.admin-user.edit');
            Route::put('/update/{admin}', 'update')->name('admin.user.admin-user.update');
            Route::delete('/destroy/{admin}', 'destroy')->name('admin.user.admin-user.destroy');
            Route::get('/status/{user}', 'status')->name('admin.user.admin-user.status');
            Route::get('/activation/{user}', 'activation')->name('admin.user.admin-user.activation');
            Route::get('/roles/{admin}', 'roles')->name('admin.user.admin-user.roles');
            Route::post('/roles/{admin}/store', 'rolesStore')->name('admin.user.admin-user.roles.store');
            Route::get('/permissions/{admin}', 'permissions')->name('admin.user.admin-user.permissions');
            Route::post('/permissions/{admin}/store', 'permissionsStore')->name('admin.user.admin-user.permissions.store');
        });

        //customer
        Route::controller(CustomerController::class)->prefix('customer')->group(function () {
            Route::get('/', 'index')->name('admin.user.customer.index');
            Route::get('/create', 'create')->name('admin.user.customer.create');
            Route::post('/store', 'store')->name('admin.user.customer.store');
            Route::get('/edit/{user}', 'edit')->name('admin.user.customer.edit');
            Route::put('/update/{user}', 'update')->name('admin.user.customer.update');
            Route::delete('/destroy/{user}', 'destroy')->name('admin.user.customer.destroy');
            Route::get('/status/{user}', 'status')->name('admin.user.customer.status');
            Route::get('/activation/{user}', 'activation')->name('admin.user.customer.activation');
        });

        //role
        Route::controller(RoleController::class)->prefix('role')->group(function () {
            Route::get('/', 'index')->name('admin.user.role.index');
            Route::get('/create', 'create')->name('admin.user.role.create');
            Route::post('/store', 'store')->name('admin.user.role.store');
            Route::get('/edit/{role}', 'edit')->name('admin.user.role.edit');
            Route::put('/update/{role}', 'update')->name('admin.user.role.update');
            Route::delete('/destroy/{role}', 'destroy')->name('admin.user.role.destroy');
            Route::get('/permission-form/{role}', 'permissionForm')->name('admin.user.role.permission-form');
            Route::put('/permission-update/{role}', 'permissionUpdate')->name('admin.user.role.permission-update');
        });

        //permission
        Route::controller(PermissionController::class)->prefix('permission')->group(function () {
            Route::get('/', 'index')->name('admin.user.permission.index');
            Route::get('/create', 'create')->name('admin.user.permission.create');
            Route::post('/store', 'store')->name('admin.user.permission.store');
            Route::get('/edit/{permission}', 'edit')->name('admin.user.permission.edit');
            Route::put('/update/{permission}', 'update')->name('admin.user.permission.update');
            Route::delete('/destroy/{permission}', 'destroy')->name('admin.user.permission.destroy');
        });
    });

    Route::prefix('notify')->group(function () {

        //email
        Route::controller(EmailController::class)->prefix('email')->group(function () {
            Route::get('/', 'index')->name('admin.notify.email.index');
            Route::get('/create', 'create')->name('admin.notify.email.create');
            Route::post('/store', 'store')->name('admin.notify.email.store');
            Route::get('/edit/{email}', 'edit')->name('admin.notify.email.edit');
            Route::put('/update/{email}', 'update')->name('admin.notify.email.update');
            Route::delete('/destroy/{email}', 'destroy')->name('admin.notify.email.destroy');
            Route::get('/status/{email}', 'status')->name('admin.notify.email.status');
        });

        //email file
        Route::controller(EmailFileController::class)->prefix('email-file')->group(function () {
            Route::get('/{email}', 'index')->name('admin.notify.email-file.index');
            Route::get('/{email}/create', 'create')->name('admin.notify.email-file.create');
            Route::post('/{email}/store', 'store')->name('admin.notify.email-file.store');
            Route::get('/edit/{file}', 'edit')->name('admin.notify.email-file.edit');
            Route::put('/update/{file}', 'update')->name('admin.notify.email-file.update');
            Route::delete('/destroy/{file}', 'destroy')->name('admin.notify.email-file.destroy');
            Route::get('/status/{file}', 'status')->name('admin.notify.email-file.status');
        });

        //sms
        Route::controller(SMSController::class)->prefix('sms')->group(function () {
            Route::get('/', 'index')->name('admin.notify.sms.index');
            Route::get('/create', 'create')->name('admin.notify.sms.create');
            Route::post('/store', 'store')->name('admin.notify.sms.store');
            Route::get('/edit/{sms}', 'edit')->name('admin.notify.sms.edit');
            Route::put('/update/{sms}', 'update')->name('admin.notify.sms.update');
            Route::delete('/destroy/{sms}', 'destroy')->name('admin.notify.sms.destroy');
            Route::get('/status/{sms}', 'status')->name('admin.notify.sms.status');
        });
    });

    Route::prefix('ticket')->group(function () {

        //category
        Route::controller(TicketCategoryController::class)->prefix('category')->group(function () {
            Route::get('/', 'index')->name('admin.ticket.category.index');
            Route::get('/create', 'create')->name('admin.ticket.category.create');
            Route::post('/store', 'store')->name('admin.ticket.category.store');
            Route::get('/edit/{ticketCategory}', 'edit')->name('admin.ticket.category.edit');
            Route::put('/update/{ticketCategory}', 'update')->name('admin.ticket.category.update');
            Route::delete('/destroy/{ticketCategory}', 'destroy')->name('admin.ticket.category.destroy');
            Route::get('/status/{ticketCategory}', 'status')->name('admin.ticket.category.status');
        });

        //priority
        Route::controller(TicketPriorityController::class)->prefix('priority')->group(function () {
            Route::get('/', 'index')->name('admin.ticket.priority.index');
            Route::get('/create', 'create')->name('admin.ticket.priority.create');
            Route::post('/store', 'store')->name('admin.ticket.priority.store');
            Route::get('/edit/{ticketPriority}', 'edit')->name('admin.ticket.priority.edit');
            Route::put('/update/{ticketPriority}', 'update')->name('admin.ticket.priority.update');
            Route::delete('/destroy/{ticketPriority}', 'destroy')->name('admin.ticket.priority.destroy');
            Route::get('/status/{ticketPriority}', 'status')->name('admin.ticket.priority.status');
        });

        //admin
        Route::controller(TicketAdminController::class)->prefix('admin')->group(function () {
            Route::get('/', 'index')->name('admin.ticket.admin.index');
            Route::get('/set/{admin}', 'set')->name('admin.ticket.admin.set');
        });

        //main
        Route::get('/', [TicketController::class, 'index'])->name('admin.ticket.index');
        Route::get('/new-tickets', [TicketController::class, 'newTickets'])->name('admin.ticket.newTickets');
        Route::get('/open-tickets', [TicketController::class, 'openTickets'])->name('admin.ticket.openTickets');
        Route::get('/close-tickets', [TicketController::class, 'closeTickets'])->name('admin.ticket.closeTickets');
        Route::get('/show/{ticket}', [TicketController::class, 'show'])->name('admin.ticket.show');
        Route::post('/answer/{ticket}', [TicketController::class, 'answer'])->name('admin.ticket.answer');
        Route::get('/change/{ticket}', [TicketController::class, 'change'])->name('admin.ticket.change');
    });

    Route::controller(SettingController::class)->prefix('setting')->group(function () {
        Route::get('/', 'index')->name('admin.setting.index');
        Route::get('/edit/{setting}', 'edit')->name('admin.setting.edit');
        Route::put('/update/{setting}', 'update')->name('admin.setting.update');
        Route::delete('/destroy/{setting}', 'destroy')->name('admin.setting.destroy');
    });

    Route::post('/notification/read-all', [NotificationController::class, 'readAll'])->name('admin.notification.readAll');
});

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('login-register', 'loginRegisterForm')->name('auth.customer.login-register-form');
    Route::middleware('throttle:customer-login-register-limiter')->post('/login-register', 'loginRegister')->name('auth.customer.login-register');
    Route::get('login-confirm/{token}', 'loginConfirmForm')->name('auth.customer.login-confirm-form');
    Route::middleware('throttle:customer-login-confirm-limiter')->post('/login-confirm/{token}', 'loginConfirm')->name('auth.customer.login-confirm');
    Route::middleware('throttle:customer-login-resend-otp-limiter')->get('/login-resend-otp/{token}', 'loginResendOtp')->name('auth.customer.login-resend-otp');
    Route::get('/logout', 'logout')->name('auth.customer.logout');
});

Route::get('/', [HomeController::class, 'home'])->name('customer.home');

Route::namespace('SalesProcess')->group(function () {

    //cart
    Route::get('/cart', [CartController::class, 'cart'])->name('customer.sales-process.cart');
    Route::post('/cart', [CartController::class, 'updateCart'])->name('customer.sales-process.update-cart');
    Route::post('/add-to-cart/{product:slug}', [CartController::class, 'addToCart'])->name('customer.sales-process.add-to-cart');
    Route::get('/remove-from-cart/{cartItem}', [CartController::class, 'removeFromCart'])->name('customer.sales-process.remove-from-cart');

    //profile completion
    Route::get('/profile-completion', [ProfileCompletionController::class, 'profileCompletion'])->name('customer.sales-process.profile-completion');
    Route::post('/profile-completion', [ProfileCompletionController::class, 'update'])->name('customer.sales-process.profile-completion-update');

    Route::middleware('profile.completion')->group(function () {
        //address
        Route::get('/address-and-delivery', [AddressController::class, 'addressAndDelivery'])->name('customer.sales-process.address-and-delivery');
        Route::post('/add-address', [AddressController::class, 'addAddress'])->name('customer.sales-process.add-address');
        Route::put('/update-address/{address}', [AddressController::class, 'updateAddress'])->name('customer.sales-process.update-address');
        Route::get('/get-cities/{province}', [AddressController::class, 'getCities'])->name('customer.sales-process.get-cities');
        Route::post('/choose-address-and-delivery', [AddressController::class, 'chooseAddressAndDelivery'])->name('customer.sales-process.choose-address-and-delivery');

        //payment
        Route::get('/payment', [CustomerPaymentController::class, 'payment'])->name('customer.sales-process.payment');
        Route::post('/copan-discount', [CustomerPaymentController::class, 'copanDiscount'])->name('customer.sales-process.copan-discount');
        Route::post('/payment-submit', [CustomerPaymentController::class, 'paymentSubmit'])->name('customer.sales-process.payment-submit');
        Route::any('/payment-callback/{order}/{onlinePayment}', [CustomerPaymentController::class, 'paymentCallback'])->name('customer.sales-process.payment-call-back');
    });

});

Route::controller(MarketProductController::class)->group(function () {

    Route::get('/product/{product:slug}', 'product')->name('customer.market.product');
    Route::post('/add-comment/prodcut/{product:slug}', 'addComment')->name('customer.market.add-comment');
    Route::get('/add-to-favorite/prodcut/{product:slug}', 'addToFavorite')->name('customer.market.add-to-favorite');

});

Route::controller(ProfileOrderController::class)->group(function () {

    Route::get('/orders', 'index')->name('customer.profile.orders');
    Route::get('/my-favorites', 'index')->name('customer.profile.my-favorites');
    Route::get('/my-favorites/delete/{product}', 'delete')->name('customer.profile.my-favorites.delete');
    Route::get('/profile', 'index')->name('customer.profile.profile');
    Route::put('/profile/update', 'update')->name('customer.profile.profile.update');
    Route::get('/my-addresses', 'index')->name('customer.profile.my-addresses');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});