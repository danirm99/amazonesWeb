<div class="col-md-2 col-sm-2 col-xs-2 text-center shadow bg-white rounded"  >
            <br><br>
                <h6 class="text-center">Categorias</h6>
                <hr>
                    <nav class="nav flex-column">
                        @foreach ($categorias as $values)
                            <a class="nav-link" href="{{ url('/ct/'.$values->nombre) }}">{{$values->nombre}}</a>

                        @endforeach

                    </nav>
              
</div>
