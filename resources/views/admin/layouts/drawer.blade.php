<v-navigation-drawer
        v-model="drawer"
        clipped
        app
>
    <v-list>
        <v-list-tile href="/admin/posts">
            <v-list-tile-action>
                <v-icon>dashboard</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
                <v-list-tile-title>Posts</v-list-tile-title>
            </v-list-tile-content>
        </v-list-tile>
        <v-list-tile href="/admin/users">
            <v-list-tile-action>
                <v-icon>people</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
                <v-list-tile-title>Usuarios</v-list-tile-title>
            </v-list-tile-content>
        </v-list-tile>
    </v-list>
</v-navigation-drawer>