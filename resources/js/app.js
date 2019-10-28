require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import headComponent from './components/headComponent'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'headComponent',
            component: headComponent
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});

$( document ).ready(function() {

    $('.loader').hide();

    function ajaxRequest(url, requestData, successMethod, type = 'POST')
    {
        requestData = $.extend(true, requestData, {'_token' : $('meta[name=csrf-token]').attr('content')});
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
        });
        jQuery.ajax({
            url:    url,
            type:   type,
            data:   requestData,
            success: function( data ) {
                eval(successMethod)(data);
            },
            error: function (xhr, b, c) {
                console.log("banners.scss");
            }
        });
    }

    let offset  = $('.resultContainer').length;
    let limit   = 20;

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height() && $('.loader').is(":hidden") && $('.noResults').length == 0) {
            $('.loader').show();
            getMorePokemon();
        }
    });

    function getMorePokemon()
    {
        url             = 'get-results';
        requestData     = {
            'offset': offset,
            'limit': limit
        };
        successMethod   = 'appendResults';
        ajaxRequest(url, requestData, successMethod);
    }

    function appendResults(data)
    {
        $('.resultsContainer').append(data);
        offset += limit;
        $('.loader').hide();
    }

});

