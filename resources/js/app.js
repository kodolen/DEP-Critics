/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

let getButton = document.getElementById('add-critic');
getButton.addEventListener("click", showForm);
let formOpen = false;
let getForm = document.getElementById('critic-form');

function showForm(){
    if (formOpen === false){
        console.log("open form");
        getForm.classList.add("open");
        formOpen = true;
    }
    else {
        console.log("close form");
        getForm.classList.remove("open");
        formOpen = false;
    }
}

$(document).ready(function(){

    let checkbox_value;

    $('input[type="checkbox"]').click(function(){
        let critic_id = this.getAttribute("data-valuetwo");
        let hidden = $(this).parents('.critic');
        if($(this).is(":checked")){
            checkbox_value = 1;
            console.log(checkbox_value);
            hidden.addClass('hidden');
            ajax(checkbox_value,critic_id)
        }
        else if($(this).is(":not(:checked)")){
            checkbox_value = 0;
            console.log(checkbox_value);
            hidden.removeClass('hidden');
            ajax(checkbox_value,critic_id)
        }
    });
});

function ajax(checkbox_value, critic_id){
    $.ajax({
        url:'http://localhost:8000/hide/action',
        method:'GET',
        data: {checkbox_value: checkbox_value, critic_id:critic_id},
        dataType:'json',
        success:function(data)
        {

        }
    })
}




