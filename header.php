<!DOCTYPE html>
<html amp <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!--<script async src="https://cdn.ampproject.org/v0.js"></script>-->
        <title><?php wp_title(); ?></title>

        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet">

        <!--<meta name="viewport" content="width=device-width">-->

        <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
        <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
        <script async custom-element="amp-script" src="https://cdn.ampproject.org/v0/amp-script-0.1.js"></script>
        <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
        <script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>

        <style amp-custom>

            .lightbox { 
                /*background: rgba(0,0,0,.8);*/
                background: #ffffff;
                width: 100%;
                height: 100%;
                position: absolute;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
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
                height: 394px;
                background:linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)),  url(<?php echo get_the_post_thumbnail_url(); ?>);
                background-repeat: no-repeat;
                background-size: 100%, cover;
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




            /*
            Solo en Celulares
            */
            @media (max-width: 575.98px) { 
                h1{
                    font-size: 30px!important;
                }
                h2{
                    font-size: 24px!important;
                }
                h3{
                    font-size: 18px!important;
                }  

                #get_search{
                    max-width: 100%!important;
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
         * Google Ananalytics
         */    
        if(is_user_logged_in() != true && get_option('template_oregoom_google_analytics') != ""){ ?>
            <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
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
        <?php } ?>

    </head>

    <body <?php body_class(); ?>>
        
        
        <!--//GOOGLE ADSENSE Google AMP (Auto) -->
        <?php if(get_option('template_oregoom_adsense_google_amp_auto') != ''){ ?>                        
                <?php  echo get_option('template_oregoom_adsense_google_amp_auto'); ?>
        <?php } ?>
        
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent shadow-sm">
                <div class="container pt-1 pb-1"><?php

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
                    
                    
                    
                    
                    
                    
                    <div class="navbar-toggler rounded-circle p-3 mb-5 mr-4 bg-white border-0" style="position: fixed; bottom: 0px; right: 0px; z-index: 1000; box-shadow: rgba(0, 0, 0, 0.50) 0px 5px 10px;" role="button" aria-label="open sidebar" on="tap:sidebar.open" tabindex="0">
                        <span class="navbar-toggler-icon"></span>
                    </div>
                    

                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto">

                            <?php oregoom_navegation_menus(); ?>

                        </ul>
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

                            </ul>
                            
                        </div>
                        
                    </amp-sidebar>
                    
                </div>
            </nav>
        </header>
        
        
        
        
        <amp-lightbox id="my-search" layout="nodisplay">
            <div class="lightbox" tabindex="0">

                 <!-- Vídeo de YouTube -->
                 <div class="container">
                     <div class="overflow-hidden">
                        <!--<h5 class="text-light float-left">Alejandro Bullón</h5>-->
                        <span role="button" class="text-light h2 float-right text-dark" on="tap:my-search.close">&times;</span>
                    </div>

                    <div class="text-center mb-3"><?php
                        
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