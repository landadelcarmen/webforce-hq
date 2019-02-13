<v-toolbar app fixed clipped-left class="blue darken-1" dark>

    <v-toolbar-title>WebForce HQ</v-toolbar-title>

    <v-spacer></v-spacer>

    <v-toolbar-items class="hidden-sm-and-down">
        @guest
            <v-btn href="login" flat>Iniciar Sesión</v-btn>
        @else
            <v-menu offset-y>
                <v-btn slot="activator" flat >
                    Acciones
                </v-btn>
                <v-list>
                    <v-list-tile href="/admin/posts">
                        <v-list-tile-title>Administrador</v-list-tile-title>
                    </v-list-tile>
                    <v-list-tile href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"
                    >
                        <v-list-tile-title>Cerrar Sesión</v-list-tile-title>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </v-list-tile>
                </v-list>
            </v-menu>
        @endguest
    </v-toolbar-items>
</v-toolbar>