( function(){

    "use strict";

    $(function () {

        $.each( $( '.media-gallery_view' ), function(){

            new MediaGallery ( $( this ) )

        } );

    } );

    var MediaGallery = function( obj ) {

        var _obj = obj;

        var _onEvents = function () {

                _obj.on( 'click', '.media-gallery__item', function() {

                    SwiperPopup( $( this ), $( this ).index() );

                    return false;

                } );

            },
            _init = function () {

                _onEvents();

            };

        _init();

    };

    var SwiperPopup = function ( obj, index ) {

        var _self = this,
            _obj = obj,
            _body = $( 'body' ),
            _wrapper = _obj.parent(),
            _galleryWrap = _obj.parents( '.media-gallery' ),
            _html = $( 'html' ),
            _window = $( window ),
            _links = _wrapper.find( '.media-gallery__item' ),
            _popup = null,
            _popupInner = null,
            _popupClose = null,
            _swiperWrapper = null,
            _swiperContainer = null,
            _swiperPagination = null,
            _swiperBtnNext = null,
            _swiperBtnPrev = null,
            _swiper = null;

        var _addEvents = function(){

                _window.on({

                    resize: function (){

                        _setPictureSizeWhenResize();

                    }

                });

                _popupInner.parent().on({

                    click: function(){

                        _closePopup();

                    }

                });

                _popupInner.on({

                    click: function( event ){

                        event.stopPropagation();

                    }

                });

                _popupClose.on({
                    click: function(){

                        _closePopup();
                        return false;

                    }
                })

            },
            _addingVariables = function(){

                var type = _galleryWrap.attr( 'data-loaded-type' );

                _popup = $( '<div class="swiper-popup">\
                                    <div class="swiper-container">\
                                        <div class="swiper-wrapper"></div>\
                                        <div class="swiper-pagination"></div>\
                                        <div class="swiper-button-next"></div>\
                                        <div class="swiper-button-prev"></div>\
                                    </div>\
                                </div>' );
                _swiperWrapper = _popup.find( '.swiper-wrapper' );
                _swiperContainer = _popup.find( '.swiper-container' );
                _swiperPagination = _popup.find( '.swiper-pagination' );
                _swiperBtnNext = _popup.find( '.swiper-button-next' );
                _swiperBtnPrev = _popup.find( '.swiper-button-prev' );

            },
            _buildPopup = function(){

                _addingVariables();
                _contentFilling();
                _initSwiper();
                _swiper.slideTo( index, 0 );
                _popup.addClass( 'active' );
                _setStyles();
                _swiper.onResize();

            },
            _closePopup = function(){

                _popup.removeClass( 'active' );
                setTimeout( function(){
                    _html.css({overflow: '', paddingRight: ''});
                    _popup.remove();
                }, 300 );

            },
            _contentFilling = function(){

                $.each( _links, function(){

                    var innerContent = null,
                        dataSRC = null,
                        preloader = null;


                    preloader = '';
                    innerContent = '<img src="' + $(this).attr( "href" ) + '">';
                    dataSRC = '';

                    var newItem = $( '<div class="swiper-slide">\
                                        <div class="swiper-popup__inner" ' + dataSRC + '>\
                                            <a href="#" class="swiper-popup__close"></a>\
                                            ' + preloader + '\
                                            ' + innerContent + '\
                                            <span class="swiper-slide__title">' + $( this ).data( 'title' ) + '</span>\
                                        </div>\
                                    </div>' );

                    _swiperWrapper.append( newItem );

                    newItem.find( 'img' ).on( {
                        load: function(){
                            $( this ).attr( 'data-width', this.width );
                            $( this ).attr( 'data-height', this.height );
                            _setPictureSize( this.width, this.height, $( this ) );
                        }
                    } );

                } );

                _body.append( _popup );

                _popupInner = _popup.find( '.swiper-popup__inner' );
                _popupClose = _popup.find( '.swiper-popup__close' );

            },
            _getScrollWidth = function (){
                var scrollDiv = document.createElement( 'div' ),
                    scrollbarWidth = null;
                document.body.appendChild( scrollDiv );
                scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;
                document.body.removeChild( scrollDiv );
                return scrollbarWidth;
            },
            _initSwiper = function(){

                _swiper = new Swiper( _swiperContainer, {
                    pagination: _swiperPagination,
                    nextButton: _swiperBtnNext,
                    prevButton: _swiperBtnPrev,
                    slidesPerView: 1,
                    paginationClickable: true
                });

            },
            _init = function () {
                _buildPopup();
                _addEvents();
                _obj[ 0 ].obj = _self;
            },
            _setPictureSize = function( picWidth, picHeight, pic ){

                var k = 0;

                if ( ( _popup.width()/picWidth ) > ( _popup.height()/picHeight ) ) {
                    k = _popup.height()/picHeight ;
                } else {
                    k = _popup.width()/picWidth;
                }

                if ( k >= 1 ){

                    pic.css({
                        "width": picWidth*0.85,
                        "height": picHeight*0.85
                    });

                } else {

                    pic.css({
                        "width": k*picWidth*0.85,
                        "height": k*picHeight*0.85
                    });

                }

            },
            _setPictureSizeWhenResize = function(){

                $.each( _swiperWrapper.find( 'img' ), function () {

                    _setPictureSize( $( this ).data( 'width' ), $( this ).data( 'height' ), $( this ) );

                } );

            },
            _setStyles = function(){

                _html.css({
                    overflow: 'hidden',
                    paddingRight: _getScrollWidth()
                });

            };

        _init();

    };

} )();
