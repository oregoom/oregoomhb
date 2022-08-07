<!DOCTYPE html>
<html amp <?php language_attributes(); ?>>
    <head>

        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_title(); ?></title>

        <style amp-custom>

        /* PC y Movil */
        .lightbox {
            /*background: rgba(0,0,0,.8);*/
            /*background: rgba(0,0,0,.9);*/
            width: 100%;
            height: 100vh;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Boton de play en IMG destacada Movil y PC 
        https://www.codegrepper.com/code-examples/csharp/center+image+with+position+absolute
        https://thoughtbot.com/blog/positioning
        */
        #hb-btn-yt{
                z-index: 998; position: absolute; width: 78px; margin: auto; top: 50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);
            }
        .hb-ytp-large-play-button-bg{
            fill: #212121;
            fill-opacity: .8;
        }

        /* https://www.bufa.es/css-aclarar-oscurecer-imagenes/ */
        #hb-img-destacada{
            filter: brightness(90%);
        }

        /* https://lafat32.blogspot.com/2015/12/css-hacer-hover-un-objeto-y-afectar-otro.html */
        #hb-img-destacada:hover .hb-ytp-large-play-button-bg{
            fill: #f00;
            fill-opacity: 1;
        }


        h2#hb-sub-title-at-nt{
            font-size: 1.25rem !important;
        }

        /* PC */
        @media (min-width: 768px) {

            h1{
                font-size: 3rem; 
            }

            /* Boton de play en IMG destacada */
            #hb-btn-yt{
                width: 78px;
            }

            #hb-title-at-nt{
                font-family: 'Salsa'; font-size: 80px; line-height: 1; font-weight: bold;
            }

            #hb-title-historias{
                font-family: 'Salsa'; font-size: 70px; line-height: 1; font-weight: bold;
            }

                h2#hb-title-historias-relato{
                    font-size: 1.3rem !important;
                }

        }

        /* Movil */
        @media (max-width: 767.98px) {

            h1{
                font-size: 1.85rem; 
            }

            /* Boton de play en IMG destacada */
            #hb-btn-yt{
                width: 68px;
            }

            #hb-title-at-nt{
                font-family: 'Salsa'; font-size: 38px !important; line-height: 1.2; font-weight: bold;
            }

            #hb-title-historias{
                font-family: 'Salsa'; font-size: 28px !important; line-height: 1.2; font-weight: bold;
            }

            #hb-desc-historias{
                text-align: center;
                border-bottom: 0 !important;
            }

                #hb-container-historias-relato-r{
                    padding-right: 7.5px;
                }
                #hb-container-historias-relato-l{
                    padding-left: 7.5px;
                }

                h2#hb-title-historias-relato{
                    font-size: 1rem !important;
                }

        }

        /* xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */

            
            p{
                font-family: 'Roboto', sans-serif;
                font-size: 18px;
                font-weight: 300;
                line-height: 1.7em;
            }
            p strong{
                font-weight: bold !important;
            }
            h2{
                line-height: 1em; font-family: Raleway, sans-serif; font-weight: 700!important; font-size: 30px!important;
            }

            #btn-sidebarclose{
                background-color: #000; 
                border: none; 
                cursor: pointer; 
                padding: 3px 10px 3px 10px; 
                border-radius: 100px; 
                color: #fff; 
                margin-left: 20px;
            }
            .hb-parrafo
            {
                font-size: 50px;
            }

            #img-bg-page-home{
                /*padding-top: 220px;*/
                /*height: 394px;*/

                /*background:linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)),  url(<?php echo get_the_post_thumbnail_url(); ?>);*/
                /*background-repeat: no-repeat;*/
                /*background-size: 100%, cover;*/
            }

            #img-bg-page{
                /*padding-top: 220px;*/
                /*height: 394px;*/
                background:linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)),  url(<?php echo get_the_post_thumbnail_url(); ?>);
                background-repeat: no-repeat;
                background-size: cover, 100%;
            }

            #img-bg-post-index{
                background:linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5));
            }

            #img-bg-search{
                height: 270px;
                background:linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)),  url(<?php echo get_the_post_thumbnail_url(); ?>);
                background-repeat: no-repeat;
                background-size: 100%, cover;
            }
            .breadcrumb-item::before{
                /*color: #ffffff !important;*/
            }


            .hb-movil{
                border-radius: 0.25rem;*/
            }

            /*
            Solo en Celulares
            */
            @media (max-width: 767.98px) { 
                h1{
                    font-size: 56px;
                }
                h2{
                    font-size: 28px!important;
                }
                h3{
                    font-size: 24px!important;
                }  

                #get_search{
                    max-width: 100%!important;
                }

                /* Index Post - Entrada WP */
                .hb-movil{
                    border-radius: 0rem !important;
                }

                .container-hb-movil{
                    padding-right: 0px!important;
                    padding-left: 0px!important;
                }

                .h1-hb-movil h1{
                    font-size: 30px!important;
                    line-height: 1.2!important;
                }

            }

            /* Small devices (landscape phones, less than 768px)*/
            @media (max-width: 767.98px) { 

                #get_search{
                    max-width: 100%!important;
                }

            }

            /* Medium devices (tablets, less than 992px)*/
            @media (min-width: 768px) and (max-width: 991.98px) {

                #get_search{
                    max-width: 80%!important;
                }
            }
            
        </style>
        
        
        

        <?php wp_head(); ?>

        <?php 

        /*
         * ==================
         * Google Analytics and Google Analytics 4
         */    
        if(is_user_logged_in() != true && get_option('template_oregoom_google_analytics') != ""){ ?>

            <amp-analytics type="gtag" data-credentials="include">

                <script type="application/json">
                    {
                        "vars" : {
                            "gtag_id": "<?php echo get_option('template_oregoom_google_analytics'); ?>",
                            "config" : {
                            "<?php echo get_option('template_oregoom_google_analytics'); ?>": { "groups": "default" }
                            }
                        }
                    }
                </script>

            </amp-analytics>

            <amp-analytics  type="googleanalytics"  config="https://amp.analytics-debugger.com/ga4.json"  data-credentials="include">
                <script  type="application/json">
                {
                "vars": {
                    "GA4_MEASUREMENT_ID": "<?php echo get_option('template_oregoom_google_analytics_4'); ?>",
                    "GA4_ENDPOINT_HOSTNAME": "www.google-analytics.com",
                    "GOOGLE_CONSENT_ENABLED": false,
                    "WEBVITALS_TRACKING": false,
                    "PERFORMANCE_TIMING_TRACKING": false,
                    "DEFAULT_PAGEVIEW_ENABLED": true,
                    "SEND_DOUBLECLICK_BEACON": false,
                    "ENABLE_REGIONAL_DATA_COLLECTION": true
                }
                }
                </script>
            </amp-analytics>
            
        <?php } ?>

    </head>

    <body <?php body_class(); ?>>
        
        
        <!--//GOOGLE ADSENSE Google AMP (Auto) -->
        <?php if(get_option('template_oregoom_adsense_google_amp_auto') != ''){ ?>                        
                <?php  echo get_option('template_oregoom_adsense_google_amp_auto'); ?>
        <?php } ?>
        
        
        
        <header class="">
            
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
                <div class="container"><?php

                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        echo get_bloginfo();
                    } ?>
                    
                    <div class="d-lg-none" on="tap:my-search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search text-dark" viewBox="0 0 15 15">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                        </svg>
                    </div>
                    
                    
                    <!--Botón Movil Bottom-->
                    <div class="navbar-toggler rounded-circle p-3 mb-5 mr-4 bg-white border-0" style="position: fixed; bottom: 0px; right: 0px; z-index: 1000; box-shadow: rgba(0, 0, 0, 0.50) 0px 5px 10px;" role="button" aria-label="open sidebar" on="tap:sidebar.open" tabindex="0">
                        <span class="navbar-toggler-icon"></span>
                    </div>
                    
                    <div class="collapse navbar-collapse ml-4" id="navbarSupportedContent">                      

                        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

                            <?php oregoom_navegation_menus(); ?>

                        </ul>

                        <div class="d-flex ml-2">
                            <a class="btn btn-outline-primary mr-2 d-none d-xl-block" href="https://bit.ly/3sUqwy1" target="_blank" role="button">Radio en vivo</a>
                            <a class="btn btn btn-warning" href="https://www.paypal.com/donate/?hosted_button_id=THEJDTTLCA7UG" target="_blank" role="button">Done ahora</a>
                        </div>

                    </div>


                    
                    <amp-sidebar id="sidebar" class="bg-white" layout="nodisplay" side="right">
                        
                        <ul class="list-group border-bottom rounded-0">
                            
                            <li class="border-0 list-group-item d-flex justify-content-between align-items-center"><?php
                            
                                if ( has_custom_logo() ) {
                                    the_custom_logo();
                                } else {
                                    echo get_bloginfo();
                                } ?>
                                
                                <!--Botón de Close menú-->
                                <span id="btn-sidebarclose" on="tap:sidebar.close" >X</span>
                                
                            </li>
                            
                        </ul>
                        
                        
                        <div class="navbar-collapse pt-3 p-3">
                            
                            <ul class="navbar-nav">

                                <?php oregoom_navegation_menus(); ?>

                                <li class="nav-item mb-2 mt-2">
                                    <a class="btn btn-outline-primary" href="https://bit.ly/3sUqwy1" target="_blank" role="button">Radio en vivo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn btn-warning" href="https://www.paypal.com/donate/?hosted_button_id=THEJDTTLCA7UG" target="_blank" role="button">Done ahora</a>
                                </li>

                            </ul>
                            
                        </div>
                        
                    </amp-sidebar>
                    
                </div>
            </nav>            
            
            <!--Buscar en pantalla completa Movil-->
            <amp-lightbox id="my-search" layout="nodisplay">
                <div class="lightbox shadow pb-2 pt-2" tabindex="0" style="z-index: 1001;">

                    <!-- Vídeo de YouTube -->
                    <div class="container">
                        
                        <div class="overflow-hidden">
                            <span role="button" class="text-light h2 float-right text-dark" on="tap:my-search.close">&times;</span>
                        </div>

                        <div class="text-center mb-2"><?php
                            if ( has_custom_logo() ) {
                                the_custom_logo();
                            } else {
                                echo get_bloginfo();
                            } ?>
                        </div>

                        <?php get_search_form(); ?> 

                    </div>

                </div>
            </amp-lightbox>
            
        </header>
        
        
        
        
