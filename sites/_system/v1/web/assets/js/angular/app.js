var monarchApp = angular.module('monarchApp', ['ngRoute', 'ngAnimate']);

// configure our routes
monarchApp.config(function($routeProvider) {
    $routeProvider

    .when('/', {
        templateUrl : '/tools/pages/index.hbs',
        controller  : 'indexController'
    })
    .when('/index', {
        templateUrl : '/tools/pages/index.hbs',
        controller  : 'indexController'
    })
        .when ('/advanced-datatables', {
        templateUrl : '/tools/pages/advanced-datatables.hbs',
        controller  : 'advanced-datatablesController'
    })

        .when ('/animations', {
        templateUrl : '/tools/pages/animations.hbs',
        controller  : 'animationsController'
    })

        .when ('/bs-carousel', {
        templateUrl : '/tools/pages/bs-carousel.hbs',
        controller  : 'bs-carouselController'
    })

        .when ('/buttons', {
        templateUrl : '/tools/pages/buttons.hbs',
        controller  : 'buttonsController'
    })

        .when ('/calendar', {
        templateUrl : '/tools/pages/calendar.hbs',
        controller  : 'calendarController'
    })

        .when ('/chart-boxes', {
        templateUrl : '/tools/pages/chart-boxes.hbs',
        controller  : 'chart-boxesController'
    })

        .when ('/chart-js', {
        templateUrl : '/tools/pages/chart-js.hbs',
        controller  : 'chart-jsController'
    })

        .when ('/chat', {
        templateUrl : '/tools/pages/chat.hbs',
        controller  : 'chatController'
    })

        .when ('/checklist', {
        templateUrl : '/tools/pages/checklist.hbs',
        controller  : 'checklistController'
    })

        .when ('/ckeditor', {
        templateUrl : '/tools/pages/ckeditor.hbs',
        controller  : 'ckeditorController'
    })

        .when ('/collapsable', {
        templateUrl : '/tools/pages/collapsable.hbs',
        controller  : 'collapsableController'
    })

        .when ('/content-boxes', {
        templateUrl : '/tools/pages/content-boxes.hbs',
        controller  : 'content-boxesController'
    })

        .when ('/data-tables', {
        templateUrl : '/tools/pages/data-tables.hbs',
        controller  : 'data-tablesController'
    })

        .when ('/dropzone-uploader', {
        templateUrl : '/tools/pages/dropzone-uploader.hbs',
        controller  : 'dropzone-uploaderController'
    })

        .when ('/fixed-datatables', {
        templateUrl : '/tools/pages/fixed-datatables.hbs',
        controller  : 'fixed-datatablesController'
    })

        .when ('/flot-charts', {
        templateUrl : '/tools/pages/flot-charts.hbs',
        controller  : 'flot-chartsController'
    })

        .when ('/forms-elements', {
        templateUrl : '/tools/pages/forms-elements.hbs',
        controller  : 'forms-elementsController'
    })

        .when ('/forms-masks', {
        templateUrl : '/tools/pages/forms-masks.hbs',
        controller  : 'forms-masksController'
    })

        .when ('/forms-validation', {
        templateUrl : '/tools/pages/forms-validation.hbs',
        controller  : 'forms-validationController'
    })

        .when ('/forms-wizard', {
        templateUrl : '/tools/pages/forms-wizard.hbs',
        controller  : 'forms-wizardController'
    })

        .when ('/gmaps', {
        templateUrl : '/tools/pages/gmaps.hbs',
        controller  : 'gmapsController'
    })

        .when ('/helper-classes', {
        templateUrl : '/tools/pages/helper-classes.hbs',
        controller  : 'helper-classesController'
    })

        .when ('/icons', {
        templateUrl : '/tools/pages/icons.hbs',
        controller  : 'iconsController'
    })

        .when ('/image-crop', {
        templateUrl : '/tools/pages/image-crop.hbs',
        controller  : 'image-cropController'
    })

        .when ('/images', {
        templateUrl : '/tools/pages/images.hbs',
        controller  : 'imagesController'
    })

        .when ('/index-alt', {
        templateUrl : '/tools/pages/index-alt.hbs',
        controller  : 'index-altController'
    })

        .when ('/inline-editor', {
        templateUrl : '/tools/pages/inline-editor.hbs',
        controller  : 'inline-editorController'
    })

        .when ('/input-knobs', {
        templateUrl : '/tools/pages/input-knobs.hbs',
        controller  : 'input-knobsController'
    })

        .when ('/just-gage', {
        templateUrl : '/tools/pages/just-gage.hbs',
        controller  : 'just-gageController'
    })

        .when ('/labels-badges', {
        templateUrl : '/tools/pages/labels-badges.hbs',
        controller  : 'labels-badgesController'
    })

        .when ('/lazyload', {
        templateUrl : '/tools/pages/lazyload.hbs',
        controller  : 'lazyloadController'
    })

        .when ('/loading-feedback', {
        templateUrl : '/tools/pages/loading-feedback.hbs',
        controller  : 'loading-feedbackController'
    })

        .when ('/mailbox-compose', {
        templateUrl : '/tools/pages/mailbox-compose.hbs',
        controller  : 'mailbox-composeController'
    })

        .when ('/mailbox-inbox', {
        templateUrl : '/tools/pages/mailbox-inbox.hbs',
        controller  : 'mailbox-inboxController'
    })

        .when ('/mailbox-single', {
        templateUrl : '/tools/pages/mailbox-single.hbs',
        controller  : 'mailbox-singleController'
    })

        .when ('/mapael', {
        templateUrl : '/tools/pages/mapael.hbs',
        controller  : 'mapaelController'
    })

        .when ('/markdown', {
        templateUrl : '/tools/pages/markdown.hbs',
        controller  : 'markdownController'
    })

        .when ('/modals', {
        templateUrl : '/tools/pages/modals.hbs',
        controller  : 'modalsController'
    })

        .when ('/morris-charts', {
        templateUrl : '/tools/pages/morris-charts.hbs',
        controller  : 'morris-chartsController'
    })

        .when ('/multi-uploader', {
        templateUrl : '/tools/pages/multi-uploader.hbs',
        controller  : 'multi-uploaderController'
    })

        .when ('/nav-menus', {
        templateUrl : '/tools/pages/nav-menus.hbs',
        controller  : 'nav-menusController'
    })

        .when ('/notifications', {
        templateUrl : '/tools/pages/notifications.hbs',
        controller  : 'notificationsController'
    })

        .when ('/page-transitions', {
        templateUrl : '/tools/pages/page-transitions.hbs',
        controller  : 'page-transitionsController'
    })

        .when ('/panel-boxes', {
        templateUrl : '/tools/pages/panel-boxes.hbs',
        controller  : 'panel-boxesController'
    })

        .when ('/pickers', {
        templateUrl : '/tools/pages/pickers.hbs',
        controller  : 'pickersController'
    })

        .when ('/pie-gages', {
        templateUrl : '/tools/pages/pie-gages.hbs',
        controller  : 'pie-gagesController'
    })

        .when ('/popovers-tooltips', {
        templateUrl : '/tools/pages/popovers-tooltips.hbs',
        controller  : 'popovers-tooltipsController'
    })

        .when ('/progress-bars', {
        templateUrl : '/tools/pages/progress-bars.hbs',
        controller  : 'progress-barsController'
    })

        .when ('/response-messages', {
        templateUrl : '/tools/pages/response-messages.hbs',
        controller  : 'response-messagesController'
    })

        .when ('/responsive-datatables', {
        templateUrl : '/tools/pages/responsive-datatables.hbs',
        controller  : 'responsive-datatablesController'
    })

        .when ('/responsive-tables', {
        templateUrl : '/tools/pages/responsive-tables.hbs',
        controller  : 'responsive-tablesController'
    })

        .when ('/scrollbars', {
        templateUrl : '/tools/pages/scrollbars.hbs',
        controller  : 'scrollbarsController'
    })

        .when ('/sliders', {
        templateUrl : '/tools/pages/sliders.hbs',
        controller  : 'slidersController'
    })

        .when ('/social-boxes', {
        templateUrl : '/tools/pages/social-boxes.hbs',
        controller  : 'social-boxesController'
    })

        .when ('/sortable-elements', {
        templateUrl : '/tools/pages/sortable-elements.hbs',
        controller  : 'sortable-elementsController'
    })

        .when ('/sparklines', {
        templateUrl : '/tools/pages/sparklines.hbs',
        controller  : 'sparklinesController'
    })

        .when ('/summernote', {
        templateUrl : '/tools/pages/summernote.hbs',
        controller  : 'summernoteController'
    })

        .when ('/tables', {
        templateUrl : '/tools/pages/tables.hbs',
        controller  : 'tablesController'
    })

        .when ('/tabs', {
        templateUrl : '/tools/pages/tabs.hbs',
        controller  : 'tabsController'
    })

        .when ('/tile-boxes', {
        templateUrl : '/tools/pages/tile-boxes.hbs',
        controller  : 'tile-boxesController'
    })

        .when ('/timeline', {
        templateUrl : '/tools/pages/timeline.hbs',
        controller  : 'timelineController'
    })

        .when ('/vector-maps', {
        templateUrl : '/tools/pages/vector-maps.hbs',
        controller  : 'vector-mapsController'
    })

        .when ('/xcharts', {
        templateUrl : '/tools/pages/xcharts.hbs',
        controller  : 'xchartsController'
    })

    .when('/admin-blog', {
        templateUrl : '/tools/pages/admin-blog.hbs',
        controller  : 'admin-blogController'
    })

    .when('/admin-pricing', {
        templateUrl : '/tools/pages/admin-pricing.hbs',
        controller  : 'admin-pricingController'
    })

    .when('/auto-menu', {
        templateUrl : '/tools/pages/auto-menu.hbs',
            controller  : 'auto-menuController'
    })

    .when('/faq-section', {
        templateUrl : '/tools/pages/faq-section.hbs',
            controller  : 'faq-sectionController'
    })

    .when('/invoice', {
        templateUrl : '/tools/pages/invoice.hbs',
        controller  : 'invoiceController'
    })

    .when('/portfolio-gallery', {
        templateUrl : '/tools/pages/portfolio-gallery.hbs',
        controller  : 'portfolio-galleryController'
    })

    .when('/portfolio-masonry', {
        templateUrl : '/tools/pages/portfolio-masonry.hbs',
        controller  : 'portfolio-masonryController'
    })

    .when('/slidebars', {
        templateUrl : '/tools/pages/slidebars.hbs',
        controller  : 'slidebarsController'
    })

    .when('/view-profile', {
        templateUrl : '/tools/pages/view-profile.hbs',
        controller  : 'view-profileController'
    })

});


