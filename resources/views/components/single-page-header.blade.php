
@props(['pageName'])
<section class="single-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$pageName}}</h2>
                <ol class="breadcrumb header-bradcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$pageName}}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
