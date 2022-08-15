<form action="{{ route($route)}}" method="post" id="{{$form_id}}" >
    @csrf
    <input type="hidden" id="id" name="id" value="">
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" id="name" name="name" required placeholder="Enter name">
        <span class="text-danger error-text name_error"></span>
    </div>
    <div class="form-group">
        <label for="">Genre</label>
        <select name="genre" id="genre" class="form-control" placeholder="Select Genre" >
                <option value="" disabled selected hidden>Choose Genre...</option>

                @foreach($genres as $id => $name)
                    <option value="{{ $id }}">

                    {{ $name }}</option>
                @endforeach
        </select>
        <span class="text-danger error-text genre_error"></span>


    </div>
    <div class="form-group">
        <label for="">Type</label>
        <select name="type" id="type" class="form-control" >
            <option value="" disabled selected hidden>Choose Type...</option>
            @foreach($types as $id => $name)
                <option value="{{ $id }}">
                {{ $name }}</option>
            @endforeach
        </select>
        <span class="text-danger error-text type_error"></span>
    </div>
    <div class="form-group">
        <label for="">Date Release</label>
        <input type="date" id="date" class="form-control" name="date" placeholder="Enter date">
        <span class="text-danger error-text date_error"></span>
    </div>
    <div class="form-group">
        <label for="">Price</label>
        <input type="text" class="form-control"
               name="price"
               id="price"
               maxlength="8"
               pattern="\d{8}"
               onkeypress="return event.charCode >= 48 && event.charCode <= 57"
               placeholder="$">
        <span class="text-danger error-text price_error"></span>
    </div>
    <div class="form-group">
        <label for="">Synopsis</label>
        <textarea class="form-control" placeholder="Enter Synopsis here..." id="synopsis" name="synopsis" rows="3">
        </textarea>
        <span class="text-danger error-text synopsis_error"></span>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-block btn-success">SAVE</button>
    </div>
</form>
