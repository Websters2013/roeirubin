( function(){

    $( function(){

        $( '.menu' ).each( function(){
            new Menu( $( this ) );
        } );

        $.each( $( '.hero' ), function() {
            new Sliders ( $( this ) );
        } );

    } );

    var Menu = function( obj ){

        //private properties
        var _obj = obj,
            _btn = $( '.menu-mobile-btn' ),
            _body = $( 'body' );

        //private methods
        var _constructor = function(){
                _onEvents();
            },
            _onEvents = function(){

                _btn.on( 'click', function() {

                    if ( $( this).hasClass( 'close' ) ){
                        _closeMenu();
                    } else {
                        _openMenu();
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