@extends('layouts.app')
@section('content')
    <div id="app">
        <v-app id="inspire">
            <v-navigation-drawer fixed :clipped="$vuetify.breakpoint.mdAndUp" app v-model="drawer">
                <v-list dense>
                    <v-list-tile @click="$router.push('/posts')">
                        <v-list-tile-action>
                            <v-icon>list</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                Posts
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-navigation-drawer>
            <v-toolbar
                    color="blue darken-3"
                    dark
                    app
                    :clipped-left="$vuetify.breakpoint.mdAndUp"
                    fixed
            >
                <v-toolbar-title style="width: 300px" class="ml-0 pl-3">
                    <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
                    <span class="hidden-sm-and-down">Manage</span>
                </v-toolbar-title>
                <v-text-field
                        flat
                        solo-inverted
                        prepend-icon="search"
                        label="Search"
                        class="hidden-sm-and-down"
                ></v-text-field>
                <v-spacer></v-spacer>
                <v-btn icon>
                    <v-icon>apps</v-icon>
                </v-btn>
                <v-btn icon>
                    <v-icon>notifications</v-icon>
                </v-btn>
            </v-toolbar>
            <v-content>
                <router-view></router-view>
            </v-content>
        </v-app>
    </div>
@endsection