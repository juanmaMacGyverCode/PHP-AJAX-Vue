<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        <v-app id="inspire">
            <v-card max-width="500" class="mx-auto">
                <v-toolbar color="indigo" dark>
                    <v-app-bar-nav-icon></v-app-bar-nav-icon>

                    <v-toolbar-title>Inbox</v-toolbar-title>

                    <v-spacer></v-spacer>

                    <v-btn icon>
                        <v-icon>mdi-magnify</v-icon>
                    </v-btn>

                    <v-btn icon>
                        <v-icon>mdi-dots-vertical</v-icon>
                    </v-btn>
                </v-toolbar>
                <v-list>
                    <v-list-item v-for="item in items" :key="item" @click="">
                        <v-list-item-content>
                            <v-list-item-title v-text="item"></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-card>
        </v-app>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <script>
        var xmlhttp = new XMLHttpRequest();
        var diasDeLaSemana = "";


        let promise = new Promise((resolve, reject) => {
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //promise = new Promise((resolve, reject) => {
                    var myObj = JSON.parse(this.responseText);
                    resolve(myObj);
                    //});
                }
            };
            xmlhttp.open("GET", "daylist.php", true);
            xmlhttp.send();
        });

        promise.then((successMessage) => {
            diasDeLaSemana = successMessage;

            new Vue({
                el: '#app',
                vuetify: new Vuetify(),
                data() {
                    return {
                        items: diasDeLaSemana,
                    }
                },
            })
        });

    </script>

</body>

</html>