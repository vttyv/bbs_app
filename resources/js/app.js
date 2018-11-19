
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import 'vue-croppa/dist/vue-croppa.css';

window.Vue = require('vue');
import croppa from 'vue-croppa';

Vue.use(croppa);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component()

// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var app = new Vue({
    el: "#app",
    data: {
        message: 'image data',
        images: [],
        thumbnail: null,
        croppa: {}
    },
    methods:{
        selectedFile: function(e){
            for(var i = 0, len = e.target.files.length; i < len; i++){
                var file = e.target.files[i];
                alert(file);
                if (!file) {
                    alert('none');
                    return false;
                }
                if (!file.type.match('image.*')) {
                    alert('not image.');
                    return false;
                }
                this.images.push(URL.createObjectURL(file));
            }

            if( !this.thumbnail ){
                this.thumbnail = this.images[0];
                alert(this.thumbnail);
            }
        },

        selectedThumbnail: function(img){
            alert(img)
            this.thumbnail = img;
        }
    }
});