monarchApp.controller('indexController', function($scope) {
    
});

monarchApp.controller('advanced-datatablesController', function($scope) {
    
});

monarchApp.controller('animationsController', function($scope) {
    
});

monarchApp.controller('bs-carouselController', function($scope) {
    
});

monarchApp.controller('buttonsController', function($scope) {
    
});

monarchApp.controller('calendarController', function($scope) {
    
});

monarchApp.controller('chart-boxesController', function($scope) {
    
});

monarchApp.controller('chart-jsController', function($scope) {
    
});

monarchApp.controller('chatController', function($scope) {
    
});

monarchApp.controller('checklistController', function($scope) {
    
});

monarchApp.controller('ckeditorController', function($scope) {
    
});

monarchApp.controller('collapsableController', function($scope) {
    
});

monarchApp.controller('content-boxesController', function($scope) {
    
});

monarchApp.controller('data-tablesController', function($scope) {
    
});

monarchApp.controller('dropzone-uploaderController', function($scope) {
    
});

monarchApp.controller('fixed-datatablesController', function($scope) {
    
});

monarchApp.controller('flot-chartsController', function($scope) {
    
});

monarchApp.controller('forms-elementsController', function($scope) {
    
});

monarchApp.controller('forms-masksController', function($scope) {
    
});

