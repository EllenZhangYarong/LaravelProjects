@extends("layout.main")

@section("content")

    <div class="col-sm-8 blog-main">
        <form action="/posts" method="POST">
            {{csrf_field()}}
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}" />--}}
            <div class="form-group">
                <label>Title</label>
                <input name="title" type="text" class="form-control" placeholder="Write title here">
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea id="content"  style="height:400px;max-height:500px;" name="content" class="form-control" placeholder="Write your article here">

                </textarea>
            </div>
            @include('layout.error')
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <br>

    </div><!-- /.blog-main -->


@endsection