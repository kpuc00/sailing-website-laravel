@extends('layouts.app')

@section('content')
    <div class="row my-4">
        <div class="col-md-12">
                @include('layouts.carousel')
        </div>
    </div>

    <!-- course -->
    <div class="row my-4">
        <div class="row my-4">
            <div class="col">
                <p class="h4 text-muted">Some of our courses:</p>
            </div>
        </div>

        <div class="row mx-4">
            @foreach (App\Course::GetCourses(6) as $course)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    @include('layouts.card.course')
                </div>
            @endforeach
        </div>
    </div>

    <hr class="mt-5">

    <!-- article -->
    <div class="row my-4">
        <div class="row my-4">
            <div class="col">
                <p class="h4 text-muted">This may intrest you:</p>
            </div>
        </div>

        <div class="row mx-4">
            @foreach (App\Article::GetArticles(3) as $article)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    @include('layouts.card.article')
                </div>
            @endforeach
        </div>
    </div>

    <hr class="mt-5">

    <!-- coach -->
    <div class="row my-4">
        <div class="row my-4">
            <div class="col">
                <p class="h4 text-muted">Our newest requitments:</p>
            </div>
        </div>

        <div class="row mx-4">
            @foreach (App\Coach::GetCoaches(3) as $coach)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    @include('layouts.card.coach')
                </div>
            @endforeach
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4">Lorem ipsum</h1>
                  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse hendrerit libero vel luctus imperdiet. Aenean nulla lorem, sagittis ac lobortis sed, elementum nec velit. Proin pretium maximus vulputate. Nunc efficitur nunc volutpat, porta dui non, mattis metus. Ut ultricies eleifend mi non vehicula. Etiam sollicitudin hendrerit libero, vitae lobortis erat accumsan eu. Etiam sit amet lacinia neque, sed ullamcorper eros. Quisque quis diam lorem. Proin vel nisi lacinia, luctus libero eget, blandit turpis. Morbi ornare ipsum non feugiat volutpat. Nunc tincidunt lorem in eleifend ultricies. Sed sed imperdiet ipsum, ac faucibus purus. Donec magna neque, varius a rhoncus ac, pharetra id odio. Morbi fringilla tempor magna, sit amet sollicitudin felis ornare id. Curabitur a pellentesque libero.

                    Sed dignissim id mauris eget tempor. Nunc rhoncus, velit non sollicitudin mollis, erat magna finibus libero, ut semper nisi orci ut velit. Integer sed tempor turpis. Aliquam ut eleifend urna, sit amet gravida felis. Pellentesque urna odio, accumsan ac ante id, vulputate aliquam libero. Cras vehicula nec dui at vestibulum. Integer id vulputate justo, quis ultricies quam. Phasellus vitae nunc ex.

                    Mauris et purus sed mi volutpat vestibulum viverra sed risus. Suspendisse ut cursus massa. Vestibulum et turpis id ligula condimentum dapibus eget eu magna. Mauris vitae pretium justo. Fusce dictum convallis massa. Aenean non ultrices augue, in placerat tellus. Nunc ut orci quis erat rhoncus lobortis. Vestibulum dapibus orci id lorem viverra, sed dignissim odio dapibus. In pharetra enim tellus, in porttitor dolor imperdiet et. Nunc laoreet mauris nec facilisis mollis. Suspendisse in nisi vel justo sollicitudin pretium eget non nunc. Proin placerat mi non interdum tristique. Sed vel sapien id nisi faucibus malesuada sed lacinia lectus. Sed tristique eros ante. Vestibulum lobortis consequat orci a blandit.

                    Proin vitae justo at lorem imperdiet bibendum a eu augue. Etiam dignissim, nisi in scelerisque commodo, ipsum justo imperdiet turpis, sit amet suscipit ligula tortor nec justo. Donec malesuada dapibus hendrerit. Cras quis nisi turpis. Etiam sit amet bibendum metus. Nullam non turpis at eros vehicula tristique. Sed ut purus feugiat, dignissim eros id, venenatis nisl.

                    Morbi dui eros, elementum sed laoreet in, iaculis non nisi. Vivamus tristique diam nec erat sodales, eget consectetur ex sagittis. Phasellus tempor dolor mauris, ornare pellentesque lorem faucibus id. Donec dignissim nibh a rhoncus scelerisque. Suspendisse mauris libero, hendrerit at luctus in, accumsan vitae magna. Vestibulum fermentum est ac condimentum posuere. Etiam molestie nec quam id congue. Phasellus dictum quam a lacus lobortis, in pellentesque sapien semper. Cras mattis aliquet ornare. Phasellus semper placerat diam, quis maximus justo hendrerit id. Nam mollis erat at nulla imperdiet, quis porta tellus luctus. In eleifend dignissim nisl sed dapibus.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