monarchApp.controller('forms-validationController', function($scope) {
    
});

monarchApp.controller('forms-wizardController', function($scope) {
    
});

monarchApp.controller('gmapsController', function($scope) {
    
});

monarchApp.controller('helper-classesController', function($scope) {
    
});

monarchApp.controller('iconsController', function($scope) {
    
});

monarchApp.controller('image-cropController', function($scope) {
    
});

monarchApp.controller('imagesController', function($scope) {
    
});

monarchApp.controller('indexController', function($scope) {
    
});

monarchApp.controller('index-altController', function($scope) {
    
});

monarchApp.controller('inline-editorController', function($scope) {
    
});

monarchApp.controller('input-knobsController', function($scope) {
    
});

monarchApp.controller('just-gageController', function($scope) {
    
});

monarchApp.controller('labels-badgesController', function($scope) {
    
});

monarchApp.controller('lazyloadController', function($scope) {
    
});

monarchApp.controller('loading-feedbackController', function($scope) {
    
});

monarchApp.controller('mailbox-composeController', function($scope) {
    
});

monarchApp.controller('mailbox-inboxController', function($scope) {
    
});

monarchApp.controller('mailbox-singleController', function($scope) {
    
});

monarchApp.controller('mapaelController', function($scope) {
    
});

monarchApp.controller('markdownController', function($scope) {
    
});

