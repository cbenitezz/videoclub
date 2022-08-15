@extends('layouts.app-video')
@section('content')

    <div class="container-fluid">
        <div class="row">


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Movies List</div>
                    <div class="card-body">
                    <table  class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="datatables-movies">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Synopsis</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Movies </div>
                    <div class="card-body">
                        @include('movies.form-movie',['route'=> 'movies.store','form_id'=>'form_add_movies'])
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('movies.movie-display-modal')


@endsection


@push('script')
<script type="text/javascript">



$(document).ready( function () {

$('#datatables-movies').DataTable({
       processing: true,
       serverSide: true,
       responsive: true,

       info:true,
       ajax: "{{ url('movies-datatable') }}",
       "pageLength":5,
       "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
       columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'synopsis', name: 'synopsis' },
                { data: 'price', name: 'price' },
                { data: 'actions', name:'actions'},
             ]
   });

});

// Add Movies
$(document).ready( function () {

toastr.options.preventDuplicates = true;

$('#form_add_movies').on('submit', function(e){
e.preventDefault();

$.ajaxSetup({
   headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
   }
});

let form = this;
   $.ajax({
       url:$(form).attr('action'),
       method:$(form).attr('method'),
       data:new FormData(form),
       processData:false,
       dataType:'json',
       contentType:false,

       success:function(data){
           if(data.status == 1){
              toastr.error(data.msg);

           }else{
              $(form)[0].reset();
              $('#datatables-movies').DataTable().ajax.reload(null, false);
              toastr.success(data.msg);

           }
               console.log(data);


       }

   });//end_ajax
});

})   //End $(document).ready


$(document).on('click','#btn_UpdateMovie', function(){
let movie_id = $(this).data('id');
$('.movie-modal').find('form')[0].reset();

        $.post('{{route("movies.display")}}',
        { _token:'{{ csrf_token() }}',
        movie_id :movie_id},
        function(data){
        $('.movie-modal').find('input[name="id"]').val(data.movie.id);
        $('.movie-modal').find('input[name="name"]').val(data.movie.name);
        $('.movie-modal').find('select[name="genre"]').val(data.movie.genre_id);
        $('.movie-modal').find('select[name="type"]').val(data.movie.type_id);
        $('.movie-modal').find('input[name="date"]').val(data.movie.date_release);
        $('.movie-modal').find('input[name="price"]').val(data.movie.price);
        $('.movie-modal').find('textarea[name="synopsis"]').val(data.movie.synopsis);
        $('.movie-modal').modal('show');

 },'json');
});

$(document).on('click','#btn_DeleteMovie', function(){
let movie_id = $(this).data('id');
swal.fire({
                     title:'Are you sure?',
                     html:'You want to <b>delete</b> this Movie',
                     showCancelButton:true,
                     showCloseButton:true,
                     cancelButtonText:'Cancel',
                     confirmButtonText:'Yes, Delete',
                     cancelButtonColor:'#d33',
                     confirmButtonColor:'#556ee6',
                     width:300,
                     allowOutsideClick:false
                }).then(function(result){
                      if(result.value){
                          $.post('{{route("movies.delete.ajax")}}',
                          {_token:'{{ csrf_token() }}',
                          movie_id :movie_id}, function(data){
                               if(data.status == 1){
                                   $('#datatables-movies').DataTable()
                                   .ajax.reload(null, false);
                                   toastr.success(data.msg);
                               }else{
                                   toastr.error(data.msg);
                               }
                          },'json');
                      }
                });

});

$('#form_upgrade_movies').on('submit', function(e){
e.preventDefault();

$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
});
let form = this;
    $.ajax({
        url:$(form).attr('action'),
        method:$(form).attr('method'),
        data:new FormData(form),
        processData:false,
        dataType:'json',
        contentType:false,

        success:function(data){
            if(data.status == 1){
               toastr.error(data.msg);

            }else{
               $(form)[0].reset();
               $('.movie-modal').modal('hide');
               $('#datatables-movies').DataTable().ajax.reload(null, false);
               toastr.success(data.msg);

            }
                console.log(data);


        }

    });//end_ajax

});




</script>

@endpush

@push('style')

@endpush


