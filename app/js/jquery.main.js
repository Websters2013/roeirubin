( function(){

    $( function(){

        $.each( $( '.menu' ), function() {
            new Menu ( $( this ) );
        } );

        $.each( $( '.hero' ), function() {
            new Sliders ( $( this ) );
        } );

        $.each( $( '.site__aside' ), function(){

            new Aside ( $( this ) )

        } );

        $.each( $( '.content' ), function(){

            new ContentScroll ( $( this ) )

        } );

    } );

    var Aside = function( obj ) {

        var _self = this,
            _obj = obj;

        var _onEvents = function () {

            },
            _initScroll = function () {

                _obj.perfectScrollbar( );

            },
            _updateScroll = function () {

                _obj.perfectScrollbar( 'update' );

            },
            _init = function () {

                _onEvents();
                _initScroll();
                _obj[0].obj = _self;

            };

        //public methods
        _self.updateScroll = function () {
            _updateScroll();
        };

        _init();

    };

    var ContentScroll = function( obj ) {

        var _obj = obj;

        var _onEvents = function () {

            },
            _initScroll = function () {

                _obj.perfectScrollbar( );

            },
            _init = function () {

                _onEvents();
                _initScroll();

            };

        _init();

    };

    var Menu = function( obj ){

        //private properties
        var _obj = obj,
            _btn = $( '.menu-mobile-btn' ),
            _menuLink = _obj.find( 'a' ),
            _menuSubMenu = _obj.find( '.menu__sub-menu' ),
            _body = $( 'body' ),
            _site = $( '.site' );

        //private methods
        var _constructor = function(){
                _onEvents();
            },
            _onEvents = function(){

                _site.on(
                    'click', function ( e ) {

                        if ( _menuLink.hasClass( 'open' ) && $( e.target ).closest( _obj ).length == 0 ){

                            _menuLink.removeClass( 'open' );
                            _menuSubMenu.css( 'height', 0 );

                            return false;
                        }

                    }
                );

                _btn.on( 'click', function() {

                    var curBtn = $( this );

                    if ( curBtn.hasClass( 'close' ) ){
                        _closeMenu();
                    } else {
                        _openMenu();
                    }

                } );

                _menuLink.on( 'click', function() {

                    var curLink = $( this ),
                        curSubMenu = $( this ).next( 'div' );

                    if ( curLink.next().is( 'div' ) && !curLink.hasClass( 'open' ) ){
                        _openSubMenu( curLink, curSubMenu );
                        return false;
                    } else if ( curLink.next().is( 'div' ) && curLink.hasClass( 'open' ) ) {
                        _closeSubMenu( curLink, curSubMenu );
                        return false;
                    }

                } );

            },
            _openMenu = function(){
                _btn.addClass( 'close' );
                _obj.addClass( 'visible' );
                _body.css( 'overflow-y', 'hidden' );
            },
            _closeMenu = function(){
                _btn.removeClass( 'close' );
                _obj.removeClass( 'visible' );
                _body.css( 'overflow-y', 'auto' );
            },
            _openSubMenu = function ( btn, subMenu ) {

                var curBtn = btn,
                    curSubMenu = subMenu,
                    curSubMenuHeight = curSubMenu.find( 'ul' ).outerHeight();

                curBtn.addClass( 'open' );
                curSubMenu.css( 'height', curSubMenuHeight );

                $( '.site__aside' )[0].obj.updateScroll();

            },
            _closeSubMenu = function ( btn, subMenu ) {

                var curBtn = btn,
                    curSubMenu = subMenu;

                curBtn.removeClass( 'open' );
                curSubMenu.css( 'height', 0 );

            };

        //public properties

        //public methods

        _constructor();

    };

    var Sliders = function( obj ) {

        //private properties
        var _obj = obj,
            _heroSlider = _obj.find( '.hero__swiper' ),
            _hero;

        //private methods
        var _initSlider = function() {

                _hero = new Swiper ( _heroSlider, {
                    autoplay: 10000,
                    speed: 500,
                    effect: 'fade',
                    loop: true
                } );

            },
            _onEvent = function() {

            },
            _construct = function() {
                _onEvent();
                _initSlider();
            };

        //public properties

        //public methods

        _construct();
    };

} )();