monarchApp.controller('modalsController', function($scope) {
    
});

monarchApp.controller('morris-chartsController', function($scope) {
    
});

monarchApp.controller('multi-uploaderController', function($scope) {
    
});

monarchApp.controller('nav-menusController', function($scope) {
    
});

monarchApp.controller('notificationsController', function($scope) {
    
});

monarchApp.controller('page-transitionsController', function($scope) {
    
});

monarchApp.controller('panel-boxesController', function($scope) {
    
});

monarchApp.controller('pickersController', function($scope) {
    
});

monarchApp.controller('pie-gagesController', function($scope) {
    
});

monarchApp.controller('popovers-tooltipsController', function($scope) {
    
});

monarchApp.controller('progress-barsController', function($scope) {
    
});

monarchApp.controller('response-messagesController', function($scope) {
    
});

monarchApp.controller('responsive-datatablesController', function($scope) {
    
});

monarchApp.controller('responsive-tablesController', function($scope) {
    
});

monarchApp.controller('scrollbarsController', function($scope) {
    
});

monarchApp.controller('slidersController', function($scope) {
    
});

monarchApp.controller('social-boxesController', function($scope) {
    
});

monarchApp.controller('sortable-elementsController', function($scope) {
    
});

monarchApp.controller('sparklinesController', function($scope) {
    
});

monarchApp.controller('summernoteController', function($scope) {
    
});

monarchApp.controller('tablesController', function($scope) {
    
});

monarchApp.controller('tabsController', function($scope) {
    
});

monarchApp.controller('tile-boxesController', function($scope) {
    
});

monarchApp.controller('timelineController', function($scope) {
    
});

monarchApp.controller('vector-mapsController', function($scope) {
    
});

monarchApp.controller('xchartsController', function($scope) {
    
});

monarchApp.controller('admin-blogController', function($scope){

});

monarchApp.controller('admin-pricingController', function($scope){

});

monarchApp.controller('auto-menuController', function($scope){

});

monarchApp.controller('faq-sectionController', function($scope){

});

monarchApp.controller('invoiceController', function($scope){

});

monarchApp.controller('portfolio-galleryController', function($scope){

});

monarchApp.controller('portfolio-masonryController', function($scope){

});

monarchApp.controller('slidebarsController', function($scope){

});

monarchApp.controller('view-profileController', function($scope){

});